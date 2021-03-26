<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/favicon.png')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>
            PPID PT. PAL Indonesia (Persero)
        </title>

        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
        <style>
            .badge {
                position: absolute;
                top: -10px;
                right: -10px;
                padding: 5px 10px;
                border-radius: 50%;
                background-color: greenyellow;
                color: white;
                }
        </style>
        @yield('css')



    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                <img alt="Logo PT. Pal" style="width:7rem;" src="{{ asset('dist/images/logo_pt_pal_putih.png')}}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{url('/admin')}}" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
               
                <li>
                    <a href="{{url('/admin/user')}}" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> User </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/admin/verif')}}" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title"> Verifikasi Dokumen User </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/admin/permohonan-open')}}" class="menu">
                        <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                        <div class="menu__title">Permohonan : Open</div>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Logo PT. Pal" style="width:7rem;" src="{{ asset('dist/images/logo_pt_pal_putih.png')}}">
                    <span class="hidden xl:block text-white text-lg ml-3">PPID</span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{url('/admin')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == '') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home mx-auto"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                        
                    </li>
                    <li>
                        <a href="{{url('/admin/user')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == 'user') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div class="side-menu__title"> User </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/verif')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == 'verif') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            </div>
                            <div class="side-menu__title"> Verifikasi Dokumen User </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/permohonan-open')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == 'permohonan-open') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                            </div>
                            <div class="side-menu__title"> Permohonan : Open </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/permohonan-pending')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == 'permohonan-pending') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg width="24" height="24" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                    <g fill="none" fill-rule="evenodd">
                                        <g transform="translate(1 1)" stroke-width="2.5">
                                            <circle stroke-opacity=".6" cx="18" cy="18" r="18"/>
                                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="side-menu__title"> Permohonan : Pending </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/permohonan-confirm')}}" class="side-menu @if(request() -> segment(1) == 'admin' && request()->segment(2) == 'permohonan-confirm') side-menu--active @endif">
                            <div class="side-menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                
                            </div>
                            <div class="side-menu__title"> Permohonan : Confirm </div>
                            <span class="badge" title="3 Permohonan ditolak">3</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Pusat Pelayanan Informasi dan Dokumentasi</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">
                        @if(request()->segment(2) != '')
                        {{ ucwords(request()->segment(2)) }}
                        @else
                        Dashboard
                        @endif
                        </a> 
                    </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Notifications -->
                    {{-- <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                        <div class="notification-content pt-2 dropdown-box">
                            <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                                <div class="notification-content__title">Notifications</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">John Travolta</a> 
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <div class="dropdown-box w-56">
                            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                    <div class="font-medium">{{ Auth::user()->NAMA_LENGKAP }}</div>
                                    <div class="text-xs text-theme-41 dark:text-gray-600">{{ Auth::user()->PEKERJAAN }}</div>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('user.show',Auth::user()->ID_USER) }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                </div>
                                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> 
                                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                
                @yield('content')
            </div>
            <!-- END: Content -->
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places></script>
        <script src="{{asset('dist/js/app.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!-- END: JS Assets-->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        @yield('script')
    </body>
</html>