<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="{{ asset('plugin/mdb/css/style.css?v=1.1') }}" rel="stylesheet">


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
        {{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
            </div>
        </nav> --}}

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
            {{-- <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Dropdown
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
                </li>
            </ul> --}}
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
                                {{ Auth::user()->name }} <span class="caret"></span>
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
                            <a href="{{ url('/master') }}">
                                <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                                <span class="sidebar-title">Home</span>
                            </a>
                        </li>
                        <li class="bot-left">
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-1">
                                <span class="sidebar-icon"><i class="fa fa-key"></i></span>
                                <span class="sidebar-title">Code Creation</span>
                                <span class="fa fa-caret"></span>
                            </a>
                            <ul id="submenu-1" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="{{ route('admin.code') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Registration Codes</span></a></li>
                                {{-- <li><a href="{{ route('admin.create_code') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Renewal Codes</span></a></li> --}}

                            </ul>
                        </li>

                        <li class="bot-left">
                                <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#user">
                                    <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                                    <span class="sidebar-title">Users</span>
                                    <span class="fa fa-caret"></span>
                                </a>
                                <ul id="user" class="panel-collapse collapse panel-switch" role="menu">
                                    <li><a href="{{ route('admin.accounts') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Accounts Modification</span></a></li>
                                    <li><a href="{{ route('admin.assign_table') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Assign User Table</span></a></li>
                                    <li><a href="{{ route('admin.accounts') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Assign User Role</span></a></li>
                                    <li><a href="{{ route('admin.user_password') }}"><span class="fas fa-cogs"></span> <span class="xn-text">User Change Password</span></a></li>
                                </ul>
                            </li>


                        <li class="bot-left">
                            <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                                <span class="sidebar-icon"><i class="fa fa-cash-register"></i></span>
                                <span class="sidebar-title">Payout Requests</span>
                                <span class="fa fa-caret"></span>
                            </a>
                            <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                                <li><a href="{{ route('admin.choose_officer') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Assign to Officer</span></a></li>
                                <li><a href="{{ route('admin.payouts') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Pending</span></a></li>
                                <li><a href="{{ route('admin.accepted') }}"><span class="fas fa-cogs"></span> <span class="xn-text">Accepted</span></a></li>
                            </ul>
                        </li>


                        <li class="bot-left">
                            <a href="{{ route('shop.product_list') }}">
                                <span class="sidebar-icon"><i class="fas fa-store"></i></span>
                                <span class="sidebar-title">Product List</span>
                            </a>
                        </li>

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
                    <div class="col-md-10 offset-md-2 col-11 offset-1">

                        @include('inc.messeges')

                        <div class="card card-bg">
                            @yield('content')


                    <div class="card-footer text-muted">
                            © @php echo date("Y"); @endphp Copyright. Created by <a href="https://melanieflores-resume.000webhostapp.com/" target="_blank">kaiiko28</a>
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
    @yield('scripts')
    <script>
    // SideNav Button Initialization
    // $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    // var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    // var ps = new PerfectScrollbar(sideNavScrollbar);
    // Material Select Initialization
    // $(document).ready(function () {
    //   $('.mdb-select').material_select();
    // });
    // Data Picker Initialization
    // $('.datepicker').pickadate();
    // Tooltip Initialization
    // $(function () {
    //   $('[data-toggle="tooltip"]').tooltip()
    // })
    // Minimalist chart
    // $(function () {
    //   $('.min-chart#chart-sales').easyPieChart({
    //     barColor: "#4caf50",
    //     onStep: function (from, to, percent) {
    //       $(this.el).find('.percent').text(Math.round(percent));
    //     }
    //   });
    // });
    // Main chart
    // var ctxL = document.getElementById("lineChart").getContext('2d');
    // var myLineChart = new Chart(ctxL, {
    //   type: 'line',
    //   data: {
    //     labels: ["January", "February", "March", "April", "May", "June", "July"],
    //     datasets: [{
    //       label: "My First dataset",
    //       fillColor: "#fff",
    //       backgroundColor: 'rgba(255, 255, 255, .3)',
    //       borderColor: 'rgba(255, 255, 255)',
    //       data: [0, 10, 5, 2, 20, 30, 45],
    //     }]
    //   },
    //   options: {
    //     legend: {
    //       labels: {
    //         fontColor: "#fff",
    //       }
    //     },
    //     scales: {
    //       xAxes: [{
    //         gridLines: {
    //           display: true,
    //           color: "rgba(255,255,255,.25)"
    //         },
    //         ticks: {
    //           fontColor: "#fff",
    //         },
    //       }],
    //       yAxes: [{
    //         display: true,
    //         gridLines: {
    //           display: true,
    //           color: "rgba(255,255,255,.25)"
    //         },
    //         ticks: {
    //           fontColor: "#fff",
    //         },
    //       }],
    //     }
    //   }
    // });
    </script>
</body>
</html>
