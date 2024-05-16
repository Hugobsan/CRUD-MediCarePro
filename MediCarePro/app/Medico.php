<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes;
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

    public function setCrmAttribute($value)
    {
        $this->attributes['crm'] = strtoupper(str_replace('-', '', $value));
    }
}
