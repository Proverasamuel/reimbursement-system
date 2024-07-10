<div class="container">
    <form action="{{ route('justificacoes-despesas.itens.store', $justificacaoDespesa->id) }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="codigo_conta">Código da Conta:</label>
            <input type="text" name="codigo_conta" id="codigo_conta" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável:</label>
            <input type="text" name="responsavel" id="responsavel" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
