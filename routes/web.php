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

Route::get('/operator', 'AuthenticationController@operator');
Route::get('/patient', 'AuthenticationController@patient');
Route::post('/login', 'AuthenticationController@login');
Route::get('/logout', 'AuthenticationController@logout');
Route::get('/login', function () {
    return redirect('/');
});


Route::resource('patients', 'PatientController');
Route::resource('reports', 'ReportController');

//Route::get('/test', 'HomeController@test');
