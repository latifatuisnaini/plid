@extends('layout')
@section('namehalaman')
<div class="flex flex-row">
<i data-feather="help-circle"></i>
    <h2 class="text-lg font-medium mr-auto ml-3">
        Informasi yang wajib disediakan dan diumumkan secara serta-merta
    </h2>
</div>
@endsection
@section('content')
<br>
<div class="overflow-x-auto">
@foreach($kategori_dokumen as $kd)
    <h2 class="text-lg font-medium mr-auto">
        {{ $kd->KATEGORI }}
    </h2>
    <table class="table mt-3 border">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                 <th class="border whitespace-no-wrap">No.</th>
                 <th class="border whitespace-no-wrap">Judul</th>
                 <th class="border whitespace-no-wrap">Keterangan</th>
                 <th class="border whitespace-no-wrap">Option</th>
            </tr>
        </thead>
        <tbody>
                @foreach($kd->dokumenKategori($kd->ID_KATEGORI) as $d)
                    <tr>
                            <td class="border border-b dark:border-dark-5">{{ $loop->iteration }}</td>
                            <td class="border border-b dark:border-dark-5">{{ $d->NAMA_DOKUMEN }}</td>
                            <td class="border border-b dark:border-dark-5">{{ $d->KETERANGAN }}</td>
                            <td class="border border-b dark:border-dark-5">
                                <a href="#" class="button w-24 inline-block mr-1 mb-2 bg-theme-1 text-white">{{ $d->jenis_dokumen->JENIS_DOKUMEN }}</a>
                            </td>
                    </tr>  
                @endforeach
                </tbody>
            </table>
    @endforeach
</div>
@endsection