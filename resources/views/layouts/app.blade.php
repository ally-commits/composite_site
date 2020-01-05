<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Composite Website') }}</title>

    <!-- Scripts --> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-content-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">  

    @yield('css')
    </head>
<body>

    <nav class="header-navbar w-100 box-shadow-2">
        <div class="w-100 d-flex flex-wrap container mob-jes-center mob-res" style="justify-content: space-between; align-items: center">
            <a class="navbar-brand p-0 m-0 d-flex" href="#" style="align-items: center;"> 
                <h2 class="brand-text p-0 mt-1">COMP</h2>
                <img src="{{ asset('img/composite.png') }}" alt="" style="width: 50px; height: 50px;">
                <h2 class="brand-text p-0 mt-1">SITE</h2>
            </a>  
            <ul class="nav navbar-nav float-right d-flex" style="flex-direction: row;align-items: center;">
                @guest
                    <div class="mr-1">
                        <a class="btn link" href="{{ route('eventDetails') }}">Event Updates </a>
                    </div>
                    <div class="">
                        <a class="btn link" href="{{ route('login') }}">{{ __('Login') }} </a>
                    </div> 
                @else   
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-1">Hello,
                        <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                        </span>
                        <span class="avatar avatar-online">
                        <img src="{{ asset('img/'.Auth::user()->event_id .'.png')}}" alt="avatar"><i></i></span>
                    </button>
                    <div class="dropdown-menu arrow" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </ul> 
        </div>
    </nav> 
    <main class="py-1">
        @yield('content')
    </main>


    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/echarts/echarts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    @yield('js')
</body>
</html>
