@extends('users.layout')
@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    User Dashboard
                </h2>
                <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
            </div>
            <div class="grid grid-cols-12 col-span-12">
                <div class="col-span-6 mr-2">
                    @if(Auth::user()->STATUS_KONFIRMASI == 1)
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                        <div class="flex items-center">
                            <i data-feather="alert-triangle" class="mr-2"></i>
                            <div class="font-medium text-lg">Anda belum mengupload dokumen pendukung</div>
                        </div>
                        <div class="mt-3">Untuk mengajukan permohonan dokumen, anda harus mengupload dokumen pendukung berupa KTP.</div>
                        <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#modal-upload" class="button w-32 mr-2 mb-2 mt-3 flex items-center justify-center bg-theme-6 text-white"><i data-feather="upload-cloud" class="w-6 h-6 mr-2"></i> Upload </a> </div>
                    </div>
                    @elseif(Auth::user()->STATUS_KONFIRMASI == 2)
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-17 text-theme-11">
                        <div class="flex items-center">
                            <i data-feather="alert-triangle" class="mr-2"></i>
                            <div class="font-medium text-lg">Berkas Anda sedang dalam proses verifikasi.</div>
                        </div>
                        <div class="mt-3">Dokumen pendukung anda sedang dalam proses verifikasi oleh Admin. Mohon tunggu max. 24 jam</div>
                    </div>
                    @elseif(Auth::user()->STATUS_KONFIRMASI == 4)
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                        <div class="flex items-center">
                            <i data-feather="alert-triangle" class="mr-2"></i>
                            <div class="font-medium text-lg">Berkas Anda ditolak. Mohon upload ulang.</div>
                        </div>
                        <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#modal-upload" class="button w-32 mr-2 mb-2 mt-3 flex items-center justify-center bg-theme-6 text-white"><i data-feather="upload-cloud" class="w-6 h-6 mr-2"></i> Upload </a> </div>
                    </div>
                    @endif
                </div>
                @if(Auth::user()->STATUS_KONFIRMASI == 3)
                <div class="col-span-12">
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-18 text-theme-9">
                        <div class="flex items-center">
                            <i data-feather="check-circle" class="mr-2"></i>
                            <div class="font-medium text-lg">Akun Anda sudah terverifikasi.</div>
                        </div>
                        <div class="mt-3">Anda dapat mengajukan permohonan dokumen</div>
                    </div>
                </div>
                @else
                <div class="col-span-6 ml-2">
                    <div class="rounded-md px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                        <div class="flex items-center">
                            <i data-feather="alert-triangle" class="mr-2"></i>
                            <div class="font-medium text-lg">Akun Anda belum diverifikasi.</div>
                        </div>
                        <div class="mt-3">Mohon maaf, Anda belum dapat mengajukan permohonan dokumen.</div>
                    </div>
                </div>
                @endif
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-33"></i> 
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $permohonan_open }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4">
                            <span class="px-3 py-2 rounded-full bg-theme-33 text-white mr-1">Status : Open</span> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                    <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-12"></i> 
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $permohonan_diproses }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4">
                            <span class="px-3 py-2 rounded-full bg-theme-12 text-white mr-1">Status : Sedang di Proses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                    <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-9"></i> 
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $permohonan_diterima }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4">
                            <span class="px-3 py-2 rounded-full bg-theme-9 text-white mr-1">Status : Diterima</span> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                    <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-6"></i> 
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $permohonan_ditolak }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4">
                            <span class="px-3 py-2 rounded-full bg-theme-6 text-white mr-1">Status : Ditolak</span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                @if(count($list_permohonan) > 0)
                <div class="col-span-12 xl:col-span-4">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Status Permohonan
                        </h2>
                    </div>
                    <div class="mt-5">
                        
                        @foreach($list_permohonan as $list)
                        <div class="intro-y">
                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <div class="mr-auto">
                                    <div class="font-medium">{{ $list->DOKUMEN_PERMOHONAN }}</div>
                                    <div class="text-gray-600 text-xs">{{ $list->tgl_permohonan }}</div>
                                </div>
                            @if($list->STATUS == 'Open')
                                <div class="py-1 px-2 rounded-full text-xs bg-theme-33 text-white cursor-pointer font-medium">{{ $list->STATUS }}</div>
                                @elseif($list->STATUS == 'Sedang diproses')
                                 <div class="py-1 px-2 rounded-full text-xs bg-theme-12 text-white cursor-pointer font-medium">{{ $list->STATUS }}</div>
                                    @elseif($list->STATUS == 'Diterima')
                                     <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">{{ $list->STATUS }}</div>
                                     @elseif($list->STATUS == 'Ditolak')
                                        <div class="py-1 px-2 rounded-full text-xs bg-theme-6 text-white cursor-pointer font-medium">{{ $list->STATUS }}</div>
                            @endif
                            </div>
                        </div>
                        @endforeach                               
                        <a href="/users/permohonan" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a>
                        
                    </div>
                </div>
                @endif
            </div>
    </div>
</div>

@if(Auth::user()->STATUS_KONFIRMASI == 1 || Auth::user()->STATUS_KONFIRMASI == 4)
<div class="modal" id="modal-upload">
    <div class="modal__content">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">Upload Dokumen Pendukung</h2>
    </div>
    <form action="{{ url('users/upload_dok')}}" method="POST" enctype="multipart/form-data">
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
</div>
@endif
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
function readURLKTP(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview-ktp').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#input-ktp").change(function() {
    readURLKTP(this);
});

</script>
@endsection
