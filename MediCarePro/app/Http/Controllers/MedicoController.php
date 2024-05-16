<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\SaveMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Medico;
use App\Paciente;
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
        $pacientes = Paciente::all();
        return view('medicos.show', compact('medico', 'atendimentos', 'pacientes'));
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

    /**
     * Exporta os dados do médico em um arquivo CSV
     */
    public function export($id){
        $medico = Medico::findOrFail($id);
        $filename = 'medico_' . $medico->id . '.csv';
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $handle = fopen('php://output', 'w');
        fputcsv($handle, array('ID', 'Nome', 'CRM', 'Especialidade', 'Telefone', 'E-mail'));

        fputcsv($handle, array($medico->id, $medico->nome, $medico->crm));

        //Atendimentos
        fputcsv($handle, array('ID', 'Data do Atendimento', 'Paciente'));
        foreach($medico->atendimentos as $atendimento){
            fputcsv($handle, array($atendimento->id, $atendimento->data_atendimento, $atendimento->paciente->nome, $atendimento->paciente->cpf));
        }

        fclose($handle);

        return response()->stream(function() use($handle) {
            fclose($handle);
        }, 200, $headers);
    }
}
