<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Models\Permohonan;

class FaqAdminController extends Controller
{
    public function index()
    {
    $faq=Faq::all();
    $permohonan_open_notif = Permohonan::where('ID_STATUS', '1')->count();
    $permohonan_diproses_notif = Permohonan::where('ID_STATUS', '2')->count();
    return view('admin.faq-create', compact('faq','permohonan_open_notif', 'permohonan_diproses_notif'));
    }

    public function store(Request $request)
    {
        $request->validate
        ([  
            'QUESTION' => 'required',
            'ANSWER' => 'required'
        ]);

        $faq = new Faq();
        $faq->QUESTION= $request->QUESTION;
        $faq->ANSWER = $request->ANSWER;
        $faq->save();
        return redirect()->route('faq-create.index')->with('success', 'FAQ Berhasil Ditambahkan.');
    }

    public function create(){

    }
}
