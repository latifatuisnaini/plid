<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\Feedback;
use App\Models\User;
use \Barryvdh\DomPDF\PDF;
use Storage;
use Carbon\Carbon;
use File;
use Auth;

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
        $permohonan_confirm = Permohonan::where('ID_STATUS',3)->orWhere('ID_STATUS', 4)->orderBy('ID_PERMOHONAN','DESC')->get();
        $todayDate = date('Y-m-d');
        
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();

        $feedback = Feedback::all();

        foreach($feedback as $f){
            $exp_date = date('Y-m-d',strtotime($f->EXPIRED_DATE));
            if($todayDate > $exp_date){
                Storage::disk('public')->delete('dokumen/'.$f->LINK_DOWNLOAD);
                Feedback::where('ID_FEEDBACK', $f->ID_FEEDBACK)->update([
                    'LINK_DOWNLOAD' => NULL
                ]);
            }
        }
        
    
        return view('admin.permohonan-confirm', compact('permohonan_confirm', 'permohonan_open_notif', 'permohonan_diproses_notif', 'todayDate'));
    }

    public function indexPending()
    {
        $permohonan_pending = Permohonan::where('ID_STATUS',2)->orderBy('ID_PERMOHONAN','DESC')
        
        ->get();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        return view('admin.permohonan-pending', compact('permohonan_pending', 'permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function tolakPermohonan(Request $request,$id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 4,
            'ID_PETUGAS' => Auth::user()->ID_USER
        ]);

        Feedback::insert([
            'WAKTU_ESTIMASI' => date('Y-m-d',strtotime($request->estimasi)),
            'KETERANGAN' => $request->keterangan,
            'ID_PERMOHONAN' => $id,
            'KETERANGAN_ESTIMASI' => $request->keterangan_estimasi,
            'PENGUASAAN_INFORMASI' => $request->penguasaan,
            'KETERANGAN_PENGHITAMAN' => $request->penghitaman,
        ]);

        return response()->json('success');
    }

    public function terimaPermohonan(Request $request,$id)
    {
        Permohonan::find($id)->update([
            'ID_STATUS' => 2,
            'ID_PETUGAS' => Auth::user()->ID_USER
        ]);

        Feedback::insert([
            'WAKTU_ESTIMASI' => date('Y-m-d',strtotime($request->estimasi)),
            'KETERANGAN' => $request->keterangan,
            'ID_PERMOHONAN' => $id,
            'KETERANGAN_ESTIMASI' => $request->keterangan_estimasi,
            'PENGUASAAN_INFORMASI' => $request->penguasaan,
            'KETERANGAN_PENGHITAMAN' => $request->penghitaman,
        ]);

        return response()->json('success');
    }

    public function uploadDokumen(Request $request,$id)
    {
        $request->validate([
            'LINK_DOWNLOAD' => 'required|file|mimes:jpeg,png,jpg,doc,docx,pdf,zip',
            'EXPIRED_DATE'=>'required'
        ]);
       
        $date=date('Y-m-d_his');
        $link_download = $date.'_'.$request->file('LINK_DOWNLOAD')->getClientOriginalName();
        $nama_file= $request->file('LINK_DOWNLOAD')->getClientOriginalName();
        // $file = File::put('dokumen',$request->file('LINK_DOWNLOAD'));
        $request->file('LINK_DOWNLOAD')->move(base_path('public/storage/dokumen'),$link_download);
       
        $dates=Carbon::parse($request->EXPIRED_DATE);
        $dates->format('Y-m-d');

        Feedback::where('ID_PERMOHONAN','=',$id)->update([
            'LINK_DOWNLOAD' => $link_download,
            'NAMA_FILE' => $nama_file,
            'EXPIRED_DATE'=> $dates,
        ]);
        
        Permohonan::find($id)->update([
            'ID_STATUS' => 3,
        ]);
        return redirect('admin/permohonan-pending')->with('success', 'Dokumen Permohonan Berhasil Diupload');
    }

    public function cetakpdfOpen()
    {
        $permohonans = Permohonan::where('ID_STATUS',1)->orderBy('ID_PERMOHONAN','DESC')->get();
        $pdf = \PDF::loadView('/admin/cetak-permohonan-open', compact('permohonans'), ['permohonan' => $permohonans])->setPaper( 'a4','landscape');
        return $pdf->stream();
    }

    public function cetakpdfConfirm()
    {
        $permohonan_confirm = Permohonan::select('permohonan.ID_PERMOHONAN', 'permohonan.ID_USER', 
        'permohonan.ID_STATUS','permohonan.TANGGAL', 'permohonan.DOKUMEN_PERMOHONAN', 
        'permohonan.KETERANGAN', 'feedback.EXPIRED_DATE', 'feedback.NAMA_FILE', 'feedback.KETERANGAN AS KETERANGAN_FEEDBACK')
        ->join('feedback', 'feedback.ID_PERMOHONAN', '=', 'permohonan.ID_PERMOHONAN')
        ->where('ID_STATUS',3)->orWhere('ID_STATUS', 4)->orderBy('permohonan.ID_PERMOHONAN','DESC')->get();
        $pdf = \PDF::loadView('/admin/cetak-permohonan-confirm',compact('permohonan_confirm'),  ['permohonan' => $permohonan_confirm])->setPaper( 'a4','landscape');
        return $pdf->stream();
    }

    public function cetakpdfPending()
    {
        $permohonan_pending = Permohonan::where('ID_STATUS',2)->orderBy('ID_PERMOHONAN','DESC')->get();
        $pdf = \PDF::loadView('/admin/cetak-permohonan-pending', compact('permohonan_pending'), ['permohonan' => $permohonan_pending])->setPaper( 'a4','landscape');;
        return $pdf->stream();
    }

    public function download($id){
        $feedback = Feedback::find($id);
        return Storage::disk('public')->download('dokumen/'.$feedback->LINK_DOWNLOAD);
    }

    public function cetakpermohonan($id){
        $permohonan = Permohonan::where('ID_PERMOHONAN','=',$id)->first();

        $pdf = \PDF::loadView('/admin.cetak-permohonan', compact('permohonan'));
        return $pdf->stream();

        // return view('admin.cetak-permohonan', compact('permohonan'));
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
