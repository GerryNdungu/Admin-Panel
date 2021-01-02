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

Route::group(['middleware' => ['auth','admin']],function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/roles-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit')->name('users.edit');

    Route::put('/role-update/{id}','Admin\DashboardController@registerupdate')->name('users.update');
    Route::delete('/user-delete/{id}','Admin\DashboardController@userdelete')->name('users.destroy');


});
