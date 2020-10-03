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
    Route::get('/dashboard/po_sent_by_project', 'DashboardController@po_sent_by_project')->name('dashboard.po_sent_by_project');
    Route::get('/dashboard/test', 'DashboardController@test')->name('dashboard.test');

    // data ajax
    Route::get('/powithetas/data', 'DataController@powithetas')->name('powithetas.data');
    Route::get('/migis/data', 'DataController@migis')->name('migis.data');
    Route::get('/incomings/data', 'DataController@incomings')->name('incomings.data');
    Route::get('/progresmrs/data', 'DataController@progresmrs')->name('progresmrs.data');

    Route::get('/powithetas', 'PowithetaController@index')->name('powithetas.index');
    Route::post('/powithetas/import_excel', 'PowithetaController@import_excel')->name('powithetas.import_excel');

    Route::get('/migis', 'MigiController@index')->name('migis.index');
    Route::post('/migis/import_excel', 'MigiController@import_excel')->name('migis.import_excel');

    Route::get('/incomings', 'IncomingController@index')->name('incomings.index');
    Route::post('/incomings/import_excel', 'IncomingController@import_excel')->name('incomings.import_excel');

    Route::get('/progresmrs', 'ProgresmrController@index')->name('progresmrs.index');
    Route::post('/progresmrs/import_excel', 'ProgresmrController@import_excel')->name('progresmrs.import_excel');

    //budget
    Route::resource('budgettype', 'BudgettypeController');
    Route::resource('budget', 'BudgetController');
});
