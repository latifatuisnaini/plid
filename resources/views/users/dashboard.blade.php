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
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-12"></i> 
                            </div>
                           
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
                           
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4">
                            <span class="px-3 py-2 rounded-full bg-theme-9 text-white mr-1">Status : Diterima</span> 
                            </div>
                        </div>
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
