<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriDokumen;
use App\Models\Permohonan;
use App\Models\JenisKategoriDokumen;

class KategoriDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriDokumen::all();
        $jenis_kategori = JenisKategoriDokumen::all();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('admin.kategori-dokumen', compact('kategori', 'jenis_kategori','permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([  
            'ID_JENIS_KATEGORI' => 'required',
            'KATEGORI_DOKUMEN' => 'required',
            'NOMOR_URUT' => 'required'
        ]);

        $kategori = new KategoriDokumen();
        $kategori->ID_JENIS_KATEGORI = $request->ID_JENIS_KATEGORI;
        $kategori->KATEGORI = $request->KATEGORI_DOKUMEN;
        $kategori->NOMOR_URUT = $request->NOMOR_URUT;
        $kategori->save();

        return redirect()->route('kategori-dokumen.index')->with('success', 'Data Kategori Dokumen Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
