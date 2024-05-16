<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\Cpf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('pt_BR');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Registra a validação customizada 'cpf'
        Validator::extend('cpf', function ($attribute, $value, $parameters, $validator) {
            return (new Cpf)->passes($attribute, $value);
        });

        // Mensagem de erro personalizada para a validação 'cpf'
        Validator::replacer('cpf', function ($message, $attribute, $rule, $parameters) {
            return 'O CPF informado não é válido.';
        });
    }
}
