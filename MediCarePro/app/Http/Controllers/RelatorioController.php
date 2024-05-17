<?php

namespace App\Http\Controllers;

use App\Exports\RelatorioExport;
use App\Medico;
use Illuminate\Http\Request;
use Excel;

class RelatorioController extends Controller
{
    public function atendimentosPorMedico(Request $request)
    {   
        //Caso a busca seja por todo o periodo
        if($request->todo_periodo){
            $medicos = Medico::whereHas('atendimentos')->get();
        }else{
            $medicos = Medico::whereHas('atendimentos', function($query) use ($request){
                $query->whereBetween('data', [$request->data_inicio, $request->data_fim]);
            })->get();
        }

        if($request->tipo_export == 'csv'){
            $data = [];

            $headings = [
                'Id Atendimento',
                'Medico',
                'CRM',
                'Especialidade',
                'Paciente',
                'CPF',
                'E-mail',
                'Data de Atendimento'
            ];

            foreach($medicos as $medico){
                foreach($medico->atendimentos as $atendimento){
                    $data[] = [
                        $atendimento->id,
                        $medico->nome,
                        $medico->crm,
                        $medico->especialidade,
                        $atendimento->paciente->nome,
                        $atendimento->paciente->cpf,
                        $atendimento->paciente->email,
                        $atendimento->data_atendimento->format('d/m/Y')
                    ];
                }
            }

            return Excel::download(new RelatorioExport($data, $headings), 'atendimentos_por_medico.csv');
        }
        else if($request->tipo_export == 'pdf'){
            
        }
        else{
            toastr()->error('Tipo de exportação inválido!');
            return redirect()->back();
        }
    }
}
