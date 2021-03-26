<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use Storage;
use App\Models\Feedback;
use \Barryvdh\DomPDF\PDF;

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
        return view('admin.permohonan-open', compact('permohonans'));
    }

    public function indexConfirm()
    {
        $permohonan_confirm = Permohonan::select('permohonan.ID_PERMOHONAN', 'permohonan.ID_USER', 
        'permohonan.ID_STATUS','permohonan.TANGGAL', 'permohonan.DOKUMEN_PERMOHONAN', 
        'permohonan.KETERANGAN', 'feedback.EXPIRED_DATE', 'feedback.NAMA_FILE', 'feedback.KETERANGAN AS KETERANGAN_FEEDBACK')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('ID_STATUS',3)->orWhere('ID_STATUS', 4)->orderBy('permohonan.ID_PERMOHONAN','DESC')->get();
        return view('admin.permohonan-confirm', compact('permohonan_confirm'));
    }

    public function indexPending()
    {
        $permohonan_pending = Permohonan::where('ID_STATUS',2)->orderBy('ID_PERMOHONAN','DESC')->get();
        return view('admin.permohonan-pending', compact('permohonan_pending'));
    }

    public function tolakPermohonan(Request $request,$id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 4
        ]);

        Feedback::insert([
            'WAKTU_ESTIMASI' => date('Y-m-d',strtotime($request->estimasi)),
            'KETERANGAN' => $request->keterangan,
            'ID_PERMOHONAN' => $id,
            'KETERANGAN_ESTIMASI' => $request->keterangan_estimasi
        ]);

        return response()->json('success');
    }

    public function terimaPermohonan(Request $request,$id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 2,
        ]);

        Feedback::insert([
            'WAKTU_ESTIMASI' => date('Y-m-d',strtotime($request->estimasi)),
            'KETERANGAN' => $request->keterangan,
            'ID_PERMOHONAN' => $id,
            'KETERANGAN_ESTIMASI' => $request->keterangan_estimasi
        ]);

        return response()->json('success');
    }

    public function uploadDokumen(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        
        Storage::disk('public')->putFileAs('dokumen',$request->KTP,$ktp);

        $permohonan->update([
            'file' => $nama_file,
        ]);

        return response()->json('success');
    }

    public function cetakpdfOpen()
    {
        $permohonans = Permohonan::where('ID_STATUS',1)->orderBy('ID_PERMOHONAN','DESC')->get();
        $pdf = PDF::loadView('admin.cetak-permohonan-open', compact('permohonans'), ['permohonan' => $permohonans]);
        $pdf->setPaper("f4");
        return $pdf->stream();
    }

    public function cetakpdfConfirm()
    {
        $permohonan_confirm = Permohonan::select('permohonan.ID_PERMOHONAN', 'permohonan.ID_USER', 
        'permohonan.ID_STATUS','permohonan.TANGGAL', 'permohonan.DOKUMEN_PERMOHONAN', 
        'permohonan.KETERANGAN', 'feedback.EXPIRED_DATE', 'feedback.NAMA_FILE', 'feedback.KETERANGAN AS KETERANGAN_FEEDBACK')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('ID_STATUS',3)->orWhere('ID_STATUS', 4)->orderBy('permohonan.ID_PERMOHONAN','DESC')->get();
        $pdf = PDF::loadView('/admin/cetak-permohonan-confirm',  ['permohonan' => $permohonan_confirm]);
        $pdf->setPaper("f4");
        return $pdf->stream();
    }

    public function cetakpdfPending()
    {
        $permohonan_pending = Permohonan::where('ID_STATUS',2)->orderBy('ID_PERMOHONAN','DESC')->get();
        $pdf = PDF::loadView('admin.cetak-permohonan-pending', compact('permohonan_pending'), ['permohonan' => $permohonan_pending]);
        $pdf->setPaper("f4");
        return $pdf->stream();
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
