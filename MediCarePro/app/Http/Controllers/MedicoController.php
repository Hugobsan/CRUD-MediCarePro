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
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        //
    }

    public function store(SaveMedicoRequest $request)
    {
        //
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
        //
    }
}
