<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {//trocar web pra auth quando for colocar restrição
    Route::resource('dados_inscricao', 'dados_inscricaoController');
   // Route::post('dados_inscricao/busca', 'dados_inscricaoController@pesquisa');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('escola', 'escolaController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('matricula', 'matriculaController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('NomeTurma', 'nome_turmaController');
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('turma', 'turmaController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('listar_matriculas', 'listar_matriculasController');
    Route::get('mostra_regulares', 'listar_matriculasController@index');

});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('lista_matriculas_irregulares', 'lista_matriculas_irregularesController');
    Route::get('mostra_irregulares', 'lista_matriculas_irregularesController@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/logout', 'Auth\LoginController@logout');