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
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
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

Route::get('/lp_prosedurp', function(){
    return view('lp_prosedurp');
});

Route::get('/lp_registrasip', function(){
    return view('lp_registrasip');
});