@extends('layouts.app')

@section('title', 'Detalhes da Justificação de Despesa')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes da Justificação de Despesa</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Departamento:</strong> {{ $justificacao->departamento }}</p>
            <p><strong>Valor Total:</strong> {{ $justificacao->valor_total }}</p>
            <p><strong>Motivo:</strong> {{ $justificacao->motivo }}</p>
            <p><strong>Número de Anexos:</strong> {{ $justificacao->numero_anexos }}</p>
            <p><strong>Data:</strong> {{ $justificacao->data }}</p>
            <p><strong>Assinatura:</strong> {{ $justificacao->assinatura }}</p>
            <a href="{{ route('justificacoes-despesas.edit', $justificacao) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('justificacoes-despesas.destroy', $justificacao) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
            <a href="{{ route('justificacoes-despesas.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
