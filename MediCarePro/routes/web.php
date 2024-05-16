<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@index')->name('home');

Route::resource('pacientes', 'PacienteController');
Route::resource('medicos', 'MedicoController');
Route::group(array('prefix' => 'medicos', ['namespace' => 'medicos'], 'as' => 'medicos.'), function () {
    Route::get('/export', 'MedicoController@export')->name('export');
});
Route::resource('atendimentos', 'AtendimentoController');

