@extends('layouts.app')

@section('title', 'Visualizar Dados')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="m-2">
            <h2>{{ $paciente->nome }}</h2>
            <br>
            <p>CPF: {{ $paciente->cpf }} </p>
            <p>E-mail: {{ $paciente->email }} </p>
            <p>Data de Nascimento: {{ $paciente->data_nascimento->format('d/m/Y') }} </p>
            <p>Cliente desde: {{ $paciente->atendimentos->first()->data_atendimento->format('d/m/Y') ?? 'Ainda não possui atendimento!'}}</p>
        </div>
        <hr>
        <div>
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h3>Atendimentos</h3>
                </div>
                <div>
                    {{-- Novo Atendimento --}}
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#atendimentosCreateModal"> <i class="fas fa-plus"></i> Novo
                        Atendimento</a>
                </div>
                @include('pacientes.components.atendimentos.create')
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Médico</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($atendimentos as $atendimento)
                            <tr>
                                <td
                                    class="{{ $atendimento->data_atendimento >= date('Y-m-d') ? 'text-danger' : '' }}">
                                    {{ $atendimento->data_atendimento->format('d/m/Y') }}
                                </td>
                                <td>{{ $atendimento->medico->nome }}</td>
                                <td>
                                    <a href="{{ route('atendimentos.edit', $atendimento->id) }}" class="btn btn-primary"> <i
                                            class="text-white fas fa-edit"></i> </a>
                                    <form action="{{ route('atendimentos.destroy', $atendimento->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white btn btn-danger"> <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Nenhum atendimento encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex flex-row justify-content-center">
                    {{ $atendimentos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
