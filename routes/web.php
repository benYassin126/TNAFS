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
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();



//Routs For Students
Route::resource('student','StudentController');
Route::post('student.sort', 'StudentController@sort')->name('student.sort');
Route::get('student.search', 'StudentController@search')->name('student.search');
Route::post('student.points', 'StudentController@points')->name('student.points');


//Routs For Groups
Route::resource('group','GroupController');
Route::post('group.points', 'GroupController@points')->name('group.points');


//other route
Route::get('setting','SettingController@index')->name('setting');
Route::get('setting/addPointsToGroup','SettingController@addPointsToGroup')->name('setting.addPointsToGroup');
Route::post('setting/restPoints','SettingController@restPoints')->name('setting.restPoints');
Route::post('setting/deleteAllStudents','SettingController@deleteAllStudents')->name('setting.deleteAllStudents');
Route::post('setting/TransPoints','SettingController@TransPoints')->name('setting.TransPoints');
Route::post('setting/Twze3','SettingController@Twze3')->name('setting.Twze3');


Route::get('overView','overViewController@index')->name('overView');
Route::post('overView/WatchResult','overViewController@WatchResult');

Route::get('/75{userID}1T','StudentShowController@index');

Route::get('print', 'PrintController@index')->name('print');
Route::post('print.showPrint', 'PrintController@showPrint')->name('print.showPrint');


Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile', 'ProfileController@edit');





