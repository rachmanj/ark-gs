<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('auth.login');
    return view('404');
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
    Route::get('/dashboard/last_month', 'DashboardlastmonthController@index')->name('dashboard.last_month');
    Route::get('/dashboard/yearly', 'DashboardyearlyController@index')->name('dashboard.yearly.index');
    Route::post('/dashboard/yearly', 'DashboardyearlyController@display')->name('dashboard.yearly_display');
    Route::get('/dashboard/po_sent_by_project', 'DashboardController@po_sent_by_project')->name('dashboard.po_sent_by_project');
    Route::get('/dashboard/test', 'DashboardController@test')->name('dashboard.test');
    Route::get('/dashboard/monthly', 'DashboardMonthlyController@index')->name('dashboard.monthly_index');
    Route::post('/dashboard/monthly', 'DashboardMonthlyController@display')->name('dashboard.monthly_display');

    // data ajax
    Route::get('/powithetas/data', 'DataController@powithetas')->name('powithetas.data');
    Route::get('/powithetas/this_month/data', 'DataController@powithetas_this_month')->name('powithetas_this_month.data');
    Route::get('/powithetas/grpo/data', 'DataController@grpo_this_month')->name('grpo_this_month.data');
    Route::get('/grpos/data', 'DataController@grpos')->name('grpos.data');
    Route::get('/grpos/this_month/data', 'DataController@grpos_this_month')->name('grpos_this_month.data');
    Route::get('/po20withetas/data', 'DataController@po20withetas')->name('po20withetas.data');  //yearly
    Route::get('/migis/data', 'DataController@migis')->name('migis.data');
    Route::get('/migi20s/data', 'DataController@migi20s')->name('migi20s.data'); // yearly
    Route::get('/incomings/data', 'DataController@incomings')->name('incomings.data');
    Route::get('/incoming20s/data', 'DataController@incoming20s')->name('incoming20s.data'); // Yearly
    Route::get('/progresmrs/data', 'DataController@progresmrs')->name('progresmrs.data');
    Route::get('/budgets/data', 'DataController@budgets')->name('budgets.data');
    Route::get('/history/data', 'DataController@histories')->name('history.data');

    Route::get('/powithetas/export_excel', 'PowithetaController@export_excel')->name('powithetas.export_excel');
    Route::get('/powithetas/export_excel_this_month', 'PowithetaController@export_excel_this_month')->name('powithetas.export_excel_this_month');
    // Route::get('/powithetas/export_grpo_this_month', 'PowithetaController@export_grpo_this_month')->name('powithetas.export_grpo_this_month');
    Route::get('/powithetas', 'PowithetaController@index')->name('powithetas.index');
    Route::get('/powithetas/this_month', 'PowithetaController@this_month_index')->name('powithetas.this_month_index');
    Route::get('/powithetas/grpo', 'PowithetaController@grpo_this_month')->name('powithetas.grpo_this_month');
    Route::get('/powithetas/truncate', 'PowithetaController@truncate')->name('powithetas.truncate');
    Route::get('/powithetas/grpo_truncate', 'PowithetaController@grpo_truncate')->name('powithetas.grpo_truncate');
    Route::post('/powithetas/import_excel', 'PowithetaController@import_excel')->name('powithetas.import_excel');
    Route::get('/powithetas/{powithetas}', 'PowithetaController@show')->name('powithetas.show');

    Route::get('/grpos', 'GrpoController@index')->name('grpos.index');
    Route::get('/grpos/this_month', 'GrpoController@this_month_index')->name('grpos.this_month_index');
    Route::get('/grpos/export_this_month', 'GrpoController@export_this_month')->name('grpos.export_this_month');
    Route::get('/grpos/{grpo}', 'GrpoController@show')->name('grpos.show');
    Route::get('/grpos/export_excel', 'GrpoController@export_excel')->name('grpos.export_excel');
    Route::post('/grpos/import_excel', 'GrpoController@import_excel')->name('grpos.import_excel');

    Route::get('/po20withetas', 'Po20withetaController@index')->name('po20withetas.index');
    Route::get('/po20withetas/truncate', 'Po20withetaController@truncate')->name('po20withetas.truncate');
    Route::post('/po20withetas/import_excel', 'Po20withetaController@import_excel')->name('po20withetas.import_excel');

    Route::get('/migis/export_excel', 'MigiController@export_excel')->name('migis.export_excel');
    Route::get('/migis/export_this_month', 'MigiController@export_this_month')->name('migis.export_this_month');
    Route::get('/migis', 'MigiController@index')->name('migis.index');
    Route::get('/migis/truncate', 'MigiController@truncate')->name('migis.truncate');
    Route::post('/migis/import_excel', 'MigiController@import_excel')->name('migis.import_excel');

    Route::get('/migi20s', 'Migi20Controller@index')->name('migi20s.index');
    Route::get('/migi20s/truncate', 'Migi20Controller@truncate')->name('migi20s.truncate');
    Route::post('/migi20s/import_excel', 'Migi20Controller@import_excel')->name('migi20s.import_excel');

    Route::get('/incomings/export_excel', 'IncomingController@export_excel')->name('incomings.export_excel');
    Route::get('/incomings/export_this_month', 'IncomingController@export_this_month')->name('incomings.export_this_month');
    Route::get('/incomings', 'IncomingController@index')->name('incomings.index');
    Route::get('/incomings/truncate', 'IncomingController@truncate')->name('incomings.truncate');
    Route::post('/incomings/import_excel', 'IncomingController@import_excel')->name('incomings.import_excel');

    Route::get('/incoming20s', 'Incoming20Controller@index')->name('incoming20s.index');
    Route::get('/incoming20s/truncate', 'Incoming20Controller@truncate')->name('incoming20s.truncate');
    Route::post('/incoming20s/import_excel', 'Incoming20Controller@import_excel')->name('incoming20s.import_excel');

    Route::get('/progresmrs', 'ProgresmrController@index')->name('progresmrs.index');
    Route::get('/progresmrs/truncate', 'ProgresmrController@truncate')->name('progresmrs.truncate');
    Route::post('/progresmrs/import_excel', 'ProgresmrController@import_excel')->name('progresmrs.import_excel');

    // history
    Route::resource('history', 'HistoryController');

    //budget
    Route::resource('budgettypes', 'BudgettypeController');
    Route::resource('budgets', 'BudgetController');

    // test
    Route::get('/test', 'TestController@index');
    Route::get('/test2', 'TestController@test2');
    Route::get('/test3', 'TestController@test3');
    Route::get('/test_api', 'TestController@test_api');

});
