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

<div class="content">
<div class="intro-y box p-5 mt-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">                        
    <div class="flex flex-row">
        <i data-feather="list"></i>
        <h2 class="text-lg font-medium mr-auto ml-3">Permohonan </h2>
    </div>
    
</div>

<div class="intro-y box mt-5">
    <!--Container-->
    <!--Card-->
    <a href ="javascript:;" data-toggle="modal" data-target="#tambah_dokumen_permohonan" class="button w-32 mb-5 mr-6 mt-4 flex items-center justify-center bg-theme-1 text-white tombol-tambah-dokumen-permohonan" style="float:right;" ><i data-feather="plus-circle" class="w-6 h-6 mr-2"></i>Tambah</a>
    
    <div class="container w-full">
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

        <div class="p-6 mt-6 lg:mt-0 rounded shadow">
            <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID Permohonan</th>
                        <th data-priority="2">Dokumen Permohonan</th>
                        <th data-priority="3">Keterangan</th>
                        <th data-priority="4">Tanggal</th>
                        <th data-priority="5">Status Permohonan</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                @foreach($permohonan as $p)
                    <tr>
                        <td>{{$p->ID_PERMOHONAN}}</td>
                        <td>{{$p->DOKUMEN_PERMOHONAN}}</td>
                        <td>{{$p->KETERANGAN}}</td>
                        <td>{{$p->TANGGAL}}</td>
                        <td>
                            <div class="mt-1 mb-1"> 
                            @if ($p->status->ID_STATUS == 1)
                                <span class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-33 text-white">{{$p->status->STATUS}}
                                </span>
                            @elseif ($p->status->ID_STATUS == 2)
                                <span class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-12 text-white">{{$p->status->STATUS}}
                                </span>
                            @elseif ($p->status->ID_STATUS == 3)
                                <span class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-9 text-white">{{$p->status->STATUS}}
                                </span>
                            @elseif ($p->status->ID_STATUS == 4)
                                <span class="px-3 py-2 w-24 rounded-full mr-1 mb-2 bg-theme-6 text-white">{{$p->status->STATUS}}
                                </span>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
        <!--/Card-->

        <div class="modal" id="tambah_dokumen_permohonan">
            <div class="modal__content modal__content--lg py-5 pl-5 pr-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> <a data-dismiss="modal" href="javascript:;" class="absolute right-0 top-0 mt-3 mr-0"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                    <div class="flex items-center py-3 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="folder" class="w-8 h-8 mr-3"></i>Tambah Dokumen Permohonan</h2>
                    </div>
                </div>
                    <div class="modal-body">
                    <form action="{{ route('permohonan.store') }}" method="POST" class="needs-validation" novalidate id="tambah-dokumen-permohonan">
                    @csrf

                    <input type="hidden" name="ID_USER" value="{{ Auth::user()->ID_USER }}">
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                        <label class="w-full sm:w-20 sm:text-left sm:mr-5">Dokumen Permohonan</label> 
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Dokumen Permohonan" name="DOKUMEN_PERMOHONAN" required >
                    </div>
                    
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                        <label class="w-full sm:w-20 sm:text-left sm:mr-5">Keterangan</label> 
                            <textarea class="input w-full border mt-2 flex-1" name="KETERANGAN"> </textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center mt-3"> 
                    <label class="w-full sm:w-20 sm:text-left sm:mr-5">Tanggal</label> 
                        <div class="relative">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"><i data-feather="calendar" class="w-4 h-4"></i> 
                            </div> 
                            <input class="datepicker input pl-12 border" data-single-mode="true" name="TANGGAL" id ="TANGGAL" required>
                        </div>
                    </div>
                    
                    </div>

                <div class="modal-footer mt-5">
                    <div class="text-right">
                    <button type="button" class="button w-24 shadow-md mr-1 mb-2 bg-red-500 text-white" data-dismiss="modal">Cancel</button> 
                    <button class="button items-right w-24 shadow-md mr-1 mb-2 justify-right bg-theme-1 text-white shadow-md" type="submit">Simpan</button>
                    </form>
                    </div>
                </div>
                

                </div>
            </div>
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