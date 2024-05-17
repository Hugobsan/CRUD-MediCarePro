@extends('layouts.app')

@section('title', 'Painel')

@section('styles')
@endsection

@section('content')
<div class="container m-4">
    <h3 class="text-center">MediCarePro</h3>
    <p>Seja bem-vindo ao MediCarePro, um sistema de gerenciamento de consultas médicas.</p>
    <p>MediCarePro é um projeto de um sistema de gerenciamento de pacientes e médicos, onde é possível realizar operações de cadastro, leitura, atualização e exclusão de registros.</p>
    <p>O projeto foi desenvolvido utilizando o framework Laravel 7, banco de dados MySQL, Laravel Blade no Front-End com Bootstrap e Docker para a criação dos containers.</p>
    <p>O projeto conta com as seguintes funcionalidades:</p>
    <ul>
        <li>Cadastro de Pacientes</li>
        <li>Cadastro de Médicos</li>
        <li>Cadastro de Consultas</li>
        <li>Relatório de Consultas por Médico</li>
    </ul>
    <p>Para começar, clique em um dos itens do menu.</p>

</div>


@endsection

@push('scripts')
@endpush