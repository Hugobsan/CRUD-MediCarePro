<?php

namespace App\Exports;

use App\Medico;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MedicoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Medico::all();
        return collect(Medico::getAllMedicos());
    }

    public function headings(): array
    {
        return [
            'id',
            'nome',
            'crm',
            'especialidade'
        ];
    }
}
