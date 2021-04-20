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
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
        @yield('css')

    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" src="{{ asset('dist/images/logo_pt_pal_putih.png')}}" style="width:7rem;">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{url('/beranda')}}" class="menu menu--active">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> BERANDA </div>
                    </a>
                </li>
              
                <li>
                    <a href="{{url('/profil')}}" class="menu menu--active">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> PROFIL </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/regulasi')}}" class="menu menu--active">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> REGULASI </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/maklumat')}}" class="menu menu--active">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> MAKLUMAT </div>
                    </a>
                </li>
              

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> INFORMASI PUBLIK <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{url('/info_layanan_publik_1')}}" class="menu">
                                <div class="menu__icon">  </div>
                                <div class="menu__title"> Informasi yang wajib disediakan dan diumumkan secara berkala </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/info_layanan_publik_2')}}" class="menu">
                                <div class="menu__icon">  </div>
                                <div class="menu__title"> Informasi yang wajib diumumkan secara serta - merta </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/info_layanan_publik_3')}}" class="menu">
                                <div class="menu__icon">  </div>
                                <div class="menu__title">  Informasi yang wajib sedia setiap saat</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> LAYANAN PUBLIK <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{url('/lp_prosedurp')}}" class="menu">
                                <div class="menu__icon">  </div>
                                <div class="menu__title"> Prosedur Permohonan </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/lp_registrasip')}}" class="menu">
                                <div class="menu__icon">  </div>
                                <div class="menu__title"> Registrasi Permohonan </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/faq')}}" class="menu">
                        <div class="menu__icon">  </div>
                        <div class="menu__title"> FAQ </div>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-5">
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img src="dist/images/logo_pt_pal_putih.png" style="width:8rem;">
                    <span class="text-white text-lg ml-3"><span class="font-medium" style="font-size: 20px;">PUSAT PELAYANAN INFORMASI DAN DOKUMENTASI</span> </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
             
                <!-- END: Breadcrumb -->
                
                
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav">
            <ul>
            <li>
                    <a href="{{url('/beranda')}}" class="top-menu @if(request() -> segment(1) == 'beranda') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> BERANDA </div>
                    </a>
                </li>
              
                <li>
                    <a href="{{url('/profil')}}" class="top-menu @if(request() -> segment(1) == 'profil') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> PROFIL </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/regulasi')}}" class="top-menu @if(request()->segment(1) == 'regulasi') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> REGULASI </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('/maklumat')}}" class="top-menu @if(request() -> segment(1) == 'maklumat') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> MAKLUMAT </div>
                    </a>
                </li>
              

                <li>
                    <a href="javascript:;" class="top-menu @if(request() -> segment(1) == 'info_layanan_publik_1'  || request() -> segment(1) == 'info_layanan_publik_2' || request() -> segment(1) == 'info_layanan_publik_3') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> INFORMASI PUBLIK <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                    <br>
                        <li>
                            <a href="{{url('/info_layanan_publik_1')}}" class="top-menu">
                               
                                <div class="top-menu__title"> Informasi yang wajib <br>disediakan dan diumumkan <br>secara berkala  </div>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="{{url('/info_layanan_publik_2')}}" class="top-menu">
                               
                                <div class="top-menu__title"> Informasi yang wajib <br>diumumkan secara <br>serta - merta </div>
                            </a>
                        </li>
                        <br>
                        <li>
                            <a href="{{url('/info_layanan_publik_3')}}" class="top-menu">
                               
                                <div class="top-menu__title">  Informasi yang wajib sedia <br>setiap saat</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                <li>
                    <a href="javascript:;" class="top-menu @if(request() -> segment(1) == 'lp_prosedurp'  || request() -> segment(1) == 'lp_registrasip') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> LAYANAN PUBLIK <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{url('/lp_prosedurp')}}" class="top-menu">
                                <div class="top-menu__icon">  </div>
                                <div class="top-menu__title"> Prosedur Permohonan </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/lp_registrasip')}}" class="top-menu">
                                <div class="top-menu__icon">  </div>
                                <div class="top-menu__title"> Registrasi Permohonan </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/faq')}}" class="top-menu @if(request() -> segment(1) == 'faq') top-menu--active @endif">
                        <div class="top-menu__icon">  </div>
                        <div class="top-menu__title"> FAQ </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <!--BEGIN: LOGIN -->
        <!-- BEGIN: Content -->
        
        
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Content -->
                    <div class="col-span-12 xl:col-span-8">
                        <div class="intro-y box p-5 mt-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">
                            @yield('namehalaman')
                        </div>
                        
                        <div class="intro-y box p-5 mt-5 sm:mt-5">
                            @yield('content')
                        </div>
                        @yield('cardlp')
                    </div>
                    <!-- END: Official Store -->
                    <!-- BEGIN: Weekly Best Sellers -->
                    <div class="col-span-12 xl:col-span-4">
                        <div class="intro-y box p-5 mt-5 sm:mt-5 bg-blue-400 text-white" style="background-color: #1c3faa;">
                            <h2 class="text-lg font-medium mr-auto">
                                Login Permohonan Informasi
                                </h2>
                        </div>                       
                         <!-- <div class="text-center">
     <div class="dropdown inline-block" data-placement="bottom-start"> <button class="dropdown-toggle button flex items-center inline-block bg-theme-1 text-white"> Filter Dropdown <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
         <div class="dropdown-box">
             <div class="dropdown-box__content box p-5"> -->
                        <div class="mt-5">
                            <div class="intro-y">
                                <div class="box py-4 mb-3 flex items-center zoom-in">
                                   <!-- BEGIN: Login Form -->
                    <div class="h-screen xl:h-auto flex xl:py-0 my-5 xl:my-0 px-5">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('email')
                            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> Email dan Password Salah </div>
                    @enderror
                    @if(session()->has('errorEmail'))
                            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{@session('errorEmail') }}</div>
                    @endif
                    <div class="my-auto mx-auto xl:mx-5 bg-white xl:bg-transparent sm:py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <div class="intro-x mt-5">
                            Email
                            <input type="email" name="email" class="intro-x login__input input input--lg border border-gray-500 block mt-4" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 100%" placeholder="Email">
                            
                        <br>
                            Password
                            <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-500 block mt-4" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="width: 100%" placeholder="Password" >
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top">Login</button>
                            <a href="{{ url('/lp_registrasip') }}"> <button type="button" class="button button--lg xl:w-32 mr-1 mb-2 bg-theme-9 text-white">Daftar</button></a>
                        </div>
                        <div class="intro-x my-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1 dark:text-theme-10" href="">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10" href="">Privacy Policy</a> 
                        </div>
                    </div>
                    </form>
                </div>
                <!-- END: Login Form -->
                                    
                    <!-- END: Weekly Best Sellers -->
       
   
                
                </div>
            </div>
        </div>      
        <!-- BEGIN: JS Assets-->
        <!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> -->
        <script src="{{ asset('dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
        @yield('script')
    </body>
</html>