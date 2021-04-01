<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
    $faq=Faq::all();
    return view('faq', compact('faq'));
    }
}
