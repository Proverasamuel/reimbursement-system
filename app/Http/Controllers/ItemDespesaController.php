<?php

namespace App\Http\Controllers;

use App\Models\ItemDespesa;
use App\Models\JustificacaoDespesa;
use Illuminate\Http\Request;

class ItemDespesaController extends Controller
{
    public function index($justificacaoDespesaId)
    {
        $justificacaoDespesa = JustificacaoDespesa::findOrFail($justificacaoDespesaId);
        $itens = $justificacaoDespesa->itens;
    
      /*   // Debugging output
        dd($justificacaoDespesa, $itens);
     */
        return view('itens_despesas.index', compact('justificacaoDespesa', 'itens'));
    }
    
    

    public function create($id)
    {
        $justificacaoDespesa = JustificacaoDespesa::findOrFail($id);
        return view('justificacoes-despesas.add-item', compact('justificacaoDespesa'));
    }

   // ItemDespesaController.php

public function store(Request $request, $id)
{
    $request->validate([
        'codigo_conta' => 'required|string|max:255',
        'descricao' => 'required|string|max:255',
        'valor' => 'required|numeric',
        'responsavel' => 'required|string|max:255',
    ]);

    $justificacaoDespesa = JustificacaoDespesa::findOrFail($id);

    $justificacaoDespesa->itens()->create([
        'codigo_conta' => $request->codigo_conta,
        'descricao' => $request->descricao,
        'valor' => $request->valor,
        'responsavel' => $request->responsavel,
    ]);
    $itemDespesa = $justificacaoDespesa->itens()->create($request->all());
    return response()->json(['itemDespesa' => $itemDespesa]);
}


    public function show($id, $item)
    {
        $justificacaoDespesa = JustificacaoDespesa::findOrFail($id);
        $itemDespesa = ItemDespesa::findOrFail($item);

        return view('itens_despesas.show', compact('justificacaoDespesa', 'itemDespesa'));
    }

    public function destroy($id, $item)
    {
        $itemDespesa = ItemDespesa::findOrFail($item);
        $itemDespesa->delete();

        return redirect()->route('justificacoes-despesas.itens.index', $id)->with('success', 'Item de despesa deletado com sucesso.');
    }
}
