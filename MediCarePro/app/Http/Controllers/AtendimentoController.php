<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Exports\AtendimentoExport;
use App\Http\Requests\AtendimentoRequest;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;
use Excel;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::paginate(10);
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('atendimentos.index', compact('atendimentos','pacientes','medicos'));
    }

    public function store(AtendimentoRequest $request)
    {
        Atendimento::create($request->all());
        toastr()->success('Atendimento cadastrado com sucesso!');
        return redirect()->back();
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
