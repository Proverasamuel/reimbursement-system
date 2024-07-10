@extends('layouts.app')

@section('title', 'Detalhes do Item de Despesa')

@section('content')
    <h1>Detalhes do Item de Despesa: {{ $itemDespesa->descricao }}</h1>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Código da Conta:</strong> {{ $itemDespesa->codigo_conta }}</p>
            <p><strong>Descrição:</strong> {{ $itemDespesa->descricao }}</p>
            <p><strong>Valor:</strong> {{ $itemDespesa->valor }}</p>
            <p><strong>Responsável:</strong> {{ $itemDespesa->responsavel }}</p>
        </div>
    </div>
    <a href="{{ route('justificacoes-despesas.itens.index', $justificacaoDespesa->id) }}" class="btn btn-secondary mt-3">Voltar à Lista</a>
@endsection
