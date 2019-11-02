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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('agents', AgentController::class);
    Route::get('agents/{agent}/assign', 'AgentAssignController@index');

    Route::resource('users', UserController::class);
    Route::resource('pof', PofController::class);


    Route::get('/home', 'HomeController@index')->name('home');
});