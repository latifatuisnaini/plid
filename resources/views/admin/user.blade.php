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
        <h2 class="text-lg font-medium mr-auto ml-3">Table User</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full ">
      		 
    @if( session('message') )
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="check-circle" class="w-6 h-6 mr-2"></i> Akun User telah berhasil diaktifkan </div> <br>
    @endif

    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nomor Identitas</th>
                    <th data-priority="2">Nama Lengkap</th>
                    <th data-priority="3">No. Telp</th>
                    <th data-priority="4">Pekerjaan</th>
                    <th data-priority="5">Status Konfirmasi</th>
                    <th data-priority="6">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$u->NOMOR_IDENTITAS}}</td>
                    <td>{{$u->NAMA_LENGKAP}}</td>
                    <td>{{$u->NO_TLP}}</td>
                    <td>{{$u->PEKERJAAN}}</td>
                    <td>
                        @if( $u->STATUS_KONFIRMASI == 1 ) 
                            <div class="text-center">
                                <div class="flex items-center justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Aktif </div>
                            </div>
                        @elseif ( $u->STATUS_KONFIRMASI == 0 )
                            <div class="text-center">  
                                <div class="flex items-center justify-center text-theme-6"> <i data-feather="x-square" class="w-4 h-4 mr-2"></i> Belum Aktif </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.update', $u->ID_USER) }}" method="post">
                            @method('PUT')
                            @csrf
                            @if( $u->STATUS_KONFIRMASI == 0 ) 
                                <button href="javascript:;" title="Konfirmasi Status User" type="submit" class="tooltip button px-2 mr-1 mb-2 bg-blue-300 dark:text-gray-300"><span class="w-5 h-5 flex items-center justify-center"> <i data-feather="user-check" class="w-4 h-4 "></i></span> </button>

                                <a data-toggle="modal" data-target="#detail_{{ $u->ID_USER }}">
                                    <button href="javascript:;" title="Detail User" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                        <span class="w-5 h-5 flex items-center justify-center"> 
                                            <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                        </span>
                                    </button>
                                </a>  

                            @elseif( $u->STATUS_KONFIRMASI == 1 )
                                <a data-toggle="modal" data-target="#detail_{{ $u->ID_USER }}">
                                    <button href="javascript:;" title="Detail User" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                        <span class="w-5 h-5 flex items-center justify-center"> 
                                            <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                        </span>
                                    </button>
                                </a>  
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach($users as $u)
        <div class="modal" id="detail_{{ $u->ID_USER }}">
            <div class="modal__content modal__content--lg py-5 pl-3 pr-1 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative">
                    </div>

                        <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-3"></i>DETAIL USER ID {{ $u->ID_USER }}</h2>
                            <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto" id="close_{{$u->ID_USER}}"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                        </div>

                </div>
            <div class="modal-body">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Nomor Identitas</label>
                        <div class="text-base">{{ $u->NOMOR_IDENTITAS }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">NPWP</label>
                        <div class="text-base">{{ $u->NPWP }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Nama Lengkap</label>
                        <div class="text-base">{{ $u->NAMA_LENGKAP }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Email</label>
                        <div class="text-base">{{ $u->email }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label class="font-semibold text-lg">Pekerjaan</label>
                        <div class="text-base">{{ $u->PEKERJAAN }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6"> 
                        <label class="font-semibold text-lg">Alamat</label>
                        <div class="text-base">{{ $u->ALAMAT }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label class="font-semibold text-lg">No.Telp</label>
                        <div class="text-base">{{ $u->NO_TLP }}</div>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label class="font-semibold text-lg">No.Fax</label>
                        <div class="text-base">{{ $u->NO_FAX }}</div>
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