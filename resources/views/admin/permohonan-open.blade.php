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
        <h2 class="text-lg font-medium mr-auto ml-3">Table Permohonan User yang Belum Dikonfirmasi</h2>
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
            <a target="_blank" href="{{url('/admin/cetak-permohonan-open')}}">
                <button class="ml-3 button box flex items-center shadow-md bg-gray-200 text-gray-700 buttons-html5 buttons-pdf" id="print"> <i data-feather="printer" class="hidden sm:block w-4 h-4 mr-2"></i> Print Tabel Permohonan  </button>
            </a>
        </div>
    </div>  
    <br>

    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1" width="10%">ID Permohonan</th>
                    <th data-priority="2">Nama Dokumen</th>
                    <th data-priority="3" width="40%">Keterangan</th>
                    <th data-priority="4">Tanggal Permohonan</th>
                    <th data-priority="5">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($permohonans as $u)
                <tr>
                    <td>{{$u->ID_PERMOHONAN}}</td>
                    <td>{{$u->DOKUMEN_PERMOHONAN}}</td>
                    <td>{{$u->KETERANGAN}}</td>
                    <td>{{ date('d F Y',strtotime($u->TANGGAL)) }}</td>
                    <td>
                    <div class="flex" style="justify-content: center;">
                        <a data-toggle="modal" data-target="#detail_{{ $u->ID_PERMOHONAN }}">
                            <button href="javascript:;" title="Detail Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-green-300 dark:text-gray-300">
                                <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="more-horizontal" class="w-4 h-4 "></i>
                                </span>
                            </button>
                        </a>
                        <a target="_blank" href="{{url('/admin/cetakpermohonan/'.$u->ID_PERMOHONAN)}}">
                                <button href="javascript:;" title="Print Permohonan" type="button" class="tooltip button px-2 mr-1 mb-2 bg-blue-300 dark:text-gray-300">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="printer" class="w-4 h-4 "></i>
                                    </span>
                                </button>
                            </a>
                    </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach($permohonans as $u)
        <div class="modal" id="detail_{{ $u->ID_PERMOHONAN }}">
            <div class="modal__content modal__content--lg py-5 pl-3 pr-1 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Detail Permohonan #{{ $u->ID_PERMOHONAN }}</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto" id="close_{{$u->ID_PERMOHONAN}}"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Nama Dokumen</label>
                            <div class="text-base">{{ $u->DOKUMEN_PERMOHONAN }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Keterangan</label>
                            <div class="text-base">{{ $u->KETERANGAN }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Tanggal</label>
                            <div class="text-base">{{ date('d F Y',strtotime($u->TANGGAL)) }}</div>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Diajukan Oleh</label>
                            <div class="text-base">{{ $u->user->NAMA_LENGKAP }}</div>
                            <a href="{{ route('user.show',$u->user->ID_USER) }}" target="_blank">
                                <button class="button w-32 mr-2 mb-2 mt-2 flex items-center justify-center bg-theme-1 text-white"> 
                                    <i data-feather="external-link" class="w-6 h-6 mr-2"></i> Detail User 
                                </button>
                            </a>
                        </div>
                        <hr class="col-span-12">

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg pb-12">Estimasi</label>
                            <div class="relative mx-auto mt-2 mb-5"> 
                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"> 
                                    <i data-feather="calendar" class="w-4 h-4"></i> 
                                </div> 
                                <input type="text" class="datepicker input pl-12 border" data-single-mode="true" name="estimasi" id="estimasi_{{$u->ID_PERMOHONAN}}"> 
                            </div>
                            <label class="font-semibold text-lg mt-3">Keterangan Estimasi (Opsional)</label>
                            <textarea class="input w-full border mt-2"  id="keterangan_estimasi_{{$u->ID_PERMOHONAN}}"></textarea> 
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Keterangan Terima/Tolak (Opsional)</label>
                            <textarea class="input w-full border mt-2" id="keterangan_{{$u->ID_PERMOHONAN}}"></textarea>
                        </div>

                        <div class="col-span-12 sm:col-span-6" style="justify-self: end;">
                            <button class="button button--lg w-32 mr-2 mb-2 mt-2 flex items-center justify-center bg-theme-6 text-white btn-tolak" id="tolak_{{$u->ID_PERMOHONAN}}" type="button"> 
                                <i data-feather="x" class="w-8 h-8 mr-2"></i> Tolak
                            </button>
                        </div>
        
                        <div class="col-span-12 sm:col-span-6">
                            {{-- <a data-toggle="modal" data-target="#upload_{{ $u->ID_PERMOHONAN }}"> --}}
                                <button class="button button--lg w-32 mr-2 mb-2 mt-2 flex items-center justify-center bg-theme-9 text-white btn-terima" id="terima_{{$u->ID_PERMOHONAN}}" type="button"> 
                                    <i data-feather="check" class="w-8 h-8 mr-2"></i> Terima
                                </button>
                            {{-- </a> --}}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
            responsive: true,
            "order": [[ 0, 'desc' ]],
        } )
        .columns.adjust()
        .responsive.recalc();

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
                });
                location.reload();
            }
        );
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
                location.reload();
            }
        );
    });
});
</script>
@endsection