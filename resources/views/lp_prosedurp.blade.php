@extends('layout')

@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="settings"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> PROSEDUR PERMOHONAN INFORMASI</h2>
</div>
@endsection

@section('content')
    <img href="#" src="{{ asset('dist/images/gen_Permohonan_Informasi_001.jpg') }}">
@endsection

@section('cardlp')
<div class="intro-y box p-5 mt-12 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">
    <div class="flex flex-row">
        <i data-feather="settings"></i>
        <h2 class="text-lg font-medium mr-auto ml-3"> PROSEDUR PENGAJUAN KEBERATAN</h2>
    </div>
</div>
<div class="intro-y box p-5 mt-12 sm:mt-5">
    
    <img href="#" src="{{ asset('dist/images/gen_pengajuan_keberatan_001.jpg') }}">
</div>
@endsection