<?php

Route::get('/', function () {
    return view('frontend.frontend');
});
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

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

    // Servicios
    Route::delete('servicios/destroy', 'ServiciosController@massDestroy')->name('servicios.massDestroy');
    Route::post('servicios/parse-csv-import', 'ServiciosController@parseCsvImport')->name('servicios.parseCsvImport');
    Route::post('servicios/process-csv-import', 'ServiciosController@processCsvImport')->name('servicios.processCsvImport');
    Route::resource('servicios', 'ServiciosController');

    // Barbershops
    Route::delete('barbershops/destroy', 'BarbershopsController@massDestroy')->name('barbershops.massDestroy');
    Route::post('barbershops/parse-csv-import', 'BarbershopsController@parseCsvImport')->name('barbershops.parseCsvImport');
    Route::post('barbershops/process-csv-import', 'BarbershopsController@processCsvImport')->name('barbershops.processCsvImport');
    Route::resource('barbershops', 'BarbershopsController');

    // Clientes
    Route::delete('clientes/destroy', 'ClientesController@massDestroy')->name('clientes.massDestroy');
    Route::post('clientes/parse-csv-import', 'ClientesController@parseCsvImport')->name('clientes.parseCsvImport');
    Route::post('clientes/process-csv-import', 'ClientesController@processCsvImport')->name('clientes.processCsvImport');
    Route::resource('clientes', 'ClientesController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Barberos
    Route::delete('barberos/destroy', 'BarberosController@massDestroy')->name('barberos.massDestroy');
    Route::post('barberos/media', 'BarberosController@storeMedia')->name('barberos.storeMedia');
    Route::post('barberos/ckmedia', 'BarberosController@storeCKEditorImages')->name('barberos.storeCKEditorImages');
    Route::post('barberos/parse-csv-import', 'BarberosController@parseCsvImport')->name('barberos.parseCsvImport');
    Route::post('barberos/process-csv-import', 'BarberosController@processCsvImport')->name('barberos.processCsvImport');
    Route::resource('barberos', 'BarberosController');

    // Turnos
    Route::delete('turnos/destroy', 'TurnosController@massDestroy')->name('turnos.massDestroy');
    Route::post('turnos/parse-csv-import', 'TurnosController@parseCsvImport')->name('turnos.parseCsvImport');
    Route::post('turnos/process-csv-import', 'TurnosController@processCsvImport')->name('turnos.processCsvImport');
    Route::resource('turnos', 'TurnosController');

    // Herramientas
    Route::delete('herramienta/destroy', 'HerramientasController@massDestroy')->name('herramienta.massDestroy');
    Route::post('herramienta/media', 'HerramientasController@storeMedia')->name('herramienta.storeMedia');
    Route::post('herramienta/ckmedia', 'HerramientasController@storeCKEditorImages')->name('herramienta.storeCKEditorImages');
    Route::post('herramienta/parse-csv-import', 'HerramientasController@parseCsvImport')->name('herramienta.parseCsvImport');
    Route::post('herramienta/process-csv-import', 'HerramientasController@processCsvImport')->name('herramienta.processCsvImport');
    Route::resource('herramienta', 'HerramientasController');

    // Insumos
    Route::delete('insumos/destroy', 'InsumosController@massDestroy')->name('insumos.massDestroy');
    Route::post('insumos/media', 'InsumosController@storeMedia')->name('insumos.storeMedia');
    Route::post('insumos/ckmedia', 'InsumosController@storeCKEditorImages')->name('insumos.storeCKEditorImages');
    Route::post('insumos/parse-csv-import', 'InsumosController@parseCsvImport')->name('insumos.parseCsvImport');
    Route::post('insumos/process-csv-import', 'InsumosController@processCsvImport')->name('insumos.processCsvImport');
    Route::resource('insumos', 'InsumosController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
