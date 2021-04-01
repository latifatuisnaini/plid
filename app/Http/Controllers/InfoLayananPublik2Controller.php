<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriDokumen;
use Illuminate\Http\Request;

class InfoLayananPublik2Controller extends Controller
{
    public function index(){
        $kategori_dokumen=KategoriDokumen::
        select('kategori_dokumen.ID_KATEGORI','kategori_dokumen.KATEGORI','kategori_dokumen.NOMOR_URUT','jenis_kategori_dokumen.JENIS_KATEGORI')
        ->join('jenis_kategori_dokumen', 'jenis_kategori_dokumen.ID_JENIS_KATEGORI', '=', 'kategori_dokumen.ID_JENIS_KATEGORI')
        ->where('JENIS_KATEGORI','=','Informasi yang wajib disediakan dan diumumkan secara serta-merta')
        ->orderBy('kategori_dokumen.NOMOR_URUT')
        ->get();

        return view('info_layanan_publik_2', compact('kategori_dokumen'));
    } 
}
