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
    return view('welcome');
});

Route::get('/cadastro', 'VoluntarioController@signUp');
Route::post('/cadastro', 'VoluntarioController@insert');

Route::get('/login', 'VoluntarioController@signIn');
Route::post('/login', 'VoluntarioController@login');

Route::get('/minhaconta', 'VoluntarioController@myAccount');
