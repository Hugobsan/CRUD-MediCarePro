<div class="modal fade" id="relatorioAtendimentosModal" tabindex="-1" aria-labelledby="relatorioAtendimentosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('relatorios.atendimentos.medico') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="relatorioAtendimentosModalLabel">Relatório de Atendimentos por Médico</h5>
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
                    <div class="row">
                        {{-- Buscar por todo o periodo --}}
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check" type="checkbox" value="1" id="todo_periodo" name="todo_periodo">
                                <label class="form-check" for="todo_periodo">
                                    Buscar por todo o período
                                </label> 
                            </div>
                        </div>
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

@push('script')
<script>
    //Bloqueia e zera as datas de inicio e fim ao selecionar o checkbox de todo o periodo
    document.getElementById('todo_periodo').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('data_inicio').disabled = true;
            document.getElementById('data_fim').disabled = true;
            document.getElementById('data_inicio').value = '';
            document.getElementById('data_fim').value = '';
        } else {
            document.getElementById('data_inicio').disabled = false;
            document.getElementById('data_fim').disabled = false;
        }
    });
</script>
@endpush