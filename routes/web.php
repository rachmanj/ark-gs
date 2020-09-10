<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::get('/dashboard/po_sent_by_project', 'DashboardController@po_sent_by_project')->name('dashboard.po_sent_by_project');

    // data ajax
    Route::get('/powithetas/data', 'DataController@powithetas')->name('powithetas.data');

    Route::get('/powithetas', 'PowithetaController@index')->name('powithetas.index');
    Route::post('/powithetas/import_excel', 'PowithetaController@import_excel')->name('powithetas.import_excel');
});
