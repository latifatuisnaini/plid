<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\JenisKategoriDokumen;
use App\Models\Permohonan;
use App\Models\KategoriDokumen;
use App\Models\JenisDokumen;
use Storage;

class DokumenPublikController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::orderBy('ID_KATEGORI','ASC')->orderBy('NOMOR_URUT','ASC')->get();
        $jenis_kategoris = JenisKategoriDokumen::all();
        $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
        $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
        $kategori_dokumen = KategoriDokumen::where('ID_JENIS_KATEGORI','=',1)->get();
        $jenis_dokumen = JenisDokumen::all();

        return view('admin.dokumen-publik',compact("dokumens","jenis_kategoris",'permohonan_open_notif', 'permohonan_diproses_notif','kategori_dokumen','jenis_dokumen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_DOKUMEN' => 'required',
            'ID_JENIS_KATEGORI' => 'required',
            'ID_KATEGORI' => "required",
            'ID_JENIS_DOKUMEN' => 'required',
            'FILE' => 'required_if:ID_JENIS_DOKUMEN,2,3|nullable|file',
            'NOMOR_URUT' => "required|integer",
            'LINK_DOKUMEN' => 'required_if:ID_JENIS_DOKUMEN,1,3|nullable|url'
        ]);

        if(isset($request->FILE) && !isset($request->LINK_DOKUMEN)){
            $nama_file = date('Ymd_His').'_'.$request->file('FILE')->getClientOriginalName();
            $request->file('FILE')->move(base_path('public/storage/dokumen'),$nama_file);

            Dokumen::insert([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'PATH_FILE' => $nama_file,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        elseif(!isset($request->FILE) && isset($request->LINK_DOKUMEN)){
            Dokumen::insert([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'LINK' => $request->LINK_DOKUMEN,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        elseif(isset($request->FILE) && isset($request->LINK_DOKUMEN)){
            $nama_file = date('Ymd_his').'_'.$request->file('FILE')->getClientOriginalName();
            $request->file('FILE')->move(base_path('public/storage/dokumen'),$nama_file);

            Dokumen::insert([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'PATH_FILE' => $nama_file,
                'LINK' => $request->LINK_DOKUMEN,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        
        return redirect('admin/dokumen-publik')->with('alert_sukses', 'Dokumen baru berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA_DOKUMEN' => 'required',
            'ID_JENIS_KATEGORI' => 'required',
            'ID_KATEGORI' => 'required',
            'ID_JENIS_DOKUMEN' => 'required',
            'FILE' => 'required_if:ID_JENIS_DOKUMEN,2,3|file',
            'NOMOR_URUT' => 'required|integer',
            'LINK_DOKUMEN' => 'required_if:ID_JENIS_DOKUMEN,1,3|url'
        ]);

        if(isset($request->FILE) && !isset($request->LINK_DOKUMEN)){
            $nama_file = date('Ymd_His').'_'.$request->file('FILE')->getClientOriginalName();
            $request->file('FILE')->move(base_path('public/storage/dokumen'),$nama_file);

            $path = Dokumen::find($id)->value('PATH_FILE');
            Storage::disk('public')->delete('dokumen/'.$path);

            Dokumen::find($id)->update([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'PATH_FILE' => $nama_file,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        elseif(!isset($request->FILE) && isset($request->LINK_DOKUMEN)){
            Dokumen::find($id)->update([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'LINK' => $request->LINK_DOKUMEN,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        elseif(isset($request->FILE) && isset($request->LINK_DOKUMEN)){
            $nama_file = date('Ymd_his').'_'.$request->file('FILE')->getClientOriginalName();
            $request->file('FILE')->move(base_path('public/storage/dokumen'),$nama_file);

            $path = Dokumen::find($id)->value('PATH_FILE');
            Storage::disk('public')->delete('dokumen/'.$path);

            Dokumen::find($id)->update([
                'NAMA_DOKUMEN' => $request->NAMA_DOKUMEN,
                'ID_KATEGORI' => $request->ID_KATEGORI,
                'PATH_FILE' => $nama_file,
                'LINK' => $request->LINK_DOKUMEN,
                'NOMOR_URUT' => $request->NOMOR_URUT,
                'ID_JENIS_DOKUMEN' => $request->ID_JENIS_DOKUMEN,
                'KETERANGAN' => $request->KETERANGAN,
            ]);
        }
        
        return redirect('admin/dokumen-publik')->with('alert_sukses', 'Perubahan berhasil disimpan.');
    }

    public function destroy($id)
    {
        $path = Dokumen::where('ID_DOKUMEN',$id)->value('PATH_FILE');
        Storage::disk('public')->delete('dokumen/'.$path);
        Dokumen::find($id)->delete();
        return redirect('admin/dokumen-publik')->with('alert_sukses', 'Dokumen berhasil dihapus.');
    }
}
