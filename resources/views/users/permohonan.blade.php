@extends('users.layout')
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
@if(Session::has('success'))
<div class="rounded-md w-35 flex items-center px-5 py-4 mb-2 ml-5 bg-theme-18 text-theme-9"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>{{@session::get('success') }}</div>
@elseif(Session::has('alert_error'))
<div class="rounded-md w-35 flex items-center px-5 py-4 mb-2 ml-5 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{@session::get('alert_error') }}</div>
@endif

<div class="content">
<div class="intro-y box p-5 mt-5 mb-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">                        
    <div class="flex flex-row">
        <i data-feather="list"></i>
        <h2 class="text-lg font-medium mr-auto ml-3">Permohonan </h2>
    </div>
    
</div>

@if(Auth::user()->STATUS_KONFIRMASI == 1)
<div class="col-span-6" >
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                        <div class="place-content-center">
                            <i data-feather="alert-triangle" class="mr-2" style="width: 250px; height: 250px; margin:auto;"></i>
                            <div class="font-medium text-3xl" style="text-align:center">Akun Anda belum aktif.</div>
                        </div>
                        <div class="mt-3 mb-5 text-xl" style="text-align:center">Mohon maaf, Anda belum dapat mengajukan permohonan dokumen. <br> Silahkan upload KTP Anda terlebih dahulu.</div>
                        <div class="text-center"> <a href="{{ url('/users') }}" class="button w-32 mr-2 mb-5 mt-3 flex items-center justify-center bg-theme-6 text-white" style="margin:auto;"><i data-feather="upload-cloud" class="w-6 h-6 mr-2" ></i> Upload </a> </div>
                    </div>
</div>
@elseif(Auth::user()->STATUS_KONFIRMASI == 2)
<div class="col-span-6">
                    <div class="rounded-md px-5 py-5 mb-2 bg-theme-31 text-theme-6 " >
                        <div class="place-content-center">
                            <i data-feather="alert-triangle" class="mr-2" style="width: 250px; height: 250px; margin:auto;"></i>
                            <div class="font-medium text-3xl" style="text-align:center">Akun Anda belum aktif.</div>
                        </div>
                        <div class="mt-3 mb-5 text-xl" style="text-align:center">Mohon maaf, Anda belum dapat mengajukan permohonan dokumen.<br> KTP Anda sedang menunggu diverifikasi.</div>
                    </div>
</div>
@elseif(Auth::user()->STATUS_KONFIRMASI == 3)
    @if($errors->any())
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
        Data tidak berhasil disimpan. Mohon cek form kembali.
    </div>
    @endif

    @if(Session::has('succcess'))
        <div class="alert alert-arrow-left alert-icon-left alert-light-primary mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            {{ Session::get('succcess') }}
        </div>
    @elseif(Session::has('alert_error'))
        <div class="alert alert-arrow-right alert-icon-right alert-light-danger mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
            {{ Session::get('alert_error') }}
        </div>
    @endif

<div class="intro-y box mt-5">
    <!--Container-->
    <!--Card-->
    <a href ="javascript:;" data-toggle="modal" data-target="#tambah_dokumen_permohonan" class="button mb-5 mr-6 mt-4 flex items-center justify-center bg-theme-1 text-white tombol-tambah-dokumen-permohonan" style="float:right;" ><i data-feather="plus-circle" class="w-6 h-6 mr-2"></i>Tambah Permohonan</a>
    <a href="{{ url ('/users/syarat_dan_ketentuan') }}" target="blank" class="button mb-5 mr-6 mt-4 flex items-center justify-center bg-theme-9 text-white tombol-syarat-dokumen-permohonan" style="float:right;"><i data-feather="info" class="w-6 h-6 mr-2"></i>Syarat dan Ketentuan</a>
    
    <div class="container w-full">
    
        <div class="p-6 mt-6 lg:mt-0 rounded shadow">
            <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Dokumen Permohonan</th>
                        <th data-priority="3">Tujuan Penggunaan Informasi</th>
                        <th data-priority="4">Tanggal</th>
                        <th data-priority="5">Bentuk Dokumen</th>
                        <th data-priority="6">Status</th>
                        <th data-priority="7">Aksi</th>
                    </tr>
                </thead>

                <tbody style="text-align: center;">
                @foreach($permohonan as $p)
                    <tr id="{{$p->ID_PERMOHONAN}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                        <td>{{$p->KETERANGAN}}</td>
                        <td>{{ date('d F Y',strtotime($p->TANGGAL)) }}</td>
                        <td>
                        @if($p->BENTUK_DOK == 1)
                        <div class="text">Softcopy</div>
                        @elseif($p->BENTUK_DOK == 2)
                        <div class="text">Hardcopy</div>
                        @endif
                        </td>
                        <td>
                            <div class="mt-1 mb-1"> 
                            @if ($p->status->ID_STATUS == 1)
                                <a href="javascript:;" data-toggle="modal" data-target="#detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}" class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-33 text-white" id="status_{{$p->ID_PERMOHONAN}}">{{$p->status->STATUS}}</a>
                            @elseif ($p->status->ID_STATUS == 2)
                                <a href="javascript:;" data-toggle="modal" data-target="#detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}" class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-12 text-white" id="status_{{$p->ID_PERMOHONAN}}">Diproses</a>
                            @elseif ($p->status->ID_STATUS == 3)
                                <a href="javascript:;" data-toggle="modal" data-target="#detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}" class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-9 text-white" id="status_{{$p->ID_PERMOHONAN}}">{{$p->status->STATUS}}</a>
                            @elseif ($p->status->ID_STATUS == 4)
                                <a href="javascript:;" data-toggle="modal" data-target="#detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}" class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-6 text-white" id="status_{{$p->ID_PERMOHONAN}}">{{$p->status->STATUS}}</a>
                            @endif
                            </div>
                        </td>
                        <td>
                            <div class="mt-1 mb-1"> 
                            
                            <button href="javascript:;" title="Detail Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300"><a data-toggle="modal" data-target="#detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}"><span class="w-5 h-5 flex items-center justify-center"> <i data-feather="more-horizontal" class="w-4 h-4 "></i></span></a> </button>  
                         
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Dokumen Permohonan -->
        <div class="modal" id="tambah_dokumen_permohonan">
            <div class="modal__content modal__content--lg py-5 pl-5 pr-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative">
                    </div>
                     <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Tambah Permohonan</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                    <div class="modal-body">
                    <form action="{{ route('permohonan.store') }}" method="POST" class="needs-validation" novalidate id="tambah-dokumen-permohonan">
                    @csrf

                    <input type="hidden" name="ID_USER" value="{{ Auth::user()->ID_USER }}">
                    
                    <div class="grid grid-cols-12 gap-4 row-gap-3 mt-3">
                    <div class="col-span-12">
                        <label class="font-semibold text-lg mr-auto mt-3">Dokumen Permohonan</label> 
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Dokumen Permohonan" name="DOKUMEN_PERMOHONAN" id="DOKUMEN_PERMOHONAN" value="{{ @old('DOKUMEN_PERMOHONAN') }}" required >
                            @if($errors->has('DOKUMEN_PERMOHONAN'))
                            <div class="flex flex-col sm:flex-row flex-auto mt-1 input-form ">
                                <small class="text-theme-6">Dokumen permohonan wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                    </div>
                    </div>
                    
                    <div class="grid grid-cols-12 gap-4 row-gap-3 mt-3">
                    <div class="col-span-12">
                        <label class="font-semibold text-lg mr-auto">Tujuan Penggunaan Informasi</label> 
                            <textarea class="input w-full border mt-2 flex-1" name="KETERANGAN" id="KETERANGAN" value="{{ @old('KETERANGAN') }}" required> </textarea>
                            @if($errors->has('KETERANGAN'))
                            <div class="flex flex-col sm:flex-row flex-auto mt-1 input-form ">
                                <small class="text-theme-6">Tujuan penggunaan informasi wajib diisi dengan data yang valid</small>
                            </div>
                            @endif
                    </div>
                    </div>

                    <div class="grid grid-cols-12 gap-4 row-gap-3 mt-3">
                    <div class="col-span-12">
                        <label class="font-semibold text-lg mr-auto mb-3">Bentuk Dokumen</label><br> 
                        <input class="border text-2xl mt-2 mr-1" name="BENTUK_DOK" id="SOFTCOPY" type="radio" value="1" checked>Softcopy</input><br>
                        <input class="border text-2xl mt-2 mr-1" name="BENTUK_DOK" id="HARDCOPY" type="radio" value="2">Hardcopy</input>
                    </div>
                    </div>
                    
                    <br>
                    <hr>

                    <div class="grid grid-cols-12 gap-4 row-gap-3 ">
                    <div class="col-span-12">
                        <input type="checkbox" class="input w-full border mt-2 mr-2 flex-1" id="myCheck" name="mycheckbox" required>Saya telah membaca dan menyetujui <a href="{{ url ('/users/syarat_dan_ketentuan') }}" target="blank" style="color:blue;"><u>Syarat dan Ketentuan</u></a> yang berlaku
                        @if($errors->has('mycheckbox'))
                            <div class="flex flex-col sm:flex-row flex-auto mt-1 input-form ">
                                <small class="text-theme-6">Wajib dicentang</small>
                            </div>
                            @endif
                    </div>
                    </div>


                <div class="modal-footer mt-5">
                    <div class="text-right">
                    <button type="button" class="button w-24 shadow-md mr-1 mb-2 bg-red-500 text-white" data-dismiss="modal">Cancel</button> 
                    <button class="button items-right w-24 shadow-md mr-1 mb-2 justify-right bg-theme-1 text-white shadow-md" type="submit" >Simpan</button>
                    </form>
                    </div>
                </div>

                </div>
            </div>

@foreach($permohonan as $p)
<!-- Modal Detail Dokumen Permohonan -->
<div class="modal" id="detail_dokumen_permohonan_{{$p->ID_PERMOHONAN}}">
            <div class="modal__content modal__content--lg py-5 pl-5 pr-5 ml-auto">
                <div class="modal-header">
                <div class="modal__content relative">
                    </div>
                <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Detail Permohonan #{{ $p->ID_PERMOHONAN }}</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                    
                </div>
                    
                    <div class="modal-body">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg mr-auto">Dokumen Permohonan</label> 
                            <div class="text-base">{{ $p->DOKUMEN_PERMOHONAN }}</div>
                        </div>
                        
                    
                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg mr-auto">Keterangan Dokumen</label> 
                            <div class="text-base">{{ $p->KETERANGAN }}</div>
                        </div>
                   

                        <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg mr-auto">Tanggal Permohonan</label> 
                            <div class="relative">
                                    <div class="text-base">{{ date('d F Y',strtotime($p->TANGGAL)) }}</div>
                            </div>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg mr-auto">Bentuk Dokumen</label> 
                            @if($p->BENTUK_DOK == 1)
                            <div class="text-base">Softcopy</div>
                            @elseif($p->BENTUK_DOK == 2)
                            <div class="text-base">Hardcopy</div>
                            @endif
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Status</label> 
                        @if ( $p->status->ID_STATUS == 4 )
                        <div class="text-base">
                                <div class="flex items-center text-theme-6 text-lg"> <i data-feather="x-square" class="w-5 h-5 mr-2"></i> {{$p->status->STATUS}} </div>
                        </div>
                        @elseif ( $p->status->ID_STATUS == 3 )
                        <div class="text-base">
                                <div class="flex items-center text-theme-9 text-lg"> <i data-feather="check-square" class="w-5 h-5 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                        @elseif ( $p->status->ID_STATUS == 2 )
                        <div class="text-base">
                                <div class="flex items-center text-theme-11 text-lg"> <i data-feather="loader" class="w-5 h-5 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                        @elseif ( $p->status->ID_STATUS == 1 )
                        <div class="text-base">
                                <div class="flex items-center text-theme-1 text-lg"> <i data-feather="file-plus" class="w-5 h-5 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                        @endif
                        </div>
                </div>
                @if(isset($p->feedback))
                <hr>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        
                        @if($p->ID_STATUS == 2)
                        <div class="col-span-12 sm:col-span-6"> 
                            <h2 class="font-semibold text-lg mr-auto">Waktu Estimasi</h2>
                            <div class="text-base">{{ $p->feedback->WAKTU_ESTIMASI }}</div>
                        </div>
                        
                        <div class="col-span-12 sm:col-span-6"> 
                            <h2 class="font-semibold text-lg mr-auto">Keterangan Estimasi</h2>
                            <div class="text-base">{{ $p->feedback->KETERANGAN_ESTIMASI }}</div>
                        </div>
                        
                        @endif
                
                        <div class="col-span-12 sm:col-span-6"> 
                            <h2 class="font-semibold text-lg mr-auto">Keterangan Status Dokumen</h2>
                            <div class="text-base">{{ $p->feedback->KETERANGAN }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <h2 class="font-semibold text-lg mr-auto">Tanggal Feedback</h2>
                            <div class="text-base">{{ date('h:i:s , d F Y ',strtotime($p->feedback->TGL_FEEDBACK)) }}</div>
                        </div>
                        
                        @endif

                </div>
                @if($p->ID_STATUS == 3)
                <hr>

                <div class="container w-full mt-4">
                <div class="p-3 mt-4 lg:mt-0 rounded shadow">
                    <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">Nama File</th>
                                <th data-priority="2">Expired Date</th>
                                @if($now > $p->feedback->EXPIRED_DATE)
                                <th data-priority="3">Status</th>
                                @else
                                <th data-priority="4">Aksi</th>
                                @endif

                            </tr>
                        </thead>
                </div>
                        <tbody style="text-align: center;">
                            <tr>
                                <td>{{$p->feedback->NAMA_FILE}}</td>
                                <td>{{date('d F Y ',strtotime($p->feedback->EXPIRED_DATE))}}</td>
                                @if($now > $p->feedback->EXPIRED_DATE)
                                <td>
                                <span class="text-theme-6">Dokumen sudah tidak tersedia.</span>
                                </td>
                                @else
                                <td>
                                <a href ="{{ url('/users/download/dokumen-permohonan', $p->feedback->ID_FEEDBACK) }}" class="button mb-5 mr-6 mt-3 flex items-center justify-center bg-theme-1 text-white tombol-tambah-download" style="float:right;" ><i data-feather="download" class="w-4 h-4 mr-2"></i>Download</a>
                                </td>
                                @endif    
                            </tr>
                        </tbody>
                    </table>
                </div>

                @endif
                    </div>

                <div class="modal-footer mt-5">
                    </form>
                    </div>
                    </div>
                </div>
@endforeach
    
@endif  

@endsection

@section('script')
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
console.log('Sudah masuk');
$(document).ready(function() {  

    var table = $('#example').DataTable( {
            responsive: true
        } )
        .columns.adjust()
        .responsive.recalc();

    $('tbody tr').on('click',function(){
        var id = $(this).attr('id');
        console.log('detail_dokumen_permohonan_'+id);
        $("#status_"+id)[0].click();
        // var modal = document.getElementById("detail_dokumen_permohonan_"+id);
        // modal.classList.toggle("show");
        // modal.classList.toggle("flex");
        // modal.classList.toggle("overflow-y-auto");
        // modal.classList.toggle("modal__overlap");
        // var modal2 = document.getElementById("detail_dokumen_permohonan_"+id+"-backdrop");
        // modal2.classList.toggle("hidden");
        // modal2.classList.toggle("flex");
    });

    

});

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
 
console.log(formatDate('Sun May 11,2014'));

</script>
@endsection