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
        <i data-feather="info"></i>
        <h2 class="text-lg font-medium mr-auto ml-3">Detail User #{{$user->ID_USER}}</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full ">
    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Nomor Identitas</label>
            <div class="text-base">{{ $user->NOMOR_IDENTITAS }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">NPWP</label>
            <div class="text-base">{{ $user->NPWP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Nama Lengkap</label>
            <div class="text-base">{{ $user->NAMA_LENGKAP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Email</label>
            <div class="text-base">{{ $user->email }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">Pekerjaan</label>
            <div class="text-base">{{ $user->PEKERJAAN }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6"> 
            <label class="font-semibold text-lg">Alamat</label>
            <div class="text-base">{{ $user->ALAMAT }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">No.Telp</label>
            <div class="text-base">{{ $user->NO_TLP }}</div>
        </div>

        <div class="col-span-12 sm:col-span-6">
            <label class="font-semibold text-lg">No.Fax</label>
            <div class="text-base">{{ $user->NO_FAX }}</div>
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
            @if($user->FILE_KTP)
            <img alt="File KTP" src="{{ asset($user->FILE_KTP)}}" data-action="zoom" class="w-full rounded-md">
            @else
            <img alt="File KTP" src="{{ asset('dist/images/preview-8.jpg')}}" data-action="zoom" class="w-full rounded-md">
            @endif
        </div>
    </div>
</div>
<!--/container-->
</div>
@endsection