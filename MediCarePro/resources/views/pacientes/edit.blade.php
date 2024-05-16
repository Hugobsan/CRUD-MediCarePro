@extends('layouts.app')

@section('title', 'Editar Médico')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="m-2">
            <h1>Editar Médico</h1>
        </div>
        
        <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $medico->nome }}" required>
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="crm" class="form-label">CRM</label>
                <input type="text" class="form-control" id="crm" name="crm" value="{{ $medico->crm }}"
                    required>
                @error('crm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ $medico->especialidade }}" required>
                @error('especialidade')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection

@push('scripts')
@endpush
