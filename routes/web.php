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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('admin/page','admin\PageController');
Route::resource('admin/company','admin\CompanyController');
Route::resource('admin/phone','admin\PhoneController');
Route::resource('admin/repair','admin\RepairController');
