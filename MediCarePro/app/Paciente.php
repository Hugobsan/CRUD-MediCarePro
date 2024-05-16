<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;

    protected $table = 'pacientes';

    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'email'];

    protected $dates = ['data_nascimento', 'deleted_at'];

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

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function getCpfAttribute($value)
    {
        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, -2);
    }
}
