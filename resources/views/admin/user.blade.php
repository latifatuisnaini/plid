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
        <h2 class="text-lg font-medium mr-auto ml-3"> Table User</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full ">
      		 
    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nomor Identitas</th>
                    <th data-priority="2">Nama Lengkap</th>
                    <th data-priority="3">No. Telp</th>
                    <th data-priority="4">Pekerjaan</th>
                    <th data-priority="5">Status Konfirmasi</th>
                    <th data-priority="6">Tools</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$u->NOMOR_IDENTITAS}}</td>
                    <td>{{$u->NAMA_LENGKAP}}</td>
                    <td>{{$u->NO_TLP}}</td>
                    <td>{{$u->PEKERJAAN}}</td>
                    <td>{{$u->STATUS_KONFIRMASI}}</td>
                    <td>
                        <a href="{{url('/admin/user')}}">
                            <button class="button w-32 mr-2 mb-2 flex items-center justify-center bg-blue-300 dark:text-gray-300"> <i data-feather="paperclip" class="w-4 h-4 mr-2"></i>Konfirmasi </button>
                        </a>
                        <a href="{{url('/admin/detail')}}">
                            <button class="button w-32 mr-2 mb-2 flex items-center justify-center bg-green-300 dark:text-gray-300"> <i data-feather="more-horizontal" class="w-4 h-4 mr-5"></i>Detail </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach($users as $u)
         <div class="modal" id="detail_{{ $u->ID_USER }}">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
             <h2 class="font-medium text-base mr-auto">Detail User</h2>
         </div>
         <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-6"> 
                <label>Nama Lengkap</label>
                <div class="text">{{ $u->NAMA_LENGKAP }}</div>
            </div>
             <div class="col-span-12 sm:col-span-6"> <label>To</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Subject</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Important Meeting"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Has the Words</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Doesn't Have</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Job, Work, Documentation"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Size</label> <select class="input w-full border mt-2 flex-1">
                     <option>10</option>
                     <option>25</option>
                     <option>35</option>
                     <option>50</option>
                 </select> </div>
         </div>
         <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button> <button type="button" class="button w-20 bg-theme-1 text-white">Send</button> </div>
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