<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Exports\AtendimentoExport;
use App\Http\Requests\AtendimentoRequest;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::paginate(10);
        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('atendimentos.create', compact('medicos', 'pacientes'));
    }

    public function store(AtendimentoRequest $request)
    {
        Atendimento::create($request->all());
        toastr()->success('Atendimento cadastrado com sucesso!');
        return redirect()->back();
    }

    public function show($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    public function edit($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('atendimentos.edit', compact('atendimento', 'medicos', 'pacientes'));
    }

    public function update(AtendimentoRequest $request, $id)
    {
        Atendimento::findOrFail($id)->update($request->all());
        toastr()->success('Atendimento atualizado com sucesso!');
        return redirect()->route('atendimentos.index');
    }

    public function destroy($id)
    {
        Atendimento::findOrFail($id)->delete();
        toastr()->success('Atendimento excluído com sucesso!');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new AtendimentoExport, 'atendimentos.csv');
    }
}
