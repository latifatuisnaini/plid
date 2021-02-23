@extends('layout')
@section('namehalaman')
<div class="flex flex-row">
    <i data-feather="search"></i>
    <h2 class="text-lg font-medium mr-auto ml-3">
        MAKLUMAT
    </h2>
</div>
@endsection
@section('content')
<h6 class="text-sm hidden sm:visible md:invisible lg:invisible xl:invisible 2xl:invisible text-red-500 font-bold">
    *Geser ke kanan untuk mengunduh atau melihat dokumen.
</h6>
<br>
<img href="#" src="{{ asset('dist/images/maklumat.png') }}">
@endsection