<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'role:superadmin|admin'])
    ->group(function () {
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard/page_2', 'DashboardController@page_2')->name('dashboard.page_2');
    Route::get('/dashboard/page_3', 'DashboardController@page_3')->name('dashboard.page_3');
    Route::get('/dashboard/page_4', 'DashboardController@page_4')->name('dashboard.page_4');
    Route::get('/dashboard/last_month', 'DashboardController@last_month')->name('dashboard.last_month');
    Route::get('/dashboard/yearly', 'DashboardController@yearly')->name('dashboard.yearly');
    Route::get('/dashboard/po_sent_by_project', 'DashboardController@po_sent_by_project')->name('dashboard.po_sent_by_project');
    Route::get('/dashboard/test', 'DashboardController@test')->name('dashboard.test');

    // data ajax
    Route::get('/powithetas/data', 'DataController@powithetas')->name('powithetas.data');
    Route::get('/po20withetas/data', 'DataController@po20withetas')->name('po20withetas.data');  //yearly
    Route::get('/migis/data', 'DataController@migis')->name('migis.data');
    Route::get('/migi20s/data', 'DataController@migi20s')->name('migi20s.data'); // yearly
    Route::get('/incomings/data', 'DataController@incomings')->name('incomings.data');
    Route::get('/incoming20s/data', 'DataController@incoming20s')->name('incoming20s.data'); // Yearly
    Route::get('/progresmrs/data', 'DataController@progresmrs')->name('progresmrs.data');
    Route::get('/budgets/data', 'DataController@budgets')->name('budgets.data');

    Route::get('/powithetas/export_excel', 'PowithetaController@export_excel')->name('powithetas.export_excel');
    Route::get('/powithetas/export_excel_this_month', 'PowithetaController@export_excel_this_month')->name('powithetas.export_excel_this_month');
    Route::get('/powithetas', 'PowithetaController@index')->name('powithetas.index');
    Route::get('/powithetas/truncate', 'PowithetaController@truncate')->name('powithetas.truncate');
    Route::post('/powithetas/import_excel', 'PowithetaController@import_excel')->name('powithetas.import_excel');

    Route::get('/po20withetas', 'Po20withetaController@index')->name('po20withetas.index');
    Route::get('/po20withetas/truncate', 'Po20withetaController@truncate')->name('po20withetas.truncate');
    Route::post('/po20withetas/import_excel', 'Po20withetaController@import_excel')->name('po20withetas.import_excel');

    Route::get('/migis/export_excel', 'MigiController@export_excel')->name('migis.export_excel');
    Route::get('/migis', 'MigiController@index')->name('migis.index');
    Route::get('/migis/truncate', 'MigiController@truncate')->name('migis.truncate');
    Route::post('/migis/import_excel', 'MigiController@import_excel')->name('migis.import_excel');

    Route::get('/migi20s', 'Migi20Controller@index')->name('migi20s.index');
    Route::get('/migi20s/truncate', 'Migi20Controller@truncate')->name('migi20s.truncate');
    Route::post('/migi20s/import_excel', 'Migi20Controller@import_excel')->name('migi20s.import_excel');

    Route::get('/incomings/export_excel', 'IncomingController@export_excel')->name('incomings.export_excel');
    Route::get('/incomings', 'IncomingController@index')->name('incomings.index');
    Route::get('/incomings/truncate', 'IncomingController@truncate')->name('incomings.truncate');
    Route::post('/incomings/import_excel', 'IncomingController@import_excel')->name('incomings.import_excel');

    Route::get('/incoming20s', 'Incoming20Controller@index')->name('incoming20s.index');
    Route::get('/incoming20s/truncate', 'Incoming20Controller@truncate')->name('incoming20s.truncate');
    Route::post('/incoming20s/import_excel', 'Incoming20Controller@import_excel')->name('incoming20s.import_excel');

    Route::get('/progresmrs', 'ProgresmrController@index')->name('progresmrs.index');
    Route::get('/progresmrs/truncate', 'ProgresmrController@truncate')->name('progresmrs.truncate');
    Route::post('/progresmrs/import_excel', 'ProgresmrController@import_excel')->name('progresmrs.import_excel');

    //budget
    Route::resource('budgettypes', 'BudgettypeController');
    Route::resource('budgets', 'BudgetController');
});
