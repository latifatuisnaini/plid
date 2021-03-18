 @extends('admin.layout')
@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    General Report {{ $current_year }}
                </h2>
                <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
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
                                <i data-feather="users" class="report-box__icon text-theme-11"></i> 
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $konfirmasi }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah User Menunggu Konfirmasi</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- END: General Report -->
        <!-- BEGIN: Sales Report -->
        <div class="col-span-12 lg:col-span-8 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Grafik Jumlah Permohonan Tahun {{ $current_year }}
                </h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <div class="flex mb-5">
                        <div>
                            <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold">{{ $jml_permohonan_this_month }}</div>
                            <div class="text-gray-600 dark:text-gray-600">Bulan Ini</div>
                        </div>
                        <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                        <div>
                            <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">{{ $jml_permohonan_last_month }}</div>
                            <div class="text-gray-600 dark:text-gray-600">Bulan Lalu</div>
                        </div>
                    </div>
                    <!--
                    <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                        <button class="dropdown-toggle button font-normal border dark:border-dark-5 text-white dark:text-gray-300 relative flex items-center text-gray-700"> Filter by Category <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2 overflow-y-auto h-32"> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">PC & Laptop</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Smartphone</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Electronic</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Photography</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Sport</a> </div>
                        </div>
                    </div>
                    -->
                </div>
                <div class="report-chart">
                <!--
                    <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                    -->
                    <canvas id="line-chart" height="160" class="mt-6"></canvas>
                </div>
            </div>
        </div>
        <!-- END: Sales Report -->
       
        <!-- BEGIN: Weekly Best Sellers -->
        @if(count($list_permohonan) > 0)
        <div class="col-span-12 xl:col-span-4 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Permohonan Dokumen Terbaru
                </h2>
            </div>
            cobjajasd
            
            <div class="mt-5">
            
                @foreach($list_permohonan as $list)
                    <div class="intro-y">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30S" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text mx-auto"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="text-gray-600 text-xs mb-2">{{ $list->tgl_permohonan }}</div>
                                <div class="font-medium">{{ $list->NAMA_LENGKAP }}</div>
                                <div class="font-medium">{{ $list->DOKUMEN_PERMOHONAN }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
              
           
                <a href="" class="intro-y w-full mt-4 block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a> 
            </div>
        </div>
        @endif
        <!-- END: Weekly Best Sellers -->
       
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('line-chart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct', 'Nov', 'Dec'],
    datasets: [{ 
        data: [
            <?php echo $januari ?>,
            <?php echo $februari ?>,
            <?php echo $maret ?>,
            <?php echo $april ?>,
            <?php echo $mei ?>,
            <?php echo $juni ?>,
            <?php echo $juli ?>,
            <?php echo $agustus ?>,
            <?php echo $september ?>,
            <?php echo $oktober ?>,
            <?php echo $november ?>,
            <?php echo $desember ?>
        ],
        borderColor: "#3e95cd",
        fill: false
      }]
  },
  options: {
    legend: {
        display: false
    }
  }
});

</script>
@endsection
