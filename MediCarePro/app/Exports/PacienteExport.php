<?php

namespace App\Exports;

use App\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;

class PacienteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Paciente::all();
        return collect(Paciente::getAllPacientes());
    }

    public function headings(): array
    {
        return [
            'id',
            'nome',
            'cpf',
            'data_nascimento',
            'email'
        ];
    }
}
