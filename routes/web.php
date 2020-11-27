<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', 'RecordController@index')->name('record.index');
Route::get('/record/view/{record}', 'RecordController@view')->name('record.view')->middleware('auth');
Route::get('record/create', 'RecordController@create')->name('record.create')->middleware('auth');;
Route::post('record/store', 'RecordController@store')->name('record.store')->middleware('auth');;

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
