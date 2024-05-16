<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAtendimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data_atendimento' => 'required|date',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id'
        ];
    }
    
    public function messages()
    {
        return [
            'data_atendimento.required' => 'O campo data do atendimento é obrigatório.',
            'data_atendimento.date' => 'O campo data do atendimento deve ser uma data válida.',
            'medico_id.required' => 'O campo médico é obrigatório.',
            'medico_id.exists' => 'O médico selecionado não existe.',
            'paciente_id.required' => 'O campo paciente é obrigatório.',
            'paciente_id.exists' => 'O paciente selecionado não existe.'
        ];
    }
}
