<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    use SoftDeletes;
    protected $table = 'atendimentos';

    protected $fillable = ['data_atendimento', 'medico_id', 'paciente_id'];

    //Relação N:1 com a tabela medicos
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    //Relação N:1 com a tabela pacientes
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
