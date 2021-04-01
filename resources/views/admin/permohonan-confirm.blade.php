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
        <h2 class="text-lg font-medium mr-auto ml-3">Table Permohonan User yang Sudah Dikonfirmasi</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full ">

    <div class="intro-y block sm:flex items-center h-10">
        <!-- <h2 class="text-lg font-medium truncate mr-5">
            Print Tabel Permohonan yang Sudah Dikonfirmasi
        </h2> -->
        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
            <a target="_blank" href="{{url('/admin/cetak-permohonan-confirm')}}">
                <button class="ml-3 button box flex items-center shadow-md bg-gray-200 text-gray-700 buttons-html5 buttons-pdf" id="print"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> Print Tabel Permohonan  </button>
            </a>
        </div>
    </div>  
    <br>

    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="view" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="3">Tanggal</th>
                    <th data-priority="1">Nama Dokumen</th>
                    <th data-priority="2" width="40%">Keterangan Dokumen</th>
                    <th data-priority="2">Status</th>
                    <th data-priority="6">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($permohonan_confirm as $p)
                <tr>
                    <td>{{ date('d F Y',strtotime($p->TANGGAL)) }}</td>
                    <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                    <td>{{$p->KETERANGAN}}</td>
                    <td>
                    @if($p->ID_STATUS == 3)
                            <div class="text-center">
                                <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                    @else
                        <div class="text-center">
                                <div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                    @endif
                    </td>
                    <td style="text-align: center;">
                        <a data-toggle="modal" data-target="#detail_{{ $p->ID_PERMOHONAN }}">
                            <button href="javascript:;" title="Detail Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                </span>
                            </button>
                        </a>
                        <a target="_blank" href="{{url('/admin/cetakpermohonan/'.$p->ID_PERMOHONAN)}}">
                            <button href="javascript:;" title="Print Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-blue-300 dark:text-gray-300">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="printer" class="w-4 h-4 "></i>
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach($permohonan_confirm as $p)
        <div class="modal" id="detail_{{ $p->ID_PERMOHONAN }}">
            <div class="modal__content modal__content--lg py-5 pl-3 pr-1 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>

                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Detail Permohonan #{{ $p->ID_PERMOHONAN }}</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto" id="close_{{$p->ID_PERMOHONAN}}"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
            <div class="modal-body">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Nama Dokumen</label>
                        <div class="text-base">{{ $p->DOKUMEN_PERMOHONAN }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Keterangan Dokumen</label>
                        <div class="text-base">{{ $p->KETERANGAN }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Tanggal Pengajuan</label>
                        <div class="text-base">{{ date('d-m-Y',strtotime($p->TANGGAL)) }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Status</label>
                        @if($p->ID_STATUS == 3)
                            <div class="text-base">
                            <div class="flex items-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                        @else
                            <div class="text-base">
                            <div class="flex items-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> {{$p->status->STATUS}} </div>
                            </div>
                        @endif
                        <!-- <div class="text-base">{{ $p->status->STATUS }}</div> -->
                    </div>

                    <div class="col-span-12 sm:col-span-6 mt-2"> 
                        <label class="font-semibold text-lg">Diajukan Oleh :</label>
                        <div class="text-base">{{ $p->user->NAMA_LENGKAP }}</div>
                        <a href="{{ route('user.show',$p->ID_USER) }}" target="_blank">
                            <button class="button w-32 mr-2 mb-2 mt-2 flex items-center justify-center bg-theme-1 text-white"> 
                                <i data-feather="external-link" class="w-4 h-4 mr-2"></i> Detail User 
                            </button>
                        </a>
                    </div>
                @if(isset($p->feedback))
                    <div class="col-span-12 sm:col-span-6 mt-2">
                        <label class="font-semibold text-lg">Keterangan </label>
                        <div class="text-base">{{ $p->feedback->KETERANGAN}}</div>
                     
                    </div>
                
                    @if($p->ID_STATUS == 3)
                    <div class="col-span-12 sm:col-span-12"> 
                        <div class="p-3 mt-4 lg:mt-0 rounded shadow">
                            <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th data-priority="1">Nama File</th>
                                    <th data-priority="2">Expired Date</th>
                                    <th data-priority="3">Aksi</th>
                                </tr>
                            </thead>
                                </div>
                            <tbody>
                                <tr style="text-align: center;">
                                    <td>{{$p->feedback->NAMA_FILE}}</td>
                                    <td>{{date('d F Y ',strtotime($p->feedback->EXPIRED_DATE))}}</td>
                                    <td>
                                    <a href ="{{ route('admin-download', $p->feedback->ID_FEEDBACK) }}" class="button mb-5 mr-6 mt-3 flex items-center justify-center bg-theme-1 text-white tombol-tambah-download" style="float:right;" ><i data-feather="download" class="w-4 h-4 mr-2"></i>Download</a>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    
                    </div>
                    @endif
                @endif
                </div>
            </div>
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
 
<script>
$(document).ready(function() {

    var table = $('#view').DataTable( {
        responsive: true,
        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         extend: 'pdfHtml5',
        //         download: 'open'
        //     }
        // ]
    } )
    .columns.adjust()
    .responsive.recalc();
});

</script>
@endsection