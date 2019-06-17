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

/**
 * Routes do index do sistema
 */
Route::get('/', ['as' => 'site.index', 'uses' => 'HomeController@index']);
Route::get('/login', ['as' => 'site.login', 'uses' => 'HomeController@login']);
Route::post('/signIn', ['as' => 'site.signIn', 'uses' => 'HomeController@signIn']);

Route::get('/cadastro', ['as' => 'site.cadastro', 'uses' => 'HomeController@signUp']);
Route::post('/voluntario/signUp', ['as' => 'voluntario.signUp', 'uses' => 'VoluntarioController@insert']);

/**
 * Routes dos voluntários
 *
 * @middleware CheckVoluntario
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/voluntario', ['as' => 'voluntario.index', 'uses' => 'VoluntarioController@index'])->middleware("CheckVoluntario");
});

/**
 * Routes das instituições
 *
 * @middleware CheckInstituicao
 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/instituicao', 'IntituicaoController@index')->middleware("CheckInstituicao");
});
