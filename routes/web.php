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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard', 'admin\dashboardController@index')->name('dashboard');
Route::get('/admin/kategori', 'admin\kategoriController@index')->name('kategori');
Route::get('/admin/pelanggan', 'admin\pelangganController@index')->name('pelanggan');
Route::get('/admin/penjualan', 'admin\penjualanController@index')->name('penjualan');
Route::get('/admin/detail_penjualan/{id?}', 'admin\penjualanController@view')->name('detail_penjualan/{id?}');
