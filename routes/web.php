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

Route::get('/', 'SiteController@index');
// Route::get('/sign-up', 'SiteController@sign-up');
// Route::get('/news', 'SiteController@news');

Route::middleware('role:admin')->group(function() {
  Route::get('/', 'DashboardController@index');
  Route::get('/user', 'DashboardController@user');
  Route::get('/user/{id}', 'DashboardController@user');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();