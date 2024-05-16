<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\SaveAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(SaveAtendimentoRequest $request)
    {
        Atendimento::create($request->all());
        toastr()->success('Atendimento cadastrado com sucesso!');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateAtendimentoRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Atendimento::findOrFail($id)->delete();
        toastr()->success('Atendimento excluído com sucesso!');
        return redirect()->back();
    }

    public function export($id){
        
    }
}
