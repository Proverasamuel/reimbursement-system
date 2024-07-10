@extends('layouts.app')

@section('title', 'Editar Justificação de Despesa')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Justificação de Despesa</h1>
    <form action="{{ route('justificacoes-despesas.update', $justificacaoDespesa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" name="departamento" id="departamento" value="{{ $justificacaoDespesa->departamento }}" required>
        </div>
        <div class="form-group">
            <label for="centro_custo">Centro de Custo</label>
            <input type="text" class="form-control" name="centro_custo" id="centro_custo" value="{{ $justificacaoDespesa->centro_custo }}" required>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total</label>
            <input type="number" class="form-control" name="valor_total" id="valor_total" value="{{ $justificacaoDespesa->valor_total }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo</label>
            <textarea class="form-control" name="motivo" id="motivo" rows="3" required>{{ $justificacaoDespesa->motivo }}</textarea>
        </div>
        <div class="form-group">
            <label for="numero_anexos">Número de Anexos</label>
            <input type="text" class="form-control" name="numero_anexos" id="numero_anexos" value="{{ $justificacaoDespesa->numero_anexos }}">
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $justificacaoDespesa->data }}" required>
        </div>
        <div class="form-group">
            <label for="assinatura">Assinatura</label>
            <input type="text" class="form-control" name="assinatura" id="assinatura" value="{{ $justificacaoDespesa->assinatura }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
