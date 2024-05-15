<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medico;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Medico::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('pt_BR');
    return [
        'nome' => $faker->name,
        'crm' => $faker->randomNumber(5) . $faker->randomLetter . $faker->randomLetter, // 5 números e 2 letras
        'especialidade' => $faker->word,
    ];
});
