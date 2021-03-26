<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\Feedback;
use \Barryvdh\DomPDF\PDF;
use Storage;


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
            'LINK_DOWNLOAD' => 'required|file|mimes:jpeg,png,jpg,doc,docx,pdf,zip'
        ]);

        $feedback = Feedback::where('ID_PERMOHONAN', $request->ID_PERMOHONAN)->pluck('ID_FEEDBACK')->first();
        //dd($request->ID_PERMOHONAN);
        $feedbacks = Feedback::find($feedback);

        $link_download = date('Y-m-d_h:i:s').'_'.$request->file('LINK_DOWNLOAD')->getClientOriginalName();
        Storage::disk('public')->put('dokumen/'.$link_download,$request->LINK_DOWNLOAD);

        $feedbacks->update([
            'LINK_DOWNLOAD' => $link_download
        ]);
        return redirect('admin/permohonan-pending');
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
