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

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 
Route::get('/registration', 'RegisterController@index')->name('college.register');

Route::get('/dashboard', 'HomeController@index')->name('eventHeadDashboard');


Route::get('/data', 'ParticipantsController@index');

Route::get('/', function () {
    return view('layouts.app');
});
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
    Route::get('/notification', 'AdminController@notification')->name('admin.notification');
    Route::get('/addEventHeads', 'EventHeadController@addEventHeads')->name('admin.addEventHeads');
    Route::get('/removeEventHead/{id}', 'EventHeadController@delete')->name('admin.removeEventHead'); 
    Route::get('/viewEventHeads', 'EventHeadController@viewEventHeads')->name('admin.viewEventHeads'); 

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/addEventHead', 'EventHeadController@store')->name('admin.addEventHead'); 
});