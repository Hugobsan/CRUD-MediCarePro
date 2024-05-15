<?php

namespace App\Http\Controllers;

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
        $dados = $request->all();

        //Removendo traço do crm
        $dados['crm'] = str_replace('-', '', $request->crm);
        Medico::create($dados);
        toastr()->success('Médico cadastrado com sucesso!');
        return redirect()->route('medicos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateMedicoRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Medico::findOrFail($id)->delete();
        toastr()->success('Médico excluído com sucesso!');
        return redirect()->route('medicos.index');
    }
}
