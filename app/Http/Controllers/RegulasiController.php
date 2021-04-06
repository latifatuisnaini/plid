<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriDokumen;
use App\Models\Dokumen;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function index(){
        $kategori_dokumen=KategoriDokumen::
        select('kategori_dokumen.ID_KATEGORI','kategori_dokumen.KATEGORI','kategori_dokumen.NOMOR_URUT','jenis_kategori_dokumen.JENIS_KATEGORI')
        ->join('jenis_kategori_dokumen', 'jenis_kategori_dokumen.ID_JENIS_KATEGORI', '=', 'kategori_dokumen.ID_JENIS_KATEGORI')
        ->where('kategori_dokumen.ID_JENIS_KATEGORI','=',1)
        ->orderBy('kategori_dokumen.NOMOR_URUT')
        ->get();

        $dokumen=Dokumen::
        select('*')
        ->where('dokumen.ID_KATEGORI','=','kategori_dokumen.ID_KATEGORI')
        ->orderBy('dokumen.NOMOR_URUT')
        ->get();

        return view('regulasi', compact('kategori_dokumen'));
    } 
    public function show($id){
        $regulasi = Dokumen::find($id);
        
        return Storage::disk('public')->download('dokumen/'.$regulasi->LINK_FILE);
        
    }
}
