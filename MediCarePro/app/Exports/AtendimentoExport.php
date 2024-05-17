<?php

namespace App\Exports;

use App\Atendimento;
use Maatwebsite\Excel\Concerns\FromCollection;

class AtendimentoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Atendimento::getAllAtendimentos());
    }

    public function headings(): array
    {
        return [
            'id',
            'data_atendimento',
            'medico',
            'paciente'
        ];
    }
}
