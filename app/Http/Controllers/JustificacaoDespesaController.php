<?php

namespace App\Http\Controllers;

use App\Models\JustificacaoDespesa;
use App\Models\ItemDespesa;
use App\Models\Anexo;
use Illuminate\Http\Request;

class JustificacaoDespesaController extends Controller
{
    public function index()
    {
        $justificacoes = JustificacaoDespesa::with('itens')->get();
        return view('justificacoes_despesas.index', compact('justificacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string',
            'tipoDespesa' => 'required|string',
            'data' => 'required|date',
            'item_nome.*' => 'required|string|max:255',
            'item_valor.*' => 'required|numeric',
            'anexos.*' => 'file|mimes:jpg,pdf|max:2048',
        ]);

        $justificacao = JustificacaoDespesa::create([
            'colaborador' => rand(1, 100),
            'departamento' => rand(1, 10),
            'mes' => rand(1, 12),
            'ano' => rand(2020, 2024),
            'valor_total' => 0, // Será atualizado após a adição dos itens
            'motivo' => $request->motivo,
            'tipoDespesa' => $request->tipoDespesa,
            'data' => $request->data,
            'progress' => rand(0, 100),
            'status' => 'Em análise',
        ]);

        
        foreach ($request->item_nome as $key => $item_nome) {
            $itemDespesa = new ItemDespesa([
                'justificacao_despesa_id' => $justificacao->id,
                'descricao' => $item_nome,
                'valor' => $request->item_valor[$key],
            ]);

            if ($request->hasFile('anexos')) {
                $anexos = $request->file('anexos');
                if (isset($anexos[$key])) {
                    $anexo = $anexos[$key];

                    // Salvando as imagens e os arquivos
                    $pathImagem = $anexo->store('anexos/imagens');
                    $pathFicheiro = $anexo->store('anexos/faturas');

                    $itemDespesa->caminhoImagem = $pathImagem;
                    $itemDespesa->caminhoFicheiro = $pathFicheiro;
                }
            }

            $itemDespesa->save();
        }


        $justificacao->valor_total = $justificacao->itens->sum('valor');
        $justificacao->save();

        return redirect()->route('justificacoes-despesas.index');
    }
    public function getItensDespesa($id)
    {
        $justificacao = JustificacaoDespesa::with('itens')->findOrFail($id);
        return response()->json($justificacao->itens);
    }


    public function show($id)
    {
        $justificacao = JustificacaoDespesa::with('itens', 'anexos')->findOrFail($id);
        return view('justificacoes_despesas.show', compact('justificacao'));
    }
}
