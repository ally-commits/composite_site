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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/dragula.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-content-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/switch.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}"> 

    @yield('css')
</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
 
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center headroom headroom--top headroom--not-bottom" data-nav="brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                    <a class="navbar-brand" href="#"> 
                        <h3 class="brand-text">Admin Dashboard</h3>
                    </a>
                    </li>
                    <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>

            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                <span class="mr-1">Hello,
                                    <span class="user-name text-bold-700">Admin</span>
                                </span>
                                <span class="avatar avatar-online">
                                <img src="{{ asset('img/composite.png') }}" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100 ps-container ps-theme-dark" data-ps-id="b8a8a288-b7e0-14c3-4012-7a9a4d8364b4">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <small>
                                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                            </small>
                                            </div>
                                        </div>
                                    </a>  
                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                                    
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-mail">             </i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Messages</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                                </li>
                                
                                <li class="scrollable-container media-list w-100 ps-container ps-theme-dark" data-ps-id="4bc42b4c-2eb6-a75f-ec69-0d2b8bdfcca4">
                                    <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                        <span class="avatar avatar-sm avatar-online rounded-circle">
                                            <img src="../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                        <h6 class="media-heading">Margaret Govan</h6>
                                        <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>
                                        <small>
                                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                        </small>
                                        </div>
                                    </div>
                                    </a> 
                                </li>     
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="app-content content">
        <div class="content-wrapper p-1"> 
            <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                <div class="main-menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="nav-item">
                            <a href="{{route('admin.home') }}"><i class="la la-home"></i><span class="menu-title">Home</span></a>
                        </li>
                        
                        <li class="nav-item"><a href="{{route('admin.notification') }}"><i class="la la-bell"></i><span class="menu-title">Push Notification</span></a></li>

                        <li class="nav-item"><a href="{{ route('admin.addEventHeads') }}"><i class="la la-user"></i><span class="menu-title">Add Event Heads</span></a></li>

                        <li class="nav-item"><a href="{{ route('admin.viewEventHeads')}}"><i class="ft ft-calendar"></i><span class="menu-title">View Event Heads Login</span></a></li>

                        <li class="nav-item"><a href="{{ route('admin.collegeDetails')}}"><i class="ft ft-airplay"></i><span class="menu-title">College Details</span></a></li>
                        
                        <li class="nav-item"><a href="{{ route('admin.eventDetails') }}"><i class="ft ft-circle"></i><span class="menu-title">Event Details</span></a></li>

                        <li class="nav-item"><a href="{{ route('admin.codeNames') }}"><i class="ft ft-book"></i><span class="menu-title">Team Names</span></a></li>


 
                    </ul>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dragula.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    @yield('js')
</body>
</html>
