@extends('admin.layout')
@section('css')
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        
<style>
/*Form fields*/
.dataTables_wrapper select,
.dataTables_wrapper .dataTables_filter input {
    color: #4a5568; 			/*text-gray-700*/
    padding-left: 1rem; 		/*pl-4*/
    padding-right: 1rem; 		/*pl-4*/
    padding-top: .5rem; 		/*pl-2*/
    padding-bottom: .5rem; 		/*pl-2*/
    line-height: 1.25; 			/*leading-tight*/
    border-width: 2px; 			/*border-2*/
    border-radius: .25rem; 		
    border-color: #edf2f7; 		/*border-gray-200*/
    background-color: #edf2f7; 	/*bg-gray-200*/
}

/*Row Hover*/
table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
    background-color: #ebf4ff;	/*bg-indigo-100*/
}

/*Pagination Buttons*/
.dataTables_wrapper .dataTables_paginate .paginate_button		{
    font-weight: 700;				/*font-bold*/
    border-radius: .25rem;			/*rounded*/
    border: 1px solid transparent;	/*border border-transparent*/
}

/*Pagination Buttons - Current selected */
.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
    color: #fff !important;				/*text-white*/
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
    font-weight: 700;					/*font-bold*/
    border-radius: .25rem;				/*rounded*/
    background: #667eea !important;		/*bg-indigo-500*/
    border: 1px solid transparent;		/*border border-transparent*/
}

/*Pagination Buttons - Hover */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
    color: #fff !important;				/*text-white*/
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
    font-weight: 700;					/*font-bold*/
    border-radius: .25rem;				/*rounded*/
    background: #667eea !important;		/*bg-indigo-500*/
    border: 1px solid transparent;		/*border border-transparent*/
}

/*Add padding to bottom border */
table.dataTable.no-footer {
    border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
    margin-top: 0.75em;
    margin-bottom: 0.75em;
}

/*Change colour of responsive icon*/
table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
    background-color: #667eea !important; /*bg-indigo-500*/
}

</style>
@endsection
@section('content')
<div class="intro-y box p-5 mt-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">                        
    <div class="flex flex-row">
        <i data-feather="list"></i>
        <h2 class="text-lg font-medium mr-auto ml-3">Table Dokumen Publik</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full ">
    @if($errors->any())
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
            <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
            Data tidak berhasil disimpan. Mohon cek form kembali.
        </div>
    @endif
    @if(Session::has('alert_sukses'))
        <div class="rounded-md w-35 flex items-center px-5 py-4 mb-2 ml-5 bg-theme-18 text-theme-9">
            <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>
            Data berhasil disimpan.
        </div>
    @endif
    <a href ="javascript:;" data-toggle="modal" data-target="#upload_dokumen" class="button mb-5 mr-6 mt-4 flex items-center justify-center bg-theme-1 text-white tombol-tambah-dokumen-permohonan" style="float:right;" ><i data-feather="file-plus" class="w-6 h-6 mr-2"></i>Tambah Dokumen Publik</a>
    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">No.</th>
                    <th data-priority="3">Menu / Kategori</th>
                    <th data-priority="2">Jenis</th>
                    <th data-priority="4">No. Urut</th>
                    <th data-priority="4">Nama</th>
                    <th data-priority="5" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sorting berdasarkan menu/kategori dan nomor urut. --}}
            @foreach($dokumens as $u)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{$u->kategori_dokumen->jenis_kategori_dokumen->JENIS_KATEGORI}} / {{$u->kategori_dokumen->KATEGORI}}</td>
                    <td>
                        @if($u->jenis_dokumen->JENIS_DOKUMEN == "View")
                        <a href="{{ $u->LINK }}" target="_blank" class="underline text-blue-500">
                            View
                        </a>
                        @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "Download")
                        <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="underline text-blue-500">
                            Download
                        </a>
                        @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "View dan Download")
                        <a href="{{ $u->LINK }}" target="_blank" class="underline text-blue-500">
                            View
                        </a>
                        dan
                        <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="underline text-blue-500">
                            Download
                        </a>
                        @endif
                    </td>
                    <td>{{$u->NOMOR_URUT}}</td>
                    <td>{{$u->NAMA_DOKUMEN}}</td>
                    <td class="text-center">
                        <a data-toggle="modal" data-target="#detailDokumen_{{$u->ID_DOKUMEN}}" id="edit-dokumen_{{$u->ID_DOKUMEN}}" class="button-edit-dokumen">
                            <button href="javascript:;" title="Detail Dokumen" type="button" class="tooltip button px-2 mr-1 mb-2 bg-blue-300 dark:text-gray-300">
                                <span class="w-5 h-5">
                                    <i data-feather="more-vertical" class="w-5 h-5 "></i>
                                </span>
                            </button>
                        </a>
                        <a data-toggle="modal" data-target="#editDokumen_{{$u->ID_DOKUMEN}}" id="edit-dokumen_{{$u->ID_DOKUMEN}}" class="button-edit-dokumen">
                            <button href="javascript:;" title="Edit Dokumen" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                <span class="w-5 h-5">
                                    <i data-feather="edit" class="w-5 h-5 "></i>
                                </span>
                            </button>
                        </a>
                        <a data-toggle="modal" data-target="#deleteDokumen_{{$u->ID_DOKUMEN}}" id="edit-dokumen_{{$u->ID_DOKUMEN}}" class="button-edit-dokumen">
                            <button href="javascript:;" title="Hapus Dokumen" type="button" class="tooltip button px-2 mr-1 mb-2 bg-red-300 dark:text-gray-300">
                                <span class="w-5 h-5">
                                    <i data-feather="trash-2" class="w-5 h-5 "></i>
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal" id="upload_dokumen">
            <div class="modal__content modal__content--lg p-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="upload" class="w-8 h-8 mr-2"></i>Upload Dokumen Publik</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <form action="{{ route('dokumen-publik.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12">
                                @if($errors->has('LINK_DOKUMEN') && $errors->has('FILE'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Anda harus mengupload dokumen dan mengisi link dokumen.
                                    </div>
                                @elseif($errors->has('LINK_DOKUMEN'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Link harus diisi.
                                    </div>
                                @elseif($errors->has('FILE'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Anda harus mengupload dokumen.
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Jenis Dokumen</label>
                                <select class="input border mr-2 w-full mt-2" name="ID_JENIS_DOKUMEN" id="jenis_dokumen" required>
                                    <option selected disabled>Pilih jenis dokumen.....</option>
                                    @foreach($jenis_dokumen as $j)
                                        <option value="{{ $j->ID_JENIS_DOKUMEN }}">{{ $j->JENIS_DOKUMEN }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Jenis Kategori Dokumen</label>
                                <select class="input border mr-2 w-full mt-2" name="ID_JENIS_KATEGORI" id="jenis_kategori" required>
                                    <option selected disabled>Pilih jenis kategori.....</option>
                                    @foreach($jenis_kategoris as $j)
                                        <option value="{{ $j->ID_JENIS_KATEGORI }}">{{ $j->JENIS_KATEGORI }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Kategori Dokumen</label>
                                <select class="input border mr-2 w-full mt-2" name="ID_KATEGORI" id="kategori" required>
                                    <option selected disabled>Pilih kategori.....</option>
                                    @foreach($kategori_dokumen as $j)
                                        <option value="{{ $j->ID_KATEGORI }}">{{ $j->KATEGORI }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-12 sm:col-span-3"> 
                                <label class="font-semibold text-lg">No. Urut</label>
                                <input type="number" class="input w-full border mt-2 flex-1" placeholder="No. Urut" name="NOMOR_URUT" id="NOMOR_URUT" required min="1" value="{{@old('NOMOR_URUT')}}">
                                @error('ID_KATEGORI')
                                <small class="text-theme-6">Nomor urut sudah digunakan.</small>
                                @enderror
                            </div>

                            <div class="col-span-12 sm:col-span-9"> 
                                <label class="font-semibold text-lg">Nama Dokumen</label>
                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Nama Dokumen" name="NAMA_DOKUMEN" id="NAMA_DOKUMEN" required value="{{@old('NAMA_DOKUMEN')}}">
                            </div>

                            <div class="col-span-12" id="input-file"> 
                                <label class="font-semibold text-lg">File</label>
                                <input type="file" class="input w-full border mt-2 flex-1" placeholder="File Dokumen" name="FILE" id="FILE">
                            </div>

                            <div class="col-span-12" id="input-link"> 
                                <label class="font-semibold text-lg">Link</label>
                                <input type="url" class="input w-full border mt-2 flex-1" placeholder="Link Dokumen" name="LINK_DOKUMEN" id="LINK_DOKUMEN">
                            </div>

                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Keterangan</label>
                                <textarea class="input w-full border mt-2" name="KETERANGAN">{{@old('KETERANGAN')}}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer mt-5">
                        <div class="text-right">
                            <button type="button" class="button w-24 shadow-md mr-1 mb-2 bg-red-500 text-white" data-dismiss="modal">Cancel</button> 
                            <button class="button items-right w-24 shadow-md mr-1 mb-2 justify-right bg-theme-1 text-white shadow-md" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @foreach($dokumens as $u)
        <div class="modal editModal" id="editDokumen_{{$u->ID_DOKUMEN}}">
            <div class="modal__content modal__content--lg p-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Edit Dokumen</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <form action="{{ route('dokumen-publik.update',$u->ID_DOKUMEN) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12">
                                @if($errors->has('LINK_DOKUMEN') && $errors->has('FILE'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Anda harus mengupload dokumen dan mengisi link dokumen.
                                    </div>
                                @elseif($errors->has('LINK_DOKUMEN'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Link harus diisi.
                                    </div>
                                @elseif($errors->has('FILE'))
                                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Anda harus mengupload dokumen.
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Jenis Dokumen</label>
                                <select class="input border mr-2 w-full mt-2 jenis_dokumen" name="ID_JENIS_DOKUMEN" id="jenis_dokumen_{{$u->ID_DOKUMEN}}" required>
                                    <option disabled>Pilih jenis dokumen.....</option>
                                    @foreach($jenis_dokumen as $j)
                                        <option value="{{ $j->ID_JENIS_DOKUMEN }}" @if($u->ID_JENIS_DOKUMEN == $j->ID_JENIS_DOKUMEN) selected @endif>{{ $j->JENIS_DOKUMEN }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Jenis Kategori</label>
                                <select class="input border mr-2 w-full mt-2 jenis_kategori_edit" name="ID_JENIS_KATEGORI" id="jenis_kategori_{{$u->ID_DOKUMEN}}" required>
                                    <option disabled>Pilih jenis kategori.....</option>
                                    @foreach($jenis_kategoris as $j)
                                        <option value="{{ $j->ID_JENIS_KATEGORI }}" @if($u->kategori_dokumen->jenis_kategori_dokumen->ID_JENIS_KATEGORI == $j->ID_JENIS_KATEGORI) selected @endif>{{ $j->JENIS_KATEGORI }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Menu / Kategori</label>
                                <select class="input border mr-2 w-full mt-2" name="ID_KATEGORI" id="kategori_{{$u->ID_DOKUMEN}}" required>
                                </select>
                            </div>

                            <div class="col-span-12 sm:col-span-3"> 
                                <label class="font-semibold text-lg">No. Urut</label>
                                <input type="number" class="input w-full border mt-2 flex-1" placeholder="No. Urut" name="NOMOR_URUT" id="NOMOR_URUT_{{$u->ID_DOKUMEN}}"  value="{{$u->NOMOR_URUT}}" required min="1">
                            </div>

                            <div class="col-span-12 sm:col-span-9"> 
                                <label class="font-semibold text-lg">Nama Dokumen</label>
                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Nama Dokumen" name="NAMA_DOKUMEN" id="NAMA_DOKUMEN_{{$u->ID_DOKUMEN}}" value="{{$u->NAMA_DOKUMEN}}" required>
                            </div>

                            <div class="col-span-12">
                                <label class="font-semibold text-lg">Dokumen Asli</label>
                                @if($u->jenis_dokumen->JENIS_DOKUMEN == "View")
                                <a href="{{ $u->LINK }}" target="_blank"  class="button mt-3 flex items-center justify-center bg-theme-1 text-white">
                                    <i data-feather="external-link" class="w-5 h-5 mr-2"></i>View
                                </a>
                                @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "Download")
                                <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="button mt-3 flex items-center justify-center bg-theme-1 text-white">
                                    <i data-feather="download" class="w-5 h-5 mr-2"></i>Download
                                </a>
                                @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "View dan Download")
                                <div class="flex items-start justify-start">
                                    <a href="{{ $u->LINK }}" target="_blank" class="flex button mt-3 mr-5 bg-theme-1 text-white">
                                        <i data-feather="external-link" class="w-5 h-5 mr-2"></i>View
                                    </a>
                                    <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="flex button mt-3 justify-center bg-theme-1 text-white">
                                        <i data-feather="download" class="w-5 h-5 mr-2"></i>Download
                                    </a>
                                </div>
                                @endif
                            </div>

                            <div class="col-span-12" id="input-file_{{$u->ID_DOKUMEN}}"> 
                                <label class="font-semibold text-lg">File Baru</label>
                                <input type="file" class="input w-full border mt-2 flex-1" placeholder="File Dokumen" name="FILE" id="FILE_{{$u->ID_DOKUMEN}}">
                            </div>

                            <div class="col-span-12" id="input-link_{{$u->ID_DOKUMEN}}"> 
                                <label class="font-semibold text-lg">Link</label>
                                <input type="url" class="input w-full border mt-2 flex-1" placeholder="Link Dokumen" name="LINK_DOKUMEN" id="LINK_DOKUMEN_{{$u->ID_DOKUMEN}}" value="{{$u->LINK}}">
                            </div>

                            <div class="col-span-12"> 
                                <label class="font-semibold text-lg">Keterangan</label>
                                <textarea class="input w-full border mt-2" name="KETERANGAN">{{$u->KETERANGAN}}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer mt-5">
                        <div class="text-right">
                            <button type="button" class="button w-24 shadow-md mr-1 mb-2 bg-red-500 text-white" data-dismiss="modal">Cancel</button> 
                            <button class="button items-right w-24 shadow-md mr-1 mb-2 justify-right bg-theme-1 text-white shadow-md" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="detailDokumen_{{$u->ID_DOKUMEN}}">
            <div class="modal__content modal__content--lg p-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Detail Dokumen</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Jenis</label>
                            <div class="text-base">{{ $u->jenis_dokumen->JENIS_DOKUMEN }}</div>
                        </div>
                        <div class="col-span-12"> 
                            <label class="font-semibold text-lg">Menu / Kategori</label>
                            <div class="text-base">{{ $u->kategori_dokumen->jenis_kategori_dokumen->JENIS_KATEGORI }} / {{ $u->kategori_dokumen->KATEGORI }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-2"> 
                            <label class="font-semibold text-lg">No.</label>
                            <div class="text-base">{{ $u->NOMOR_URUT }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-10"> 
                            <label class="font-semibold text-lg">Nama Dokumen</label>
                            <div class="text-base">{{ $u->NAMA_DOKUMEN }}</div>
                        </div>

                        <div class="col-span-12">
                            <label class="font-semibold text-lg">Dokumen</label>
                            @if($u->jenis_dokumen->JENIS_DOKUMEN == "View")
                            <a href="{{ $u->LINK }}" target="_blank"  class="button mt-3 flex items-center justify-center bg-theme-1 text-white">
                                <i data-feather="external-link" class="w-5 h-5 mr-2"></i>View
                            </a>
                            @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "Download")
                            <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="button mt-3 flex items-center justify-center bg-theme-1 text-white">
                                <i data-feather="download" class="w-5 h-5 mr-2"></i>Download
                            </a>
                            @elseif($u->jenis_dokumen->JENIS_DOKUMEN == "View dan Download")
                            <div class="flex items-start justify-start">
                                <a href="{{ $u->LINK }}" target="_blank" class="flex button mt-3 mr-5 bg-theme-1 text-white">
                                    <i data-feather="external-link" class="w-5 h-5 mr-2"></i>View
                                </a>
                                <a href="{{ url('download/dokumen-publik/'.$u->ID_DOKUMEN) }}" class="flex button mt-3 justify-center bg-theme-1 text-white">
                                    <i data-feather="download" class="w-5 h-5 mr-2"></i>Download
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="col-span-12"> 
                            <label class="font-semibold text-lg">Keterangan</label>
                            <div class="text-base">@isset($u->KETERANGAN)
                                {{$u->KETERANGAN}}
                            @else
                                -
                            @endisset</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal editModal" id="deleteDokumen_{{ $u->ID_DOKUMEN }}">
            <div class="modal__content modal__content--lg p-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="trash-2" class="w-8 h-8 mr-2"></i>Delete Dokumen #{{ $u->ID_DOKUMEN }}</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <form action="{{ route('dokumen-publik.destroy',$u->ID_DOKUMEN) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="text-base mt-5">
                        Apakah anda yakin ingin menghapus Dokumen {{ $u->NAMA_DOKUMEN }} ?
                    </div>
                    <div class="text-base text-theme-6">Data yang dihapus tidak dapat dikembalikan.</div>
                    <div class="modal-footer mt-5">
                        <div class="text-right">
                            <button type="button" class="button shadow-md mr-1 mb-2 bg-red-500 text-white" data-dismiss="modal">Tidak, batalkan.</button> 
                            <button class="button items-right shadow-md mr-1 mb-2 justify-right bg-theme-1 text-white shadow-md" type="submit">Ya, hapus.</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

    </div>
    <!--/Card-->
</div>
<!--/container-->
</div>
@endsection
@section('script')
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
            responsive: true,
            columnDefs: [
                { orderable: false, targets: 4 }
            ],
        } )
        .columns.adjust()
        .responsive.recalc();

    $("#input-file").hide();
    $("#input-link").hide();

    if($('#jenis_dokumen').val() == 1){
        $("#input-link").show();
        $("#input-file").hide();
    }
    else if($('#jenis_dokumen').val() == 2){
        $("#input-link").hide();
        $("#input-file").show();
    }
    else if($('#jenis_dokumen').val() == 3){
        $("#input-link").show();
        $("#input-file").show();
    }

    $("#jenis_kategori").on('change',function(){
        var id = $(this).val();
        $.get("getKategori/"+id,
            function(data){
                $('#kategori').empty();

                $('#kategori').append('<option selected disabled>Pilih kategori.....</option>');

                $.each(data, function (id, name) {
                    $('#kategori').append(new Option(id, name));
                });
            }
        );
    });

    $(".button-edit-dokumen").on('click',function(){
        var id_elemen = $(this).attr('id').substr(13);
        var id_kategori = $("#jenis_kategori_"+id_elemen).val();
        getKategoriEdit(id_elemen, id_kategori);
        setTampilInput(id_elemen);
    });

    $(".jenis_kategori_edit").on('change',function(){
        var id_elemen = $(this).attr('id').substr(15);
        var id_kategori = $(this).val();
        getKategoriEdit(id_elemen, id_kategori);
        console.log('setelah get kategori edit');
    });

    function getKategoriEdit(id_elemen, id_kategori){
        $.get("getKategori/"+id_kategori,
            function(data){
                $('#kategori_'+id_elemen).empty();
                $('#kategori_'+id_elemen).append('<option disabled>Pilih kategori.....</option>');

                $.each(data, function (id_data, name) {
                    $('#kategori_'+id_elemen).append(new Option(id_data, name));
                });
            }
        );
    }

    $("#jenis_dokumen").on('change',function(){
        if($(this).val() == 1){
            $("#input-link").show();
            $("#input-file").hide();
        }
        else if($(this).val() == 2){
            $("#input-link").hide();
            $("#input-file").show();
        }
        else if($(this).val() == 3){
            $("#input-link").show();
            $("#input-file").show();
        }
    });

    $(".jenis_dokumen").on('change',function(){
        var id = $(this).attr('id').substr(14);
        setTampilInput(id);
    });

    function setTampilInput(id)
    {
        if($("#jenis_dokumen_"+id).val() == 1){
            $("#input-link_"+id).show();
            $("#input-file_"+id).hide();
        }
        else if($("#jenis_dokumen_"+id).val() == 2){
            $("#input-link_"+id).hide();
            $("#input-file_"+id).show();
        }
        else if($("#jenis_dokumen_"+id).val() == 3){
            $("#input-link_"+id).show();
            $("#input-file_"+id).show();
        }
    }

    $(".btn-tolak").on('click',function(){
        var id = $(this).attr('id').substr(6);
        $.post("/admin/permohonan/tolak/"+id,{
                _token : '{{ csrf_token() }}',
                estimasi : $("#estimasi_"+id).val(),
                keterangan : $("#keterangan_"+id).val(),
                keterangan_estimasi : $("#keterangan_estimasi_"+id).val()
            }, 
            function(){
                $("#close_"+id)[0].click();
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Status permohonan berhasil diubah menjadi Ditolak.',
                    icon: 'success',
                }
            );
        });
    });

    $(".btn-terima").on('click',function(){
        var id = $(this).attr('id').substr(7);
        console.log(id);
        $.post("/admin/permohonan/terima/"+id,{
                _token : '{{ csrf_token() }}',
                estimasi : $("#estimasi_"+id).val(),
                keterangan : $("#keterangan_"+id).val(),
                keterangan_estimasi : $("#keterangan_estimasi_"+id).val()
            },
            function(){
                $("#close_"+id)[0].click();
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Status permohonan berhasil diubah menjadi Sedang diproses.',
                    icon: 'success',
                });
            }
        );
    });
});
</script>
@endsection