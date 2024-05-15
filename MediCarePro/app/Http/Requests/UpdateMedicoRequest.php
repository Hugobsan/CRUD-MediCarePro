<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:8|min:7',
            'especialidade' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres',
            'crm.required' => 'O campo CRM é obrigatório',
            'crm.max' => 'O CRM deve ter no máximo 8 caracteres',
            'crm.min' => 'O CRM deve ter no mínimo 7 caracteres',
            'especialidade.required' => 'O campo especialidade é obrigatório',
            'especialidade.max' => 'A especialidade deve ter no máximo 255 caracteres',
        ];
    }
}
