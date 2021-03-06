<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisPemohon;
use App\Models\JenisIdentitas;
use App\Models\User;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_pemohon = JenisPemohon::all();
        $jenis_identitas = JenisIdentitas::all();
        return view('lp_registrasip', compact('jenis_pemohon', 'jenis_identitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pemohon' => 'required',
            'jenis_identitas' => 'required',
            'nomor_identitas' => 'required|string|max:20|regex:/^[0-9.\-\/]+$/',
            'nama_lengkap' => 'required|string|max:100|regex:/^[a-zA-Z ]+$/',
            'NPWP' => 'required|string|max:100|regex:/^[0-9.\-]+$/',
            'email_pemohon' => 'required|string|email',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required',
            'no_tlp' => 'required|string|max:15|regex:/^[0-9]+$/',
            'no_fax'=> 'required|string|max:15|regex:/^[0-9]+$/',
            'password_pemohon' => 'required|string',

        ]);

        User::insert([
            'TIPE_USER' => 2,
            'ID_JENIS_IDENTITAS' => $request->jenis_identitas,
            'ID_JENIS_PEMOHON' => $request->jenis_pemohon,
            'NOMOR_IDENTITAS' => $request->nomor_identitas,
            'NAMA_LENGKAP' => $request->nama_lengkap,
            'NPWP' => $request->NPWP,
            'email' => $request->email_pemohon,
            'PEKERJAAN' => $request->pekerjaan,
            'ALAMAT' => $request->alamat,
            'NO_TLP' => $request->no_tlp,
            'NO_FAX' => $request->no_fax,
            'password' => bcrypt($request->password_pemohon),
            'STATUS_KONFIRMASI' => 0,
        ]);

        return redirect('/lp_registrasip')->with('alert_sukses', 'Data Registrasi Berhasil Disimpan. Harap menunggu untuk dikonfirmasi.');
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
