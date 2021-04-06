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
                     <th class="border whitespace-no-wrap" style="width:10%;">No.</th>
                     <th class="border whitespace-no-wrap" style="width:30%;">Judul</th>
                     <th class="border whitespace-no-wrap" style="width:20%;">Keterangan</th>
                     <th class="border whitespace-no-wrap" style="width:40%;">Option</th>
            </tr>
        </thead>
        <tbody>
                @foreach($kd->dokumenKategori($kd->ID_KATEGORI) as $d)
                    <tr>
                            <td class="border border-b dark:border-dark-5">{{ $loop->iteration }}</td>
                            <td class="border border-b dark:border-dark-5">{{ $d->NAMA_DOKUMEN }}</td>
                            <td class="border border-b dark:border-dark-5">{{ $d->KETERANGAN }}</td>
                            <td class="border border-b dark:border-dark-5 flex">
                            @if($d->ID_JENIS_DOKUMEN == 1)
                                <a href="{{ $d->LINK }}" target="_blank">
                                    <button class="button mr-2 mb-2 flex bg-theme-1 text-white">
                                            <i data-feather="external-link" class="w-5 h-5"></i>
                                                <div class="ml-2">View</div>
                                    </button>
                                </a>
                            @elseif($d->ID_JENIS_DOKUMEN == 2)
                                <a href="{{ url('download/dokumen-publik/'.$d->ID_DOKUMEN) }}"> 
                                    <button class="button mr-2 mb-2 flex bg-theme-1 text-white">
                                            <i data-feather="download" class="w-5 h-5"></i>
                                                <div class="ml-2">Download</div>
                                    </button>
                                </a>
                            @elseif($d->ID_JENIS_DOKUMEN == 3)
                                <a href="{{ $d->LINK }}" target="_blank">
                                        <button class="button mr-2 mb-2 flex bg-theme-1 text-white">
                                                <i data-feather="external-link" class="w-5 h-5"></i>
                                                    <div class="ml-2">View</div>
                                        </button>
                                </a>
                                <a href="{{ url('download/dokumen-publik/'.$d->ID_DOKUMEN) }}"> 
                                    <button class="button mr-2 mb-2 flex bg-theme-1 text-white">
                                            <i data-feather="download" class="w-5 h-5"></i>
                                                <div class="ml-2">Download</div>
                                    </button>
                                </a>
                            @endif
                            </td>
                    </tr>  
                @endforeach
                </tbody>
            </table>
    @endforeach
</div>
@endsection