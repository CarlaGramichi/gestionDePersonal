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

    Route::group(['prefix' => 'agents', 'as' => 'agents.'], function () {
        Route::get('assign/positions', 'AgentAssignController@selectPosition')->name('assign.positions');
        Route::get('assign/positions/types', 'AgentAssignController@selectPositionTypes')->name('assign.positions.types');
        Route::get('assign/positions/{position}/types/agents', 'AgentAssignController@selectAgent')->name('assign.positions.{position}.types.agents');
        Route::get('assign/positions/{position}/types/{positionType}/agents/proposal', 'AgentAssignController@createProposal')->name('assign.positions.{position}.types.{positionType}.agents.proposal');
        Route::get('assign/positions/{position}/types/{positionType}/agents/{agent}/proposal/subject_schedule', 'AgentAssignController@setSubjectSchedule')->name('assign.positions.{position}.types.{positionType}.agents.{agent}.proposal.subject_schedule');
        Route::post('assign/positions/{position}/types/{positionType}/agents/{agent}/proposal/subject_schedule/{subject}', 'AgentAssignController@store')->name('assign.positions.{position}.types.{positionType}.agents.{agent}.proposal.subject_schedule.{subject}.store');
        Route::get('proposals/pending', 'AgentProposalController@index')->name('proposals.pending');
        Route::get('proposals/{agent_position_type_transaction}/documents', 'AgentProposalDocumentController@index')->name('proposals.{agent_position_type_transaction}.documents');
        Route::post('proposals/{agent_position_type_transaction}/documents/upload', 'AgentProposalDocumentController@store')->name('proposals.{agent_position_type_transaction}.documents.upload');
        Route::delete('proposals/{agent_position_type_transaction}/documents/{document}/destroy', 'AgentProposalDocumentController@destroy')->name('proposals.{agent_position_type_transaction}.documents.{document}.destroy');
        Route::get('proposals/{agent_position_type_transaction}/documents/downloadAll', 'AgentProposalDocumentController@downloadAll')->name('proposals.{agent_position_type_transaction}.documents.downloadAll');
        Route::put('proposals/{agent_position_type_transaction}/documents/finish', 'AgentProposalDocumentController@update')->name('proposals.{agent_position_type_transaction}.documents.finish');
        Route::post('proposals/{agent_position_type_transaction}/file', 'AgentProposalController@storeFile')->name('proposals.{agent_position_type_transaction}.file');
        Route::post('proposals/{agent_position_type_transaction}/procedureNumber', 'AgentProposalController@setProcedureNumber')->name('proposals.{agent_position_type_transaction}.procedureNumber');

        Route::resource('assign', AgentAssignController::class)->parameters([
            'assign' => 'agent'
        ]);
    });

    Route::resource('agents', AgentController::class);

    Route::resource('users', UserController::class)->middleware('role:superuser');

    Route::group(['prefix' => 'pof', 'as' => 'pof.'], function () {
        Route::resource('documents', PofDocumentController::class);

        Route::resource('careers', CareerController::class);

        Route::resource('positions', PositionController::class);

        Route::group(['prefix' => 'positions/{position}', 'as' => 'positions.{position}.'], function () {
            Route::resource('types', PositionTypeController::class);

            Route::resource('documents', PositionDocumentController::class);
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

    Route::resource('institutions', InstitutionController::class);


    Route::resource('documents', DocumentController::class);


    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('license_codes', LicenseCodeController::class);
    Route::resource('license_codes_types', LicenseTypeController::class);
    Route::resource('license_officer', LicenseOfficerController::class);

    Route::resource('agent_licenses', AgentLicenseController::class);

    Route::resource('position_type_hours', PositionTypeHourController::class);

    Route::resource('institutional_hours', InstitutionalHourController::class);

    Route::resource('students', StudentController::class);
    Route::post('students/{student}/assign', 'StudentController@assign');
    Route::post('students/{student}/assign/store', 'StudentController@assignStore')->name('students.{student}.assign.store');
});
