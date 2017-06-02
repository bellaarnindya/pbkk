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

Route::post('/pesanSurat', 'testController@pesanSurat');
Route::post('/pesanInven', 'PemesananController@pinjaminventaris');
Route::post('/cekInven', 'PemesananController@cekbookinginv');
Route::get('/listInven', 'PemesananController@listinv');


Route::get('/listInven/pinjam/{no_book}', ['uses' => 'PemesananController@pinjaminv']);
Route::get('/listInven/kembali/{no_book}', ['uses' => 'PemesananController@kembaliinv']);






Route::resource('/', 'PemesananController');

//DARI RANI

    
    
Route::get('/tes', function(){
	return view('tes');
});

Route::get('/cek', function(){
	return view('cek');
});




//DARI UPIK
Route::get('/formsurat', function () {
    return view('formsurat');
});
Route::get('/cekstatus', function () {
    return view('cekstatus');
});
Route::get('/listSurat','PemesananController@listsurat');

Route::get('/listSurat/{no_book}', ['uses' => 'PemesananController@acc']);

Route::post('/cekSurat','PemesananController@ceksurat');
Route::post('/pesanSurat','PemesananController@pesansurat');
