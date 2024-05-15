<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = ['nome', 'crm', 'especialidade'];

    //Relação 1:N com a tabela atendimentos
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

    //Relação N:N com a tabela pacientes
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'atendimentos');
    }

    public function getCrmAttribute()
    {
        return substr($this->attributes['crm'], 0,5) . '-' . substr($this->attributes['crm'], 5, 2);
    }
}
