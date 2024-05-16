<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Verifica se o valor contém apenas dígitos, se não, remove caracteres não numéricos
        $cpf = ctype_digit($value) ? $value : preg_replace('/\D/', '', $value);
    
        // Verifica se o CPF tem 11 dígitos e se não possui todos os dígitos iguais
        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }
    
        // Função para calcular dígito verificador
        $calculaDigito = function($cpf, $pos) {
            $soma = 0;
            for ($i = 0; $i < $pos; $i++) {
                $soma += $cpf[$i] * (($pos + 1) - $i);
            }
            return ((10 * $soma) % 11) % 10;
        };
    
        // Verifica os dois dígitos verificadores
        return $cpf[9] == $calculaDigito($cpf, 9) && $cpf[10] == $calculaDigito($cpf, 10);
    }
    
    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O CPF informado não é válido.';
    }
}
