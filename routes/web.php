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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/register', function(){
	return redirect()->route('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile', 'HomeController@profile')->name('profile');
Route::get('/home/bill-index', 'BillController@create')->name('bill-index');
Route::get('/home/bill/list', 'BillController@index')->name('bill.index');
Route::get('/home/setting', 'SettingController@index')->name('setting');
Route::post('/home/setting', 'SettingController@store')->name('setting.post');
Route::post('/home/setting/update', 'SettingController@update')->name('setting.update');
Route::post('/home/bill-index', 'BillController@store')->name('bill.post');
Route::get('/home/bill/list/search', 'BillController@search')->name('live.search');
Route::get('/home/bill/list/{id?}', 'BillController@print')->name('billprint');
Route::post('/home/bill/trash', 'BillController@destroy')->name('trash');
Route::post('/home/email', 'HomeController@email')->name('email.change');
Route::post('/home/contact', 'HomeController@contact')->name('contact.change');
Route::post('/home/password', 'HomeController@password')->name('password.change');
Route::post('/home/image/upload', 'HomeController@imageUpload')->name('image.upload');
