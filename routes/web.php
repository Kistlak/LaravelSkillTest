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
//     return view('welcome');
// });

Route::get('/','IndexController@FormWithJsonPage')->name('FormWithJson');

Route::post('GetFormData','IndexController@GetFormData')->name('GetFormData');

Route::get('SetDataToTable','IndexController@SetDataToTable')->name('SetDataToTable');

Route::post('UpdateData','IndexController@UpdateData')->name('UpdateData');

Route::post('DeleteData','IndexController@DeleteData')->name('DeleteData');
