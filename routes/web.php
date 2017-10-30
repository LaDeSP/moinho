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

Route::group(['middleware' => ['web']], function () {//trocar web pra auth quando for colocar restrição
    Route::resource('dados_inscricao', 'dados_inscricaoController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('organizations', 'OrganizationController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('escola', 'escolaController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/logout', 'Auth\LoginController@logout');