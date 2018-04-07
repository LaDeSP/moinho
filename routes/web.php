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
    //Resource
    Route::resource('dados_inscricao', 'dados_inscricaoController');
    Route::resource('escola', 'escolaController');
    Route::resource('matricula', 'matriculaController');
    Route::resource('NomeTurma', 'nome_turmaController');
    Route::resource('turma', 'turmaController');
    Route::resource('listar_matriculas', 'listar_matriculasController');
    Route::resource('lista_matriculas_irregulares', 'lista_matriculas_irregularesController');
    Route::resource('colaborador', 'colaboradorController');
    Route::resource('disciplina', 'disciplinaController');
    Route::resource('turma_disciplina', 'turma_disciplinaController');
    Route::resource('documento', 'documentoController');

    //Get
    Route::get('mostra_regulares', 'listar_matriculasController@index');
    Route::get('mostra_irregulares', 'lista_matriculas_irregularesController@index');
    Route::get('/matricula', 'listar_matriculasController@matricula');
    Route::get('/pessoa', 'listar_matriculasController@pessoa');
    Route::get('/ajudinha', 'listar_matriculasController@ajudinha');
    Route::get('/inscricao', 'listar_matriculasController@inscricao');
    Route::get('/dados', 'listar_matriculasController@dados_inscricao');
    Route::get('/nome_turma', 'listar_matriculasController@nome_turma');
    Route::get('/relatorio_inscricao', 'relatorioController@export');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('auth/logout', 'Auth\LoginController@logout');
});


Auth::routes();