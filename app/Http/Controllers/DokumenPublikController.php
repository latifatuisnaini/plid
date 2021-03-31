<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\JenisKategoriDokumen;
use App\Models\Permohonan;
use App\Models\KategoriDokumen;

class DokumenPublikController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::all();
        $jenis_kategoris = JenisKategoriDokumen::all();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        $kategori_dokumen = KategoriDokumen::where('ID_JENIS_KATEGORI','=',1)->get();

        return view('admin.dokumen-publik',compact("dokumens","jenis_kategoris",'permohonan_open_notif', 'permohonan_diproses_notif','kategori_dokumen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_DOKUMEN' => 'required',
            'ID_JENIS_KATEGORI' => 'required',
            'JENIS_KATEGORI' => 'required',
        ]);

    }
}
