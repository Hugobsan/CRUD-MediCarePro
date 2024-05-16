<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Atendimento extends Model
{
    use SoftDeletes;
    protected $table = 'atendimentos';

    protected $fillable = ['data_atendimento', 'medico_id', 'paciente_id'];

    protected $dates = ['data_atendimento', 'deleted_at'];

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

    public static function getAllAtendimentos()
    {
        return DB::table('atendimentos')
            ->select('id', 'data_atendimento', 'medico.nome as medico', 'paciente.nome as paciente')
            ->join('medicos', 'atendimentos.medico_id', '=', 'medicos.id')
            ->join('pacientes', 'atendimentos.paciente_id', '=', 'pacientes.id')
            ->select('atendimentos.id', 'atendimentos.data_atendimento', 'medicos.nome as medico', 'pacientes.nome as paciente')
            ->get()->toArray();
    }
}
