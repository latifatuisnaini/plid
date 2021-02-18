@extends('layout')
@section('namehalaman')
    <h2 class="text-lg font-medium mr-auto">
        MAKLUMAT
    </h2>
@endsection
@section('content')
<h6 class="text-sm hidden sm:visible md:invisible lg:invisible xl:invisible 2xl:invisible text-red-500 font-bold">
    *Geser ke kanan untuk mengunduh atau melihat dokumen.
</h6>
<br>
<img href="#" src="{{ asset('dist/images/maklumat.png') }}">
@endsection