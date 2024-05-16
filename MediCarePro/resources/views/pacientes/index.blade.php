@extends('layouts.app')

@section('title', 'Pacientes')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="mt-4 p-2"style="display: flex; flex-direction: row; justify-content:space-between; align-items: center">
            <div>
                <h1>Pacientes</h1>
            </div>
            <div>
                <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus text-white"></i> Adicionar Médico</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->nome }}</td>
                                <td>{{ $paciente->email }}</td>
                                <td>{{ $paciente->data_nascimento->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{route('pacientes.show', $paciente->id)}}" class="btn btn-secondary"><i class="fas fa-user"></i></a>
                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum paciente cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex flex-row justify-content-center">
                    {{ $pacientes->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
@endpush
