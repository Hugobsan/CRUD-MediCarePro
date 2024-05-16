<div class="modal fade" id="atendimentosCreateModal" tabindex="-1" aria-labelledby="atendimentosCreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('atendimentos.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="atendimentosCreateModalLabel">Novo Atendimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                    <div class="mb-3">
                        <label for="medico_id" class="form-label">Paciente</label>
                        <select class="form-select" name="medico_id" id="medico_id" required>
                            <option value="">Selecione um médico</option>
                            @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data_atendimento" class="form-label">Data</label>
                        <input type="date" class="form-control" name="data_atendimento" id="data_atendimento"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
