<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $table = 'pacientes';

    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'email'];

    //Relação N:N com a tabela medicos
    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'atendimentos');
    }

    //Relação 1:N com a tabela atendimentos
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }
}
