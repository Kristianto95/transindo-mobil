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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('home');
Route::post('/welcome/store', 'App\Http\Controllers\WelcomeController@store')->name('welcome.store');
Route::get('/success/{kode_transaksi}', 'App\Http\Controllers\WelcomeController@success')->name('success');
Route::post('/cekstatus', 'App\Http\Controllers\WelcomeController@cekstatus')->name('cekstatus');
Route::get('/payment', 'App\Http\Controllers\WelcomeController@payment')->name('payment');


Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('/login_action', 'App\Http\Controllers\UserController@login_action')->name('login_action');
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/customer', 'App\Http\Controllers\CustomerController@index')->name('customer');
    Route::post('/customer/store', 'App\Http\Controllers\CustomerController@store')->name('customer.store');
    Route::get('/customer/edit/{id}', 'App\Http\Controllers\CustomerController@edit')->name('customer.edit');
    Route::post('/customer/update/{id}', 'App\Http\Controllers\CustomerController@update')->name('customer.update');
    Route::get('/customer/delete/{id}', 'App\Http\Controllers\CustomerController@delete')->name('customer.delete');

    Route::get('/mobil', 'App\Http\Controllers\MobilController@index')->name('mobil');
    Route::post('/mobil/store', 'App\Http\Controllers\MobilController@store')->name('mobil.store');
    Route::get('/mobil/edit/{id}', 'App\Http\Controllers\MobilController@edit')->name('mobil.edit');
    Route::post('/mobil/update/{id}', 'App\Http\Controllers\MobilController@update')->name('mobil.update');
    Route::get('/mobil/delete/{id}', 'App\Http\Controllers\MobilController@delete')->name('mobil.delete');
    Route::get('/mobil/getHarga/{id}', 'App\Http\Controllers\MobilController@getHarga')->name('mobil.getHarga');


    Route::get('/sewa', 'App\Http\Controllers\SewaController@index')->name('sewa');
    Route::post('/sewa/store', 'App\Http\Controllers\SewaController@store')->name('sewa.store');
    Route::get('/sewa/edit/{id}', 'App\Http\Controllers\SewaController@edit')->name('sewa.edit');
    Route::post('/sewa/update/{id}', 'App\Http\Controllers\SewaController@update')->name('sewa.update');
    Route::get('/sewa/delete/{id}', 'App\Http\Controllers\SewaController@delete')->name('sewa.delete');
});
