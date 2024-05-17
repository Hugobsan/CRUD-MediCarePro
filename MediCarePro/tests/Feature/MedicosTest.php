<?php

namespace Tests\Feature;

use App\Medico;
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
    }

    /**
     * Test if the edit page is accessible.
     *
     * @return void
     */
    public function testEditPageIsAccessible()
    {
        $id = Medico::all()->random()->id;
        $response = $this->get(route('medicos.edit', $id));

        $response->assertStatus(200);
    }

    /**
     * Test if the edit form is rendered correctly.
     *
     * @return void
     */
    public function testEditFormIsRenderedCorrectly()
    {
        $medico = Medico::all()->random();
        $response = $this->get(route('medicos.edit', $medico->$id));

        $response->assertSee('Editar Médico');
        $response->assertSee($medico->nome);
        $response->assertSee($medico->crm);
        $response->assertSee($medico->especialidade);
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
            'crm' => $faker->randomNumber(5) . '-' . $faker->randomLetter() . $faker->randomLetter(),
            'especialidade' => $faker->word
        ];

        $id = Medico::all()->random()->id;

        $response = $this->put(route('medicos.update', $id), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('medicos.index'));
    }

    /**
     * Test if the show page is accessible.
     * 
     * @return void
     */
    public function testShowPageIsAccessible()
    {
        $medico = Medico::all()->random();
        $response = $this->get(route('medicos.show', $medico->id));

        $response->assertStatus(200);
    }

    /**
     * Test if the show page is rendered correctly.
     */
    public function testShowPageIsRenderedCorrectly()
    {
        $medico = Medico::all()->random();
        $response = $this->get(route('medicos.show', $medico->id));

        $response->assertSee($medico->nome);
        $response->assertSee($medico->crm);
        $response->assertSee($medico->especialidade);
    }

    /**
     * Test if the delete works correctly.
     *
     * @return void
     */
    public function testDelete()
    {
        $id = Medico::all()->random()->id;
        $response = $this->delete(route('medicos.destroy', $id));

        $response->assertStatus(302);
        $response->assertRedirect(route('medicos.index'));
    }

    /**
     * Test if the export works correctly.
     *
     * @return void
     */
    public function testExport()
    {
        $response = $this->get(route('medicos.export'));

        $response->assertStatus(200);
    }
}
