@extends('layouts.app')

@section('title', 'Editar Atendimento')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="m-2">
            <h1>Editar Atendimento</h1>
        </div>
        
        <form action="{{ route('atendimentos.update', $atendimento->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="data_atendimento" class="form-label">Data de atendimento</label>
                <input type="date" class="form-control" id="data_atendimento" name="data_atendimento" value="{{ old('data_atendimento') ?? $atendimento->data_atendimento->format('Y-m-d') }}" required>
                @error('data_atendimento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="medico_id" class="form-label">Médico</label>
                <select class="form-select" id="medico_id" name="medico_id" required>
                    <option value="">Selecione um médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id || $atendimento->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nome }}</option>
                    @endforeach
                </select>
                @error('medico_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select class="form-select" id="paciente_id" name="paciente_id" required>
                    <option value="">Selecione um paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id || $atendimento->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nome }}</option>
                    @endforeach
                </select>
                @error('paciente_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection