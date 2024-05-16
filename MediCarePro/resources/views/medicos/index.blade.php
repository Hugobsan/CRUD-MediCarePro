@extends('layouts.app')

@section('title', 'Médicos')

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="mt-4 p-2 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h1>Médicos</h1>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                <a href="{{ route('medicos.export') }}" class="btn btn-success" target="_blank">
                    <i class="fas fa-file-export"></i> Exportar CSV
                </a>
                <a href="{{ route('medicos.create') }}" class="btn btn-primary"><i class="fas fa-plus text-white"></i> Adicionar Médico</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CRM</th>
                            <th scope="col">Especialidade</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicos as $medico)
                            <tr>
                                <td>{{ $medico->nome }}</td>
                                <td>{{ $medico->crm }}</td>
                                <td>{{ $medico->especialidade }}</td>
                                <td>
                                    <a href="{{route('medicos.show', $medico->id)}}" class="btn btn-secondary"><i class="fas fa-user"></i></a>
                                    <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhum médico cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex flex-row justify-content-center">
                    {{ $medicos->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
@endpush
