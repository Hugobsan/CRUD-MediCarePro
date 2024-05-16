@extends('layouts.app')

@section('title', 'Atendimentos')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="mt-4 p-2"style="display: flex; flex-direction: row; justify-content:space-between; align-items: center">
            <div>
                <h1>Atendimentos</h1>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                <a href="{{ route('atendimentos.export') }}" class="btn btn-success" target="_blank">
                    <i class="fas fa-file-export"></i> Exportar CSV
                </a>
                <a href="{{ route('atendimentos.create') }}" class="btn btn-primary"><i class="fas fa-plus text-white"></i> Adicionar Atendimento</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Data de atendimento</th>
                            <th scope="col">Médico</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($atendimentos as $atendimento)
                            <tr>
                                <td>{{ $atendimento->data_atendimento->format('d/m/Y') }}</td>
                                <td>{{ $atendimento->medico->nome }}</td>
                                <td>{{ $atendimento->paciente->nome }}</td>
                                <td>
                                    <a href="{{route('atendimentos.show', $atendimento->id)}}" class="btn btn-secondary"><i class="fas fa-user"></i></a>
                                    <a href="{{ route('atendimentos.edit', $atendimento->id) }}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                                    <form action="{{ route('atendimentos.destroy', $atendimento->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum atendimento cadastrado.</td>
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
