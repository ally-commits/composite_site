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
Route::post('/registration', 'RegisterController@register')->name('college.registe.post');

Route::get('/dashboard', 'HomeController@index')->name('eventHeadDashboard');
Route::get('/dashboard/getData', 'HomeController@getData')->name('eventHead.getData');
Route::post('/dashboard/updateData', 'HomeController@updateData')->name('eventHead.updateData');

Route::get('/eventDetails','EventDetailsController@index')->name('eventDetails');
Route::get('/eventDetails/{event_id}','EventDetailsController@event')->name('eventDetail');
 
 
Route::get('/admin-compositefest.com.2020', 'ParticipantsController@addAdmin')->name('data.addAdmin');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
    Route::get('/notification', 'AdminController@notification')->name('admin.notification');
    Route::post('/pushNotification', 'AdminController@pushNotification')->name('admin.pushNotification');
    Route::get('/addEventHeads', 'EventHeadController@addEventHeads')->name('admin.addEventHeads');
    Route::get('/removeEventHead/{id}', 'EventHeadController@delete')->name('admin.removeEventHead'); 
    Route::get('/viewEventHeads', 'EventHeadController@viewEventHeads')->name('admin.viewEventHeads'); 
    Route::get('/collegeDetails', 'CollegesController@index')->name('admin.collegeDetails'); 
    Route::get('/collegeDetails/{college_id}', 'CollegesController@collegeView')->name('admin.collegeView');
    Route::get('/restart', 'AdminController@restartIndex')->name('admin.restart');
    Route::post('/restart-admin-authorized', 'AdminController@restart')->name('admin.restartAuthorized');

    Route::get('/eventDetails', 'EventsController@index')->name('admin.eventDetails'); 
    Route::get('/eventDetails/{event_id}', 'EventsController@eventView')->name('admin.eventView'); 

    Route::get('/codeNames', 'CodenameController@index')->name('admin.codeNames'); 
    Route::post('/codeName', 'CodenameController@add')->name('admin.addCodeName'); 
    Route::get('/removeCodeName/{team_id}', 'CodenameController@delete')->name('admin.deleteCodeName'); 

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/addEventHead', 'EventHeadController@store')->name('admin.addEventHead'); 

    Route::get('/participants', 'ParticipantsController@index')->name('admin.participants');
    Route::post('/participant/update', 'ParticipantsController@update')->name('admin.updateParticipant');
    Route::get('/participants/del/{id}', 'AdminController@del')->name('admin.delParticipants');
    Route::get('/participants/add/{id}', 'AdminController@add')->name('admin.addParticipants');

    
});

