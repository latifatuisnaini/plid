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

Route::get('/lp_registrasip', function(){
    return view('lp_registrasip');
});

Route::get('/agenda', function(){
    return view('agenda');
});

Route::get('/faq', function(){
    return view('faq');
});

// ->middleware(['first', 'second'])

Route::prefix('admin')->group(function(){
    Route::get('/','AdminController@index');
    Route::get('/user','AdminController@index');
});