<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Transactiontypes
    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');
    Route::resource('transaction-types', 'TransactionTypeController');

    // Incomesources
    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');
    Route::resource('income-sources', 'IncomeSourceController');

    // Clientstatuses
    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');
    Route::resource('client-statuses', 'ClientStatusController');

    // Projectstatuses
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Clients
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    // Projects
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectController');

    // Notes
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::resource('notes', 'NoteController');

    // Documents
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::resource('documents', 'DocumentController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Clientreports
    Route::delete('creports/destroy', 'ClientReportController@massDestroy')->name('reports.massDestroy');
    Route::resource('reports', 'ClientReportController');

     // Mothers
    Route::delete('mothers/destroy', 'MothersController@massDestroy')->name('mothers.massDestroy');
    Route::post('mothers/parse-csv-import', 'MothersController@parseCsvImport')->name('mothers.parseCsvImport');
    Route::post('mothers/process-csv-import', 'MothersController@processCsvImport')->name('mothers.processCsvImport');
    Route::resource('mothers', 'MothersController');
     // Infants
     Route::delete('infants/destroy', 'InfantsController@massDestroy')->name('infants.massDestroy');
     Route::resource('infants', 'InfantsController');

     // Facilities
     Route::delete('facilities/destroy', 'FacilitiesController@massDestroy')->name('facilities.massDestroy');
     Route::resource('facilities', 'FacilitiesController');

     Route::delete('health-workers/destroy', 'HealthWorkersController@massDestroy')->name('health-workers.massDestroy');
    Route::resource('health-workers', 'HealthWorkersController');

    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

    Route::delete('visit-type/destroy', 'VisitTypeController@massDestroy')->name('visit-type.massDestroy');
    Route::resource('visit-type', 'VisitTypeController');

    //Appointments
    Route::delete('appointments/destroy', 'AppointmentController@massDestroy')->name('appointments.massDestroy');
    Route::resource('appointments', 'AppointmentController');

    //Appointments
    Route::delete('subcounties/destroy', 'SubcountyController@massDestroy')->name('subcounties.massDestroy');
    Route::resource('subcounties', 'SubcountyController');

});


