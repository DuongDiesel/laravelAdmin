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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@getSafeCheck');
    Route::get('/dashboard1','ChartController@index');
    Route::get('/dashboard2','Admin\DashboardController@dashboard2');
    Route::get('/role-register','Admin\DashboardController@registered');

    Route::get('/chart', 'LaravelGoogleGraph@index');
    //report
    Route::get('/dashboard2report/{time?}','Dashboard2report@test');

    Route::get('/vue', function () {
        return view('vue');
    });

});


