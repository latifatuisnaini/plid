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
        <h2 class="text-lg font-medium mr-auto ml-3">Table Permohonan yang Sedang Diproses</h2>
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
            <button class="ml-3 button box flex items-center shadow-md bg-gray-200 text-gray-700 buttons-html5 buttons-pdf" id="print"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> Print Tabel Permohonan  </button>
        </div>
    </div>  
    <br>

    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nama Dokumen</th>
                    <th data-priority="2" width="53%">Keterangan</th>
                    <th data-priority="3">Tanggal</th>
                    <th data-priority="6">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($permohonan_pending as $pp)
                <tr>
                    <td>{{$pp->DOKUMEN_PERMOHONAN}}</td>
                    <td>{{$pp->KETERANGAN}}</td>
                    <td>{{ date('d F Y',strtotime($pp->TANGGAL)) }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#detail_{{ $pp->ID_USER }}">
                            <button href="javascript:;" title="Detail Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                </span>
                            </button>
                        </a>
                        <a data-toggle="modal" data-target="#detail_{{ $pp->ID_PERMOHONAN }}">
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

        @foreach($permohonan_pending as $pp)
        <div class="modal" id="detail_{{ $pp->ID_USER }}">
            <div class="modal__content modal__content--lg py-5 pl-3 pr-1 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-3"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="user" class="w-8 h-8"></i>DETAIL USER ID {{ $pp->ID_USER }}</h2>
                    </div>
                </div>
            <div class="modal-body">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Nama Dokumen</label>
                        <div class="text-base">{{ $pp->DOKUMEN_PERMOHONAN }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Keterangan</label>
                        <div class="text-base">{{ $pp->KETERANGAN }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Tanggal</label>
                        <div class="text-base">{{ $pp->TANGGAL }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Diajukan Oleh :</label>
                        <div class="text-base">{{ $pp->user->NAMA_LENGKAP }}</div>
                        <button class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> 
                            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Detail User 
                        </button>
                    </div>
                    
                </div>
                <hr>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <h2 class="font-semibold text-lg mr-auto">Berkas</h2>
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <div class="text-base">KTP</div>
                </div>

                <div class="col-span-12 ">
                    <div class="w-full h-64 image-fit">
                        <img alt="File KTP" src="{{ asset('dist/images/preview-8.jpg')}}" data-action="zoom" class="w-full rounded-md"> 
                    </div>
                </div>

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

    var table = $('#example').DataTable( {
            responsive: true
        } )
        .columns.adjust()
        .responsive.recalc();

});
</script>
@endsection