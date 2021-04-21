@extends('layout')
@section('title')
    Beranda
@endsection
@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="credit-card"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> E-PPID  </h2>
</div>
@endsection
@section('content')
<div class="px-2">
  <div class="flex -mx-2">
    <div class="w-1/4 px-2">
    <img src="{{ asset('dist/images/PALBRO PALINA.png') }}">
    </div>
    <div class="w-3/4 px-2">
    <p class="mb-2"><b>Selamat Datang di Layanan e-PPID</b></p>
    <p>
    Terima kasih telah mengunjungi layanan e-PPID PT PAL Indonesia (Persero). 
    Layanan ini merupakan sarana layanan online bagi pemohon informasi publik sebagai salah satu wujud pelaksanaan keterbukaan informasi publik di PT PAL Indonesia (Persero).  
    Informasi yang kami sediakan meliputi:
    </p>
    <p class="mt-2 mb-2">
    1. <a href="{{ url('/info_layanan_publik_1') }}" class="no-underline hover:underline">Informasi yang wajib disediakan dan diumumkan secara berkala;</a>
    <br>
    2. <a href="{{ url('/info_layanan_publik_2') }}" class="no-underline hover:underline"> Informasi yang wajib disediakan dan diumumkan secara serta-merta;</a>
    <br>
    3. <a href="{{ url('/info_layanan_publik_3') }}" class="no-underline hover:underline"> Informasi yang wajib sedia setiap saat;</a>
    </p>
    
    Untuk pengajuan permohonan informasi, silakan melakukan registrasi melalui kolom yang tersedia.
    <br>
    Informasi lebih lanjut dapat menghubungi:
    <p class="mt-2">
    PPID PT PAL Indonesia (Persero)
    </p>
    <p class="mt-2">
        Jl. Ujung, Surabaya 60165 - Indonesia  
        <br>
        Jam Layanan : Senin - Jumat pukul 07.30 - 16:30 WIB
        ( kecuali hari libur nasional )
        <br>
        Telpon   : +62 31 3292275 (Ext. 2030, 2020, 20002) 
        <br>
        Fax       : +62 31 3292530 
        <br>
        Email    : humas@pal.co.id
    </p>
    </div>
  </div>
</div>







       
   
@endsection