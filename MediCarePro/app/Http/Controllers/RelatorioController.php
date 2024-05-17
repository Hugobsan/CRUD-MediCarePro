<?php

namespace App\Http\Controllers;

use App\Exports\RelatorioExport;
use App\Medico;
use Illuminate\Http\Request;
use Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function atendimentosPorMedico(Request $request)
    {
        //Caso a busca seja por todo o periodo
        if ($request->todo_periodo) {
            $medicos = Medico::whereHas('atendimentos')->get();
        } else {
            $medicos = Medico::whereHas('atendimentos', function ($query) use ($request) {
                $query->whereBetween('data_atendimento', [$request->data_inicio, $request->data_fim]);
            })->get();
        }

        if ($request->tipo_export == 'csv') {
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

            foreach ($medicos as $medico) {
                foreach ($medico->atendimentos as $atendimento) {
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
        } else if ($request->tipo_export == 'pdf') {
            $html = view('medicos.reports.atendimentosPdf', compact('medicos', 'request'))->render();

            $pdf = PDF::loadHTML($html);

            $pdf->setPaper('A4', 'portrait');

            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true
            ]);
            // Adicionando rodapé
            $pdf->output();
            $dompdf = $pdf->getDomPDF();
            $canvas = $dompdf->getCanvas();
            $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
                $canvas->text(
                    520,  // posição X
                    820,  // posição Y
                    "Página $pageNumber de $pageCount",
                    $fontMetrics->get_font('Arial', 'normal'),
                    10
                );
            });

            return $pdf->stream('atendimentos_por_medico.pdf');
        } else {
            toastr()->error('Tipo de exportação inválido!');
            return redirect()->back();
        }
    }
}
