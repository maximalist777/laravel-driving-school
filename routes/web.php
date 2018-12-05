<?php

/*
|-----------
---------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
  'prefix' => 'dashboard'
], function () {
  Route::get('login', 'Auth\LoginController@showLoginForm');
  Route::post('login', 'Auth\LoginController@login')->name('login');
  Route::get('logout', 'Auth\LoginController@logout')->name('logout');

  Route::view('app/{vue?}', 'dashboard')->where('vue', '[\/\w\.-]*')->name('dashboard')->middleware('dashboard');
});

Route::redirect('/dashboard', '/dashboard/app')->middleware('dashboard');


Route::get('/file/css/{filename}', 'FileController@getCSS')->where('filename', '^(.+)/([^/]+)$');
Route::get('/file/js/{filename}', 'FileController@getJS')->where('filename', '^(.+)/([^/]+)$');
// Route::get('file', 'FileController@getFile');

Route::view('{vue?}', 'app')->where('vue', '[\/\w\.-]*')->name('home');
