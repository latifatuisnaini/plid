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
        <div class="rounded-md px-5 py-4 mb-2 bg-theme-31 text-theme-6">
            <div class="flex items-center">
                <i data-feather="alert-triangle" class="mr-2"></i>
                <div class="font-medium text-lg">Anda belum mengupload dokumen pendukung</div>
            </div>
            <div class="mt-3">Untuk mengajukan permohonan dokumen, anda harus mengupload dokumen pendukung berupa NPWP dan KTP.</div>
            <button class="button w-32 mr-2 mb-2 mt-3 flex items-center justify-center bg-theme-6 text-white"> <i data-feather="upload-cloud" class="w-6 h-6 mr-2"></i> Upload </button>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-10"></i> 
                            </div>
                            
                            <div class="text-base text-gray-600 mt-1">Status User</div>
                            <div class="mt-4"> 
                            <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">Status : {{ $verified }} </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 xl:col-span-4 mt-6">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Status Permohonan
                                </h2>
                            </div>
                            <div class="mt-5">
                            @foreach($list_permohonan as $list)
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <i data-feather="file-text" class="report-box__icon text-theme-10"></i> 
                                        </div>
                                        <div class="ml-auto mr-auto">
                                            <div class="font-medium">{{ $list->DOKUMEN_PERMOHONAN }}</div>
                                            <div class="text-gray-600 text-xs">{{ $list->tgl_permohonan }}</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">{{ $list->STATUS }}</div>
                                    </div>
                                </div>
                                @endforeach                               
                                <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a> 
                            </div>
                        </div>
            </div>
        </div>
        
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('line-chart').getContext('2d');
options: {
    legend: {
        display: false
    }
  }
</script>
@endsection
