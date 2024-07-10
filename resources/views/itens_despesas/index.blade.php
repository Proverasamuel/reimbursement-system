@extends('layouts.app')

@section('title', 'Itens de Despesa')

@section('content')
    <h1>Itens de Despesa para Justificação: {{ $justificacaoDespesa->departamento }}</h1>
    <ul class="list-group mt-3">
        @if(isset($itens) && $itens->isNotEmpty())
            @foreach($itens as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('justificacoes-despesas.itens.show', [$justificacaoDespesa->id, $item->id]) }}">
                        {{ $item->descricao }} - {{ $item->valor }}
                    </a>
                    <form action="{{ route('justificacoes-despesas.itens.destroy', [$justificacaoDespesa->id, $item->id]) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </li>
            @endforeach
        @else
            <li class="list-group-item">Nenhum item encontrado.</li>
        @endif
    </ul>
@endsection
