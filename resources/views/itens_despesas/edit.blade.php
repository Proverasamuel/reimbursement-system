<!DOCTYPE html>
<html>
<head>
    <title>Editar Item de Despesa</title>
</head>
<body>
    <h1>Editar Item de Despesa</h1>
    <form action="{{ route('justificacoes-despesas.itens.update', [$justificacaoDespesa, $itemDespesa]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="codigo_conta">Código da Conta:</label>
            <input type="text" name="codigo_conta" id="codigo_conta" value="{{ $itemDespesa->codigo_conta }}">
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="{{ $itemDespesa->descricao }}">
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" value="{{ $itemDespesa->valor }}">
        </div>
        <div>
            <label for="responsavel">Responsável:</label>
            <input type="text" name="responsavel" id="responsavel" value="{{ $itemDespesa->responsavel }}">
        </div>
        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('justificacoes-despesas.itens.index', $justificacaoDespesa) }}">Voltar</a>
</body>
</html>
