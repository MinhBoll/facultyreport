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

Route::get('/', 'ReportsController@index');
Route::resource('report', 'ReportsController');

Auth::routes();


Route::post('/admin/report', 'AdminController@fetch')->name('admin.report');
Route::get('/admin', 'AdminController@index')->name('admin');
