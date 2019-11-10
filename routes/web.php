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

    Route::get('dashboard', 'DashboardController@index');

    Route::get('/', function () {
        return redirect('dashboard');
    });

    /* Agents */
    Route::resource('agents', AgentController::class);

    Route::get('agents_assign/{agent}/positions', 'AgentAssignController@positions');
    Route::get('agents_assign/{agent}/positions/position_types', 'AgentAssignController@position_types')->name('agents_assign.{agent}.positions');
    Route::resource('agents_assign', AgentAssignController::class)->parameters([
        'agents_assign' => 'agent'
    ]);


    /* ./Agents */

    /* Users */
    Route::resource('users', UserController::class)->middleware('role:superuser');
    /* ./Users */

    /* POF */
//    Route::resource('pof_document', PofDocumentController::class);

    Route::group(['prefix' => 'pof', 'as' => 'pof.'], function () {
        Route::resource('documents', PofDocumentController::class);

        Route::resource('careers', CareerController::class);

        Route::resource('positions', PositionController::class);

        Route::group(['prefix' => 'positions/{position}', 'as' => 'positions.{position}.'], function () {
            Route::resource('types', PositionTypeController::class);
        });
    });

    Route::group(['prefix' => 'pof/careers/{career}', 'as' => 'pof.careers.{career}.'], function () {
        Route::resource('courses', CareerCourseController::class);
    });

    Route::group(['prefix' => 'pof/careers/{career}/courses/{course}', 'as' => 'pof.careers.{career}.courses.{course}.'], function () {
        Route::resource('divisions', CareerCourseDivisionController::class);
    });

    Route::group(['prefix' => 'pof/careers/{career}/courses/{course}', 'as' => 'pof.careers.{career}.courses.{course}.'], function () {
        Route::resource('subjects', SubjectController::class);
    });

    /* ./POF */

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('license_codes', LicenseCodeController::class);

});