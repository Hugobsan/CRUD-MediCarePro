<div class="modal fade" id="relatorioAtendimentosModal" tabindex="-1" aria-labelledby="relatorioAtendimentosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('relatorios.atendimentos.medico') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="relatorioAtendimentosModalLabel">Relatório de Atendimentos por Médico
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label for="data_inicio" class="form-label">Data de Início</label>
                                <input type="date" class="form-control" id="data_inicio" name="data_inicio">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label for="data_fim" class="form-label">Data de Fim</label>
                                <input type="date" class="form-control" id="data_fim" name="data_fim">
                            </div>
                        </div>
                    </div>
                    {{-- Buscar por todo o periodo --}}
                    <div class="form-check">
                        <input type="checkbox" value="1" id="todo_periodo" name="todo_periodo">
                        <label for="todo_periodo">
                            Buscar por todo o período
                        </label>
                    </div>
                    <div class="row">
                        {{-- Tipo de Export (CSV ou PDF) --}}
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label for="tipo_export" class="form-label">Tipo de Export</label>
                                <select class="form-select" id="tipo_export" name="tipo_export">
                                    <option value="csv">CSV</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#todo_periodo').on('change', function() {
            if (this.checked) {
                $('#data_inicio').prop('disabled', true);
                $('#data_fim').prop('disabled', true);
            } else {
                $('#data_inicio').prop('disabled', false);
                $('#data_fim').prop('disabled', false);
            }
        });
    </script>
@endpush
