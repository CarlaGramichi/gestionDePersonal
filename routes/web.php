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

    /* Agents */
    Route::resource('agents', AgentController::class);
    Route::get('agents/{agent}/assign', 'AgentAssignController@index');
    /* ./Agents */

    /* Users */
    Route::resource('users', UserController::class);
    /* ./Users */

    /* POF */
    Route::resource('pof_document', PofDocumentController::class);

    Route::group(['prefix' => 'pof', 'as' => 'pof.'], function () {
        Route::resource('careers', CareerController::class);
    });

    Route::group(['prefix' => 'pof/careers/{career}', 'as' => 'pof.careers.{career}.'], function () {
        Route::resource('courses', CareerCourseController::class);
    });

    Route::group(['prefix' => 'pof/careers/{career}/courses/{course}', 'as' => 'pof.careers.{career}.courses.{course}.'], function () {
        Route::resource('divisions', CareerCourseDivisionController::class);
    });

    /* ./POF */

    Route::get('/home', 'HomeController@index')->name('home');
});