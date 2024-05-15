@extends('layouts.app')

@section('title', 'Cadastrar Médico')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="m-2">
            <h1>Cadastrar Novo Médico</h1>
        </div>
        
        <form action="{{ route('medicos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="crm" class="form-label">CRM</label>
                <input type="text" class="form-control" id="crm" name="crm" value="{{ old('crm') }}"
                    required>
                @error('crm')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ old('especialidade')}}" required>
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
