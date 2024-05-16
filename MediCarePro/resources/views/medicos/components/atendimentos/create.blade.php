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
                    <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                    <div class="mb-3">
                        <label for="paciente_id" class="form-label">Paciente</label>
                        <select class="form-select" name="paciente_id" id="paciente_id" required>
                            <option value="">Selecione um paciente</option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
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
