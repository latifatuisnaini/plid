 @extends('admin.layout')
@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    General Report
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
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $permohonan_open }}</div>
                            <div class="text-base text-gray-600 mt-1">Jumlah Permohonan</div>
                            <div class="mt-4"> 
                            <span class="px-3 py-2 rounded-full bg-theme-1 text-white mr-1">Status : Open</span>
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
                    Grafik Jumlah Permohonan Tahun 2021
                </h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <div class="flex">
                        <div>
                            <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold">{{ $jml_permohonan_this_month }}</div>
                            <div class="text-gray-600 dark:text-gray-600">This Month</div>
                        </div>
                        <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                        <div>
                            <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">{{ $jml_permohonan_last_month }}</div>
                            <div class="text-gray-600 dark:text-gray-600">Last Month</div>
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
                    <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                </div>
            </div>
        </div>
        <!-- END: Sales Report -->
       
        <!-- BEGIN: Weekly Best Sellers -->
        <div class="col-span-12 xl:col-span-4 mt-6">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Permohonan Dokumen Terbaru
                </h2>
            </div>
            <div class="mt-5">
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        <div class="ml-4 mr-auto">
                            <div class="text-gray-600 text-xs mb-2">2 December 2021</div>
                            <div class="font-medium">Russell Crowe</div>
                            <div class="font-medium">Dokumen A</div>
                            
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        <div class="ml-4 mr-auto">
                            <div class="text-gray-600 text-xs mb-2">2 December 2021</div>
                            <div class="font-medium">Russell Crowe</div>
                            <div class="font-medium">Dokumen A</div>
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        <div class="ml-4 mr-auto">
                            <div class="text-gray-600 text-xs mb-2">2 December 2021</div>
                            <div class="font-medium">Russell Crowe</div>
                            <div class="font-medium">Dokumen A</div>
                        </div>
                    </div>
                </div>
                <div class="intro-y">
                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                        <div class="ml-4 mr-auto">
                            <div class="text-gray-600 text-xs mb-2">2 December 2021</div>
                            <div class="font-medium">Russell Crowe</div>
                            <div class="font-medium">Dokumen A</div>
                        </div>
                    </div>
                </div>
                <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a> 
            </div>
        </div>
        <!-- END: Weekly Best Sellers -->
       
        </div>
    </div>
</div>
@endsection