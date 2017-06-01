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
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/tes', function(){
	return view('tes');
});

Route::get('/cek', function(){
	return view('cek');
});


Route::get('pesanInven', 'PemesananController@pinjaminventaris');
Route::get('cekkode', 'PemesananController@cekbookinginv');
Route::get('list', 'PemesananController@listinv');
Route::get('list/pinjam/{no_book}', ['uses' => 'PemesananController@pinjaminv']);
Route::get('list/kembali/{no_book}', ['uses' => 'PemesananController@kembaliinv']);

Route::resource('/', 'PemesananController');