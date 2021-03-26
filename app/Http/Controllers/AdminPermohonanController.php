<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;

class AdminPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOpen()
    {
        $permohonans = Permohonan::where('ID_STATUS',1)->orderBy('ID_PERMOHONAN','DESC')->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('admin.permohonan-open', compact('permohonans', 'permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function indexConfirm()
    {
        $permohonan_confirm = Permohonan::select('permohonan.ID_PERMOHONAN', 'permohonan.ID_USER', 
        'permohonan.ID_STATUS','permohonan.TANGGAL', 'permohonan.DOKUMEN_PERMOHONAN', 
        'permohonan.KETERANGAN', 'feedback.EXPIRED_DATE', 'feedback.NAMA_FILE', 'feedback.KETERANGAN AS KETERANGAN_FEEDBACK')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('ID_STATUS',3)->orWhere('ID_STATUS', 4)->orderBy('permohonan.ID_PERMOHONAN','DESC')->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('admin.permohonan-confirm', compact('permohonan_confirm', 'permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function indexPending()
    {
        $permohonan_pending = Permohonan::where('ID_STATUS',2)->orderBy('ID_PERMOHONAN','DESC')->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('admin.permohonan-pending', compact('permohonan_pending', 'permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function tolakPermohonan($id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 4
        ]);
        return response()->json('success');
    }

    public function terimaPermohonan($id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 2
        ]);
        return response()->json('success');
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
        //
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
