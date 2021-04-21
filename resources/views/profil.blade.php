@extends('layout')
@section('title')
    Profil
@endsection
@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="search"></i>
    <h2 class="text-lg font-medium mr-auto ml-3"> PROFIL </h2>
</div>
@endsection
@section('content')
<div class="px-2">
  <div class="flex -mx-2">
    <div class="w-1/6 px-2">
    <img src="{{ asset('dist/images/logo1_profil.png') }}">
    </div>
    <div class="w-3/4 px-2">
    <p>
    Portal e-ppid ini merupakan bagian dari layanan informasi publik yang dilaksanakan oleh PT PAL Indonesia (Persero) sesuai dengan Undang-undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. 
    PT PAL Indonesia (Persero) memberikan kesempatan kepada masyarakat untuk mengetahui tentang perusahaan melalui informasi yang kami sediakan maupun melalui permintaan informasi. 
    </p>
    </div>
  </div>
</div>

<div class="px-2 mt-2">
  <div class="flex -mx-2">
    <div class="w-1/6 px-2">
    <img src="{{ asset('dist/images/logo2_profil.png') }}">
    </div>
    <div class="w-3/4 px-2">
    <p class="mt-2">Dukungan masyarakat sangat kami perlukan dalam pelaksanaan Keterbukaan Informasi Publik di lingkungan PT PAL Indonesia (Persero).  
    Segala bentuk berkaitan dengan peningkatan layanan berkaitan dengan Keterbukaan Informasi Publik dapat disampaikan kepada PPID Perusahaan PT PAL Indonesia (Persero) melalui saluran berikut:
    </p>
    <p class="mt-2">
    PPID PT PAL Indonesia (Persero) 
    </p>
    <p class="mt-2">
        Jl. Ujung, Surabaya 60165 - Indonesia  
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