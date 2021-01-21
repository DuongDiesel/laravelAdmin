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

    Route::get('/dashboard', 'Admin\DashboardController@dashboard');
    Route::get('/dashboard1','Admin\DashboardController@dashboard1');
    Route::get('/dashboard2','Admin\DashboardController@dashboard2');

    Route::get('/role-register','Admin\DashboardController@registered');

    //report
    Route::get('/dashboardreport/{time?}','Dashboardreport@test');
    Route::get('/dashboard1report/{time?}','Dashboard1report@test');
    Route::get('/dashboard2report/{time?}','Dashboard2report@test');

    Route::get('/dashboardreportseemore/{id?}','Seemore@index');

    //map
    Route::get('/map', function(){
        $config = array();
        $config['center'] = 'Defence Garden, Karachi';
        $config['zoom'] = '14';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = false;
        GMaps::initialize($config);
        $map = GMaps::create_map();
    
        return view('map')->with('map', $map);

        //return view('map');
    });


    
   

});


