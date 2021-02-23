@extends('layout')
@section('namehalaman')
    <h2 class="text-lg font-medium mr-auto">
        Informasi Yang Wajib Sedia Setiap Saat
    </h2>
@endsection
@section('content')
<div class="overflow-x-auto">
    <h2 class="text-lg font-medium mr-auto">
        Daftar Informasi Publik
    </h2>
    <table class="table mt-5">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="whitespace-no-wrap">No.</th>
                <th class="whitespace-no-wrap">Judul</th>
                <th class="whitespace-no-wrap">Option</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-b dark:border-dark-5">1</td>
                <td class="border-b dark:border-dark-5">Daftar Informasi Publik PT Pelabuhan Indonesia III (Persero)</td>
                <td class="border-b dark:border-dark-5">
                    <a href="#" class="button w-24 inline-block mr-1 mb-2 bg-theme-1 text-white">Download</a>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection