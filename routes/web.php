<?php

use App\Http\Controllers\InfoLayananPublik1;
use Illuminate\Support\Facades\Route;
use App\Models\JenisKategoriDokumen;
use App\Models\KategoriDokumen;
use App\Models\Dokumen;
use App\Models\Feedback;

Route::get('/', function () {
    return redirect('/beranda');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/regulasi', 'RegulasiController@index');
Route::get('/regulasi/download/{id}', 'RegulasiController@show')->name('downloadregulasi');

Route::get('/maklumat', function(){
    return view('maklumat');
});

Route::get('/info_layanan_publik_1', 'InfoLayananPublik1Controller@index');

Route::get('/info_layanan_publik_2', 'InfoLayananPublik2Controller@index');

Route::get('/info_layanan_publik_3', 'InfoLayananPublik3Controller@index');

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
Route::get('/faq', 'FaqController@index');

Route::prefix('admin')->middleware(['auth','cekAdmin'])->group(function(){
    Route::get('/','AdminController@index');

    Route::resource('/user','UserController');
    Route::get('/user/edit/{id}', 'UserController@edit');

    Route::resource('/verif','DocverifController');
    Route::get('/verif/edit/{id}', 'DocverifController@edit');
    Route::post('/verif/update1', 'DocverifController@update1')->name('verif.update1');
    Route::get('/permohonan-open','AdminPermohonanController@indexOpen')->name('permohonan-open');
    Route::get('/permohonan-confirm','AdminPermohonanController@indexConfirm');
    Route::get('/permohonan-pending','AdminPermohonanController@indexPending');
    Route::post('/permohonan/tolak/{id}','AdminPermohonanController@tolakPermohonan');
    Route::post('/permohonan/terima/{id}','AdminPermohonanController@terimaPermohonan');
    Route::post('/permohonan/upload-dokumen','AdminPermohonanController@uploadDokumen');
    Route::get('/cetak-permohonan-open','AdminPermohonanController@cetakpdfOpen');
    Route::get('/cetak-permohonan-pending','AdminPermohonanController@cetakpdfPending');
    Route::get('/cetak-permohonan-confirm','AdminPermohonanController@cetakpdfConfirm');
    Route::post('/permohonan-pending/upload-dokumen/{id}','AdminPermohonanController@uploadDokumen')->name('');
    Route::get('/permohonan/download/{id}', 'AdminPermohonanController@download')->name('admin-download');
    Route::get('/cetakpermohonan/{id}','AdminPermohonanController@cetakpermohonan');

    Route::resource('/dokumen-publik','DokumenPublikController');
    Route::get('getKategori/{id}',function($id){
        $kategori = KategoriDokumen::where('ID_JENIS_KATEGORI','=',$id)->pluck('ID_KATEGORI','KATEGORI');
        return $kategori;
    });
    Route::resource('/kategori-dokumen','KategoriDokumenController');
    Route::resource('/faq-create','FaqAdminController');
    Route::get('/profile/{id}','UserController@profile');
});
 
Route::prefix('users')->middleware(['auth','cekUser'])->group(function(){
    Route::get('/','UsersController@index');
    Route::resource('/permohonan','PermohonanController');
    Route::get('/users/permohonan', 'PermohonanController@index');
    Route::post('upload_dok','UsersController@uploadDokumen');
    Route::get('download/dokumen-permohonan/{id}', 'PermohonanController@show');
    Route::get('/profile/{id}','UsersController@show');
    Route::get('/syarat_dan_ketentuan' , 'PermohonanController@getDownload');
    Route::get('/formpermohonan/{id}','UsersController@formpermohonan');
    Route::get('/formpemberitahuan/{id}', 'UsersController@formpemberitahuan');
});

Route::get('download/dokumen-publik/{id}',function($id){
    $dokumen = Dokumen::find($id);
    return Storage::disk('public')->download('dokumen/'.$dokumen->PATH_FILE);
});

Route::get('download/dokumen-permohonan/{id}',function($id){
    $feedback = Feedback::find($id);
    return Storage::disk('public')->download('dokumen/'.$feedback->LINK_DOWNLOAD);
});