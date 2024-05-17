<?php

namespace Tests\Feature;

use App\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacientesTest extends TestCase
{
    /**
     * Test if the create page is accessible.
     *
     * @return void
     */
    public function testCreatePageIsAccessible()
    {
        $response = $this->get(route('pacientes.create'));

        $response->assertStatus(200);
    }

    /**
     * Test if the form is rendered correctly.
     *
     * @return void
     */
    public function testFormIsRenderedCorrectly()
    {
        $response = $this->get(route('pacientes.create'));

        $response->assertSee('Cadastrar Novo Paciente');
        $response->assertSee('Nome');
        $response->assertSee('CPF');
        $response->assertSee('E-mail');
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
            'cpf' => $faker->cpf,
            'email' => $faker->email,
            'data_nascimento' => $faker->date('Y-m-d')
        ];

        $response = $this->post(route('pacientes.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('pacientes.index'));
    }

    /**
     * Test if the edit page is accessible.
     *
     * @return void
     */
    public function testEditPageIsAccessible()
    {
        $id = Paciente::all()->random()->id;
        $response = $this->get(route('pacientes.edit', $id));

        $response->assertStatus(200);
    }

    /**
     * Test if the edit form is rendered correctly.
     *
     * @return void
     */
    public function testEditFormIsRenderedCorrectly()
    {
        $paciente = Paciente::all()->random();
        $response = $this->get(route('pacientes.edit', $paciente->id));

        $response->assertSee('Editar Paciente');
        $response->assertSee($paciente->nome);
        $response->assertSee($paciente->cpf);
        $response->assertSee($paciente->email);
        $response->assertSee('Salvar');
    }

    /**
     * Test if the edit form submission works correctly.
     *
     * @return void
     */
    public function testEditFormSubmission()
    {
        $faker = \Faker\Factory::create('pt_BR');

        $data = [
            'nome' => $faker->name,
            'cpf' => $faker->cpf,
            'email' => $faker->email,
            'data_nascimento' => $faker->date('Y-m-d')
        ];

        $id = Paciente::all()->random()->id;
        $response = $this->put(route('pacientes.update', $id), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('pacientes.index'));
    }

    /**
     * Test if the show page is accessible.
     * 
     * @return void
     */
    public function testShowPageIsAccessible()
    {
        $id = Paciente::all()->random()->id;
        $response = $this->get(route('pacientes.show', $id));

        $response->assertStatus(200);
    }

    /**
     * Test if the show page is rendered correctly.
     */
    public function testShowPageIsRenderedCorrectly()
    {
        $paciente = Paciente::all()->random();
        $response = $this->get(route('pacientes.show', $paciente->id));

        $response->assertSee('Paciente');
        $response->assertSee($paciente->nome);
        $response->assertSee($paciente->cpf);
        $response->assertSee($paciente->email);
        $response->assertSee('Data de Nascimento');
    }

    /**
     * Test if the delete works correctly.
     *
     * @return void
     */
    public function testDeleteWorksCorrectly()
    {
        $id = Paciente::all()->random()->id;
        $response = $this->delete(route('pacientes.destroy', $id));

        $response->assertStatus(302);
        $response->assertRedirect(route('pacientes.index'));
    }

    /**
     * Test if the export page is accessible.
     *
     * @return void
     */
    public function testExportPageIsAccessible()
    {
        $response = $this->get(route('pacientes.export'));

        $response->assertStatus(200);
    }
}
