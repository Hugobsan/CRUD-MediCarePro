<?php
// app/Helpers/Helper.php

if (! function_exists('remove_mask')) {
    /**
     * Remove máscara de CPF, CNPJ, Telefone, CEP, etc.
     */
    function remove_mask($value){
        return preg_replace('/[^0-9]/', '', $value);
    }
}