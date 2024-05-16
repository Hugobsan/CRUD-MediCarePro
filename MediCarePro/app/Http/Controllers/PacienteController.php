<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use App\Http\Requests\SavePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(SavePacienteRequest $request)
    {
        Paciente::create($request->all());
        toastr()->success('Paciente cadastrado com sucesso!');
        return redirect()->route('pacientes.index');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        $atendimentos = $paciente->atendimentos()->orderBy('data_atendimento', 'desc')->paginate(10);
        return view('pacientes.show', compact('paciente', 'atendimentos'));
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(UpdatePacienteRequest $request, $id)
    {
        Paciente::findOrFail($id)->update($request->all());
        toastr()->success('Paciente atualizado com sucesso!');
        return redirect()->route('pacientes.index');
    }

    public function destroy($id)
    {
        Paciente::findOrFail($id)->delete();
        toastr()->success('Paciente excluído com sucesso!');
        return redirect()->route('pacientes.index');
    }
}
