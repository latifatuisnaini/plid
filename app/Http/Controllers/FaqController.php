<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Models\Permohonan;

class FaqController extends Controller
{
    public function index()
    {
    $faq=Faq::all();
   
    return view('faq', compact('faq'));
    }

    public function store(Request $request)
    {
       
    }

    public function create(){

    }
}
