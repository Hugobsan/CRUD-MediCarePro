<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atendimento;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Atendimento::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('pt_BR');
    return [
        'data_atendimento' => $faker->dateTimeBetween('-1 years', 'now'),
        'medico_id' => App\Medico::all()->random()->id,
        'paciente_id' => App\Paciente::all()->random()->id,
    ];
});
