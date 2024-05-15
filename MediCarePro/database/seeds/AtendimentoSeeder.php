<?php

use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Atendimento::class, 30)->create();
    }
}
