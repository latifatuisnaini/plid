<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/beranda');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/regulasi', function(){
    return view('regulasi');
});

Route::get('/maklumat', function(){
    return view('maklumat');
});

Route::get('/info_layanan_publik_1', function(){
    return view('info_layanan_publik_1');
});

Route::get('/info_layanan_publik_2', function(){
    return view('info_layanan_publik_2');
});

Route::get('/info_layanan_publik_3', function(){
    return view('info_layanan_publik_3');
});

Route::get('/lp_prosedurp', function(){
    return view('lp_prosedurp');
});

Route::get('/lp_registrasip', 'RegistrasiController@create');
Route::post('/lp_registrasip/store', 'RegistrasiController@store');

Route::get('/agenda', function(){
    return view('agenda');
});

Route::get('/faq', function(){
    return view('faq');
});

// 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/','AdminController@index');

    Route::resource('/user','UserController');
    Route::get('/user/edit/{id}', 'UserController@edit');

    Route::resource('/verif','DocverifController');
    Route::get('/verif/edit/{id}', 'DocverifController@edit');
    Route::post('/verif/update1', 'DocverifController@update1')->name('verif.update1');
    Route::get('/permohonan-open','AdminPermohonanController@index');
    Route::get('/permohonan-confirm','AdminPermohonanController@indexConfirm');
    Route::get('/permohonan-pending','AdminPermohonanController@indexPending');
});

Route::prefix('users')->middleware(['auth'])->group(function(){
    Route::get('/','UsersController@index');
    Route::resource('/permohonan','PermohonanController');
    Route::get('/users/permohonan', 'PermohonanController@index');
    Route::post('upload_dok','UsersController@uploadDokumen');
});
