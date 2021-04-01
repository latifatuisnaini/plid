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
        <h2 class="text-lg font-medium mr-auto ml-3">Table Dokumen Publik</h2>
    </div>
</div>

<div class="intro-y box p-5 mt-5">

<!--Container-->
<div class="container w-full "> 
    <a href ="javascript:;" data-toggle="modal" data-target="#upload_dokumen" class="button mb-5 mr-6 mt-4 flex items-center justify-center bg-theme-1 text-white tombol-tambah-dokumen-permohonan" style="float:right;" ><i data-feather="plus-circle" class="w-6 h-6 mr-2"></i>Tambah Dokumen Publik</a>
    <!--Card-->
    <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    
        <table id="example" class="stripe hover display cell-border" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">ID Dokumen</th>
                    <th data-priority="3">Jenis Kategori Dokumen</th>
                    <th data-priority="2">Nama Kategori Dokumen</th>
                    <th data-priority="4">Jenis Dokumen</th>
                    <th data-priority="5">Nama Dokumen</th>
                    <th data-priority="5">Nomor Urut</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dokumens as $u)
                <tr>
                    <td>{{$u->ID_DOKUMEN}}</td>
                    <td>{{$u->kategori_dokumen->jenis_kategori_dokumen->JENIS_KATEGORI}}</td>
                    <td>{{$u->kategori_dokumen->KATEGORI}}</td>
                    <td>{{$u->jenis_dokumen->JENIS_DOKUMEN}}</td>
                    <td>{{$u->NAMA_DOKUMEN}}</td>
                    <td>{{$u->NOMOR_URUT}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="modal" id="upload_dokumen">
            <div class="modal__content modal__content--lg p-5 ml-auto">
                <div class="modal-header">
                    <div class="modal__content relative"> 
                    </div>
                    <div class="flex px-2 sm:pb-3 sm:pt-1 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-bold text-2xl flex"><i data-feather="info" class="w-8 h-8 mr-2"></i>Upload Dokumen Publik</h2>
                        <a data-dismiss="modal" href="javascript:;" class="mr-3 ml-auto"><i data-feather="x" class="w-8 h-8 text-gray-500"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                        <div class="col-span-12"> 
                            <label class="font-semibold text-lg">Jenis Kategori Dokumen</label>
                            <select class="input border mr-2 w-full mt-2" name="ID_JENIS_KATEGORI" id="jenis_kategori">
                                <option selected disabled>Pilih jenis kategori.....</option>
                                @foreach($jenis_kategoris as $j)
                                    <option value="{{ $j->ID_JENIS_KATEGORI }}">{{ $j->JENIS_KATEGORI }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-12"> 
                            <label class="font-semibold text-lg">Kategori Dokumen</label>
                            <select class="input border mr-2 w-full mt-2" name="ID_KATEGORI" id="kategori">
                                <option selected disabled>Pilih kategori.....</option>
                                @foreach($kategori_dokumen as $j)
                                    <option value="{{ $j->ID_KATEGORI }}">{{ $j->KATEGORI }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Nama Dokumen</label>
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Nama Dokumen" name="NAMA_DOKUMEN" id="NAMA_DOKUMEN" required>
                        </div>

                        <div class="col-span-12 sm:col-span-6"> 
                            <label class="font-semibold text-lg">Nomor Urut</label>
                            <input type="text" class="input w-full border mt-2 flex-1" placeholder="Nomor Urut" name="NOMOR_URUT" id="NOMOR_URUT" required>
                        </div>

                        <div class="col-span-12"> 
                            <label class="font-semibold text-lg">File</label>
                            <input type="file" class="input w-full border mt-2 flex-1" placeholder="File Dokumen" name="FILE" id="FILE" required >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
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

    $("#jenis_kategori").on('change',function(){
        var id = $(this).val();
        $.get("getKategori/"+id,
            function(data){
                $('#kategori').empty();

                $.each(data, function (id, name) {
                    $('#kategori').append(new Option(name.KATEGORI, id.ID_KATEGORI));
                });
            }
        );
    });

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
                }
            );
        });
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
            }
        );
    });
});
</script>
@endsection