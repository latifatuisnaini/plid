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
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-14 text-theme-10"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>{{@session::get('success') }}</div>
@elseif(Session::has('alert_error'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{@session::get('alert_error') }}</div>
@endif

<div class="intro-y box p-5 mt-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">                        
    <div class="flex flex-row">
        <i data-feather="list"></i>
        <h2 class="text-lg font-medium mr-auto ml-3">Permohonan </h2>
    </div>
</div>


<div class="intro-y box p-5 mt-5">
    <!--Container-->
    <div class="container w-full">

        <div class="text-right">
            <!--Card-->
            <a data-toggle="modal" data-target="#tambah_dokumen_permohonan" class="button w-32 mb-2 flex items-center justify-center bg-theme-1 text-white tombol-tambah-dokumen-permohonan" style="margin-left: 750px;"><i data-feather="plus-circle" class="w-6 h-6 mr-2"></i>Tambah</a>
        </div>

        <div class="p-6 mt-6 lg:mt-0 rounded shadow">
            <table id="example" class="stripe hover display" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID Permohonan</th>
                        <th data-priority="2">Dokumen Permohonan</th>
                        <th data-priority="3">Keterangan</th>
                        <th data-priority="4">Tanggal</th>
                        <th data-priority="5">Status Permohonan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($permohonan as $p)
                    <tr>
                        <td>{{$p->ID_PERMOHONAN}}</td>
                        <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                        <td>{{$p->KETERANGAN}}</td>
                        <td>{{$p->TANGGAL}}</td>
                        <td>{{$p->status->STATUS}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--/Card-->

        <div class="modal" id="tambah_dokumen_permohonan">
            <div class="modal__content modal__content--lg py-5 pl-5 pr-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-0"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="folder" class="w-8 h-8"></i>Tambah Dokumen Permohonan</h2>
                    </div>
                </div>
                    <div class="modal-body">
                    <form action="{{ route('permohonan.store') }}" method="POST" class="needs-validation" novalidate id="tambah-dokumen-permohonan">
                    @csrf
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                        <label class="w-full sm:w-20 sm:text-left sm:mr-5">Dokumen Permohonan</label> 
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Dokumen Permohonan"> 
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                        <label class="w-full sm:w-20 sm:text-left sm:mr-5">Keterangan</label> 
                            <textarea class="input w-full border mt-2 flex-1"> </textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                    <label class="w-full sm:w-20 sm:text-left sm:mr-5">Tanggal</label> 
                        <div class="relative">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"><i data-feather="calendar" class="w-4 h-4"></i> 
                            </div> 
                            <input type="text" class="datepicker input pl-12 border" data-single-mode="true">
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-right">
                    <button type="button" class="button w-24 shadow-md mr-1 mb-2 bg-gray-200 text-gray-600" data-dismiss="modal">Cancel</button> 
                    <button class="button items-right justify-right bg-theme-1 text-white shadow-md" type="submit">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
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
console.log('Sudah masuk');
</script>
@endsection