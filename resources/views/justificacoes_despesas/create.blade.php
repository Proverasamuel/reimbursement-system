<div class="container">
    <form action="{{ route('justificacoes-despesas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="valor_total">Valor Total</label>
            <input type="number" class="form-control" name="valor_total" id="valor_total" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo</label>
            <textarea class="form-control" name="motivo" id="motivo" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="numero_anexos">Número de Anexos</label>
            <input type="file" class="form-control" name="anexos[]" id="numero_anexos" multiple accept=".jpg,.pdf">
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" name="data" id="data" required>
        </div>
        <div class="form-group">
            <label for="assinatura">Assinatura</label>
            <input type="text" class="form-control" name="assinatura" id="assinatura" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
