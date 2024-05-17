<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicosTest extends TestCase
{
    /**
     * Test if the create page is accessible.
     *
     * @return void
     */
    public function testCreatePageIsAccessible()
    {
        $response = $this->get(route('medicos.create'));

        $response->assertStatus(200);
    }

    /**
     * Test if the form is rendered correctly.
     *
     * @return void
     */
    public function testFormIsRenderedCorrectly()
    {
        $response = $this->get(route('medicos.create'));

        $response->assertSee('Cadastrar Novo Médico');
        $response->assertSee('Nome');
        $response->assertSee('CRM');
        $response->assertSee('Especialidade');
        $response->assertSee('Salvar');
    }

    /**
     * Test if the form submission works correctly.
     *
     * @return void
     */
    public function testFormSubmission()
    {
        $faker = \Faker\Factory::create('pt_BR');
        
        $data = [
            'nome' => $faker->name,
            'crm' => $faker->randomNumber(5) . '-' . $faker->randomLetter() . $faker->randomLetter(),
            'especialidade' => $faker->word
        ];

        $response = $this->post(route('medicos.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('medicos.index'));
        // Add more assertions if needed
    }
}