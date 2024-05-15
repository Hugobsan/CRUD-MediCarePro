<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('pt_BR');
    return [
        'nome' => $faker->name,
        'cpf' => remove_mask($faker->unique()->cpf),
        'data_nascimento' => $faker->date,
        'email' => $faker->unique()->safeEmail,
    ];
});
