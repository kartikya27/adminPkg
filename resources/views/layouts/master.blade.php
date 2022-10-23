<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/icofont.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        @yield('header-scripts')
        <style>
           body{letter-spacing: 1px;}.round-btn{background-color: #131b13;padding-right: 20px;padding-left: 20px!important;margin: 0 0 0 10px;border-radius: 30px;color: #fff !important;}.round-btn a:hover{color:#fff !important}
           @media only screen and (max-width: 575px){.header-donate-btn1 {display: none !important;}}
        @yield('page-css')
        </style>
    </head>

    <body class="">
        <div class="wrapper">
            <header class="header-wrapper">

                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid header-container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <ul class="header-top-info-list">
                                    <li>
                                        <span class="icon"><i class="icofont-ui-call"></i></span>
                                        <a href="tel://{!! $announcement->phone !!}" class="text">+91 {!! $announcement->phone !!}</a>
                                    </li>
                                    <li>
                                        <span class="icon"><i class="icofont-envelope-open"></i></span>
                                        <a href="mailto://support@shankaraayan.com"
                                            class="text">{!! $announcement->email !!}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <ul class="header-top-info-list">
                                    <li>
                                        <span class="icon"><a target="_blank" href="{!! $announcement->facebook !!}"><i class="icofont-facebook"></i></a></span>
                                        <span class="icon"><a target="_blank" href="{!! $announcement->twitter !!}"><i class="icofont-twitter"></i></a> </span>
                                        <span class="icon"><a target="_blank" href="{!! $announcement->instagram !!}"><i class="icofont-instagram"></i></a> </span>
                                        <span class="icon"><a target="_blank" href="{!! $announcement->youtube !!}"><i class="icofont-youtube"></i></a> </span>
                                        <span class="icon"><a target="_blank" href="{!! $announcement->linkedin !!}"><i class="icofont-linkedin"></i></a> </span>
                                        <span class="text round-btn"><a href="/register">Become Volunteer</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End: Header Top ==-->

                <!--== Start: Header Top ==-->
                <div class="header-bottom sticky-header">
                    <div class="container-fluid header-container-fluid">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <a href="/">
                                        <img class="logo-main" src="{{ asset('/images/logo/shankaraayan.png') }}"
                                            width="220" height="58" alt="Logo" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <div class="header-navigation">
                                    <ul class="main-nav justify-content-center">
                                        <li><a href="/">Home</a></li>
                                        <!-- <li><a href="about-us.html">About</a></li> -->
                                        <li class="has-submenu"><a href="">What we do</a>
                                            <ul class="submenu-nav">
                                                @foreach($menu as $menu)
                                                <li class="has-submenu"><a href="#/">{{$menu->main_menu}}</a>
                                                    <ul class="submenu-nav">
                                                    @php
                                                        $subMenu = Kartikey\AdminCrm\Models\Products::where('program_category',$menu->menu_slug)->get();@endphp
                                                        @foreach ($subMenu as $subMenus)
                                                        <li><a href="/what-we-do/{{$menu->menu_slug}}/{{$subMenus->program_url}}">{{ ucwords($subMenus->programName )}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                                <li><a href="{{route('volunteer')}}">Volunteer</a></li>
                                                <li><a href="/what-we-do/Wellbeing">Wellbeing Facts</a></li>
                                                <li><a href="{{route('success-stories')}}">Success Stories</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li class="has-submenu"><a href="">Activity & Events</a>
                                            <ul class="submenu-nav">
                                                <li><a href="/events">Events</a></li>
                                                <li><a href="/activity">Activity</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/gallery">Gallery</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center gap-6 gap-lg-0">
                                <a class="btn btn-primary header-donate-btn" href="/donate" style="padding: 8px 24px !important;">Donate Now</a>
                                
                                @php if(!empty(Auth::user()->email)){ @endphp
                                    
                                    <div class="d-flex header-donate-btn1" style="padding: 0 !important;">
                                <ul>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="/Images/icons/accc1.png" alt="" width=""> {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="/dashboard">Profile</a></li>
                                           
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                                    
                                @php }else{ @endphp
                                <a class="header-donate-btn" href="/login" style="padding: 8px 24px !important;margin-left:1px"><img src="/Images/icons/accc.png" alt="" width=""> Login</a>
                                @php } @endphp
                                <button class="btn-menu d-flex d-lg-none" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--== End: Header Top ==-->
            </header>

            @yield('content')

            @yield('footer')

        </div>


        @yield('scripts')
        
        <script src="{{ asset('js/vendor/modernizr-3.11.7.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/svg-inject.min.js') }}"></script>
        <script src="{{ asset('js/plugins/fancybox.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>

</html>