<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156814870-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-156814870-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('HE.png') }}" rel="shortcut icon">

    <title>{{ config('app.name', 'Happy Emerald') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('plugin/mdb/css/addons/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/mdb/css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/fontawsome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/mdb/css/style.css') }}" rel="stylesheet">


    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('plugin/mdb/js/jquery-3.4.1.min.js') }}"></script>

    @yield('styles')
    <style>
        .form-inline .form-control {
            color: #000!important;
        }
    </style>
</head>
<body>
    <div id="app">
        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color navbar-fixed-top ">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Happy Emerald') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="text-transform:capitalize;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </ul>
            </div>
        </nav>
      <!--/.Navbar -->

        <div id="wrapper">
            <div id="sidebar-wrapper">
                <aside id="sidebar">

                    <ul id="sidemenu" class="sidebar-nav">
                        <li class="bot-left logo-holder">
                            <span class="sidebar-icon d-block d-sm-none"><img src="{{ asset('HE_rectangle.png?v=1') }}" alt="" class="img-responsive" style="width:45px;"></span>
                            <span class="text-center sidebar-title d-none d-sm-block"><img src="{{ asset('HE_rectangle.png?v=1') }}" alt="" class="img-responsive" style="width:200px;"></span>
                        </li>
                        <li class="bot-left">
                            <a href="{{ route('user.dashboard') }}">
                                <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                                <span class="sidebar-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="bot-left">
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-1">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">Ways to Earn</span>
                                <span class="fa fa-caret"></span>
                            </a>
                            <ul id="submenu-1" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="{{ route('user.solve')}}"><span class="fas fa-cogs"></span> <span class="xn-text">Captcha Solving</span></a></li>
                                <li><a href="{{ route('user.tables') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Table of Exit</span></a></li>
                                <li><a href="{{ route('user.invite_list')}}"><span class="fas fa-cogs"></span> <span class="xn-text">My Invites</span></a></li>

                            </ul>
                        </li>

                        <li class="bot-left">
                            <a href="{{ route('user.payout_logs')}}">
                                <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                                <span class="sidebar-title">My Payouts</span>
                            </a>
                        </li>


                        @if (Auth::user()->role == "Code Seller" || Auth::user()->role == "Payout Officer")

                        <li class="bot-left">
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                                <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                <span class="sidebar-title">My Purchase Code</span>
                                <span class="fa fa-caret"></span>
                            </a>
                            <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="{{ route('user.code') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Activation Codes</span></a></li>
                                {{-- <li><a href="{{ route('user.renewal') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Captcha Renewal</span></a></li> --}}
                            </ul>
                        </li>
                        @endif


                        @if (Auth::user()->role == "Payout Officer")

                        <li class="bot-left">
                                <a href="{{ route('officer_view_payout') }}">
                                    <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                                    <span class="sidebar-title">My Payout Task</span>
                                </a>
                            </li>

                        @endif






                        {{-- <li class="">
                                <a href="{{ route('user.dashboard') }}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">Dashboards</span></a>
                            </li>

                            <li>
                                <a href="{{ route('user.solve')}}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">Start Solving</span></a>
                            </li>

                            @if (Auth::user()->role == "Code Seller" || Auth::user()->role == "Payout Officer")

                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Codes</span></a>
                                <ul>
                                    <li><a href="{{ route('user.code') }}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">Registration Codes</span></a></li>
                                    <li><a href="{{ route('user.renewal') }}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">Renewal Codes</span></a></li>

                                </ul>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('user.payout_logs')}}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">My Payout Request</span></a>
                            </li>
                            <li>
                                <a href="{{ route('user.invite_list')}}"><span class="fas fa-tachometer-alt"></span> <span class="xn-text">My Invites</span></a>
                            </li> --}}


                    </ul>
                </aside>
            </div>
            <main id="page-content-wrapper" role="main">
            </main>
        </div>


        <main class="py-4">
                {{-- <div class="hero container-background">
                </div>
                <div class="hero-1 container-background-1">
                </div> --}}

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 offset-md-2 col-11 offset-1" >

                        @include('inc.messeges')

                            <div class="card card-bg">
                                @yield('content')

                                <div class="card-footer text-muted">
                                    © @php echo date("Y"); @endphp Copyright. Created by {{ config('app.name', 'Happy Emerald') }}</a>
                                </div>
                            </div>
                    </div>
                </div>


            </div>

        </main>
    </div>

    <script src="{{ asset('plugin/mdb/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugin/mdb/js/mdb.min.js') }}"></script>
    <script src="{{ asset('plugin/mdb/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugin/mdb/js/addons/datatables.js') }}"></script>
    <script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    </script>
    @yield('scripts')
</body>
</html>
