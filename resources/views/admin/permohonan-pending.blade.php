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
      		 
    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nama Dokumen</th>
                    <th data-priority="2">Keterangan</th>
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
                    <button href="javascript:;" title="Detail Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                            <a data-toggle="modal" data-target="#detail_{{ $pp->ID_PERMOHONAN }}">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                </span>
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach($permohonan_pending as $pp)
        <div class="modal" id="detail_{{ $pp->ID_PERMOHONAN }}">
            <div class="modal__content modal__content--lg py-5 pl-3 pr-1 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Detail Permohonan #{{ $pp->ID_PERMOHONAN }}</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto" id="close_{{$pp->ID_PERMOHONAN}}"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
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
                            <label class="font-semibold text-lg">Diajukan Oleh</label>
                            <div class="text-base">{{ $pp->user->NAMA_LENGKAP }}</div>
                            <a href="{{ route('user.show',$pp->user->ID_USER) }}" target="_blank">
                                <button class="button w-32 mr-2 mb-2 mt-2 flex items-center justify-center bg-theme-1 text-white"> 
                                    <i data-feather="external-link" class="w-6 h-6 mr-2"></i> Detail User 
                                </button>
                            </a>
                        </div>
                       
        
                        <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#modal_{{ $pp->ID_PERMOHONAN }}"  class="button w-32 mr-2 mb-5 mt-3 flex items-center justify-center bg-theme-6 text-white" style="margin:auto;"><i data-feather="upload-cloud" class="w-6 h-6 mr-2" ></i> Upload </a> </div>
                        <div class="modal" id="modal-upload">

                        @foreach($permohonan_pending as $pp)
    <div class="modal__content" id="modal_{{ $pp->ID_PERMOHONAN }}">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">Upload Dokumen Pendukung</h2>
    </div>
        <form action="{{ url('/admin/permohonan-pending/upload_dok')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>KTP</label>
                    <input type="file" class="input w-full border mt-2 flex-1" accept="image/png, image/jpeg" name="KTP" id="input-ktp" required> 
                    <img class="mt-2" id="preview-ktp" height="80" src=""/>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1" data-dismiss="modal">Cancel</button> 
                <button type="submit" class="button w-20 bg-theme-1 text-white">Submit</button>
            </div>
        </form>
    </div>
    @endforeach
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