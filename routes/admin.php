<?php
#################   Constants   #################
    //Directory Separator Constant
    define('DS', DIRECTORY_SEPARATOR);
#################   Constants   #################

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    // Authentication Routes

    Auth::routes(['register' => false]);

    Route::get('/home', 'HomeController@index')->name('home');


    Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function (){

        // Dashboard Routes
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // User Routes
        Route::resource('user', 'UserController')->except('show');

        // Hospital Routes
        Route::resource('hospital', 'HospitalController')->except('show');

        // Department Routes
        Route::resource('department', 'DepartmentController')->except('show');


        // Doctor Routes
        Route::resource('doctor', 'DoctorController')->except('show');

        // Patient Routes
        Route::resource('patient', 'PatientController')->except('show');

        // MedicalFile Routes
        Route::resource('medicalFile', 'MedicalFileController')->except('show');

        // Ticket Routes
        Route::get('ticket/create/{medical_file_id}', 'TicketController@create') -> name('ticket.create');
        Route::resource('ticket', 'TicketController') -> except('create');

    });

});
