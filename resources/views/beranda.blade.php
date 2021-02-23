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
    <img src="{{ asset('dist/images/gambar_beranda.jpg') }}">
    </div>
    <div class="w-3/4 px-2">
    <p class="mb-2"><b>Selamat Datang di Layanan e-PPID</b></p>
    <p>
    Terima kasih telah mengunjungi layanan e-PPID PT Pelabuhan Indonesia III (Persero). 
    Layanan ini merupakan sarana layanan online bagi pemohon informasi publik sebagai salah satu wujud pelaksanaan keterbukaan informasi publik di PT Pelabuhan Indonesia III (Persero).  
    Informasi yang kami sediakan meliputi:
    </p>
    <p class="mt-2 mb-2">
    1. <a href="{{ url('/info_layanan_publik_1') }}" class="no-underline hover:underline">Informasi yang wajib disediakan dan diumumkan secara berkala;</a>
    <br>
    2. <a href="{{ url('/info_layanan_publik_2') }}" class="no-underline hover:underline"> Informasi yang wajib disediakan dan diumumkan secara serta-merta;</a>
    <br>
    3. <a href="{{ url('/info_layanan_publik_3') }}" class="no-underline hover:underline"> Informasi yang wajib sedia setiap saat;</a>
    </p>
    <p>
    Untuk pengajuan permohonan informasi, silakan melakukan registrasi melalui kolom yang tersedia.
    <br>
    Informasi lebih lanjut dapat menghubungi:
    <br>
    PPID PT Pelabuhan Indonesia III (Persero)
    <br>
    
        Jl. Perak Timur No. 610 
        <br>
        Surabaya 60165 - Indonesia 
        <br>
        Jam Layanan : Senin - Jumat pukul 08:00 - 16:00 WIB
        ( kecuali hari libur nasional )
        <br>
        Telpon   : +62 31 3298631-37 
        <br>
        Fax       : +62 31 3295207 
        <br>
        Email    : info@pelindo.co.id
    </p>
    </div>
  </div>
</div>







       
   
@endsection