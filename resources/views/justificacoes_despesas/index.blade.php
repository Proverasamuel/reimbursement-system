@extends('layouts.app')

@section('title', 'Justificações de Despesas')

@section('content')
<div class="container">
    <h1 class="mb-4">Justificações de Despesas</h1>
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#multiStepFormModal">
        Nova Justificação
    </button>
    <table class="table">
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Valor Total</th>
                <th>Tipo de despesa</th>
                <th>Motivo</th>
                <th>Número de Itens</th>
                <th>Data</th>
                <th>Número de Anexos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($justificacoes as $justificacao)
            <tr data-id="{{ $justificacao->id }}" class="justificacao-row">
                <td>{{ $justificacao->departamento }}</td>
                <td>{{ $justificacao->valor_total }}</td>
                <td>{{ $justificacao->tipoDespesa }}</td>
                <td>{{ $justificacao->motivo }}</td>
                <td>{{ $justificacao->itens->count() }}</td>
                <td>{{ $justificacao->data }}</td>
                <td>{{ $justificacao->itens->filter(fn($item) => $item->caminhoImagem || $item->caminhoFicheiro)->count() }}</td>
                <td>
                    <a href="{{ route('justificacoes-despesas.show', $justificacao->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para Itens de Despesa -->
<div class="modal fade" id="itensDespesaModal" tabindex="-1" role="dialog" aria-labelledby="itensDespesaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itensDespesaModalLabel">Itens de Despesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome do Item</th>
                            <th>Valor</th>
                            <th>Imagem</th>
                            <th>Factura</th>
                        </tr>
                    </thead>
                    <tbody id="itensDespesaTableBody">
                        <!-- Itens serão carregados aqui -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Multi-Step Form -->
<div class="modal fade" id="multiStepFormModal" tabindex="-1" role="dialog" aria-labelledby="multiStepFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="multiStepFormModalLabel">Nova Justificação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="multiStepForm" method="POST" action="{{ route('justificacoes-despesas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Step 1: Justificação -->
                    <div class="step" id="step1">
                        <h4>Criar Justificação de Despesa</h4>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Despesa</label>
                            <select class="form-control" id="tipo" name="tipoDespesa" required>
                                <option value="Material">Material</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="data" required>
                        </div>
                        <div class="mb-3">
                            <label for="motivo" class="form-label">Motivo</label>
                            <textarea class="form-control" id="motivo" name="motivo" rows="3" placeholder="Digite o motivo" required></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" id="nextStep1">Próximo</button>
                    </div>

                    <!-- Step 2: Item de Despesa -->
                    <div class="step" id="step2" style="display: none;">
                        <h4>Adicionar Item de Despesa</h4>
                        <div id="item-container">
                            <div class="item-row">
                                <div class="mb-3">
                                    <label for="item_nome" class="form-label">Nome do Item</label>
                                    <input type="text" class="form-control" name="item_nome[]" required>
                                </div>
                                <div class="mb-3">
                                    <label for="item_valor" class="form-label">Valor</label>
                                    <input type="number" class="form-control" name="item_valor[]" required>
                                </div>
                                <div class="mb-3">
                                    <label for="caminhoImagem" class="form-label">Imagem</label>
                                    <input type="file" class="form-control" name="anexos[]" multiple accept=".jpg,.pdf">
                                </div>
                                <div class="mb-3">
                                    <label for="caminhoFatura" class="form-label">Factura</label>
                                    <input type="file" class="form-control" name="anexos[]" multiple accept=".jpg,.pdf">
                                </div>
                                <button type="button" class="btn btn-danger remove-item">Remover Item</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary add-item">Adicionar Item</button>
                        <hr>
                        <button type="button" class="btn btn-secondary" id="prevStep2">Anterior</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var currentStep = 0;

        function showStep(step) {
            $(".step").hide();
            $(".step:eq(" + step + ")").show();
        }

        $("#nextStep1").click(function() {
            currentStep++;
            showStep(currentStep);
        });

        $("#prevStep2").click(function() {
            currentStep--;
            showStep(currentStep);
        });

        $(".add-item").click(function() {
            var itemRow = $(".item-row:first").clone();
            itemRow.find("input").val("");
            $("#item-container").append(itemRow);
        });

        $(document).on("click", ".remove-item", function() {
            $(this).closest(".item-row").remove();
        });

        showStep(currentStep);

        // Carregar itens de despesa ao clicar em uma linha da tabela
        $(".justificacao-row").click(function() {
            var justificacaoId = $(this).data("id");
            $.get(`/justificacoes-despesas/${justificacaoId}/itens`, function(data) {
                var itensTableBody = $("#itensDespesaTableBody");
                itensTableBody.empty();
                data.forEach(function(item) {
                    itensTableBody.append(`
                        <tr>
                            <td>${item.descricao}</td>
                            <td>${item.valor}</td>
                            <td>${item.caminhoImagem ? '<a href="' + item.caminhoImagem + '">Ver Imagem</a>' : 'N/A'}</td>
                            <td>${item.caminhoFicheiro ? '<a href="' + item.caminhoFicheiro + '">Ver Factura</a>' : 'N/A'}</td>
                        </tr>
                    `);
                });
                $("#itensDespesaModal").modal("show");
            });
        });
    });
</script>
@endsection
