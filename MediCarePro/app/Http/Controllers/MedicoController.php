<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\SaveMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(SaveMedicoRequest $request)
    {
        Medico::create($request->all());
        toastr()->success('Médico cadastrado com sucesso!');
        return redirect()->route('medicos.index');
    }

    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        $atendimentos = $medico->atendimentos()->orderBy('data_atendimento', 'desc')->paginate(10);
        return view('medicos.show', compact('medico', 'atendimentos'));
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(UpdateMedicoRequest $request, $id)
    {
        Medico::findOrFail($id)->update($request->all());
        toastr()->success('Médico atualizado com sucesso!');
        return redirect()->route('medicos.index');
    }

    public function destroy($id)
    {
        Medico::findOrFail($id)->delete();
        toastr()->success('Médico excluído com sucesso!');
        return redirect()->route('medicos.index');
    }
}
