<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Basic Page Needs -->
      <meta charset="utf-8">
      <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
      <title>{{ config('app.name', 'Emerald Green Online Shop') }}</title>

      <meta name="author" content="Anna Liza Bade Dela Cruz">

      <!-- Mobile Specific Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

      <!-- Bootstrap  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/stylesheets/bootstrap.css" >

      <!-- Theme Style -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/stylesheets/style.css">

      <!-- Responsive -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/stylesheets/responsive.css">

      <!-- Colors -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/stylesheets/colors/color1.css" id="colors">

      <!-- Animation Style -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/stylesheets/animate.css">

      <!-- Favicon and touch icons  -->
      <link href="{{ asset('HE.png') }}" rel="apple-touch-icon-precomposed" sizes="48x48">
      <link href="{{ asset('HE.png') }}" rel="apple-touch-icon-precomposed">
      <link href="{{ asset('HE.png') }}" rel="shortcut icon">
      <!-- Slider Revolution CSS Files -->
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/rev-slider/css/settings.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/rev-slider/css/layers.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('landing') }}/rev-slider/css/navigation.css">

      <style>
          footer.style3 {
            /* background-image: url('{{asset("img/silk.jpg")}}'); */
            background-size: cover;
            background-repeat: no-repeat;
            height: auto;
            max-height: 445px;
        }
        .footer-widgets {
            padding-bottom: 20px;
        }
      </style>

      @yield('styles')
  </head>


  <body>
    <div id="loading-overlay">
        <div class="loader"></div>
    </div> <!-- /.loading-overlay -->
    <header class="style1">
        <div id="site-header">
        <div class="container-fluid">
             <a href="index.html" class="logo"><img src="{{ asset('HE_rectangle.png')}}" alt="image" width="129" height="37" data-retina="image/logo-2x.png" data-width="147" data-height="21"></a>
             <div class="mobile-button">
                <span></span>
             </div>
             <div class="nav-wrap ">
                <nav id="mainnav" class="mainnav">
                    <ul class="menu">
                        <li class="active a">
                             <a href="{{ url('/') }}" title="">HOME</a>
                        </li>
                        {{-- <li class="active">
                             <a href="#" title="">Cathegory</a>
                                <ul class="sub-menu">
                                    <li><a href="#" title="">About Us</a></li>
                                    <li><a href="#" title="">Event</a></li>
                                    <li><a href="#" title="">Coming Soon</a></li>
                                    <li><a href="#" title="">404 Page</a></li>
                                    <li><a href="#" title="">Wish List</a></li>
                                 </ul><!-- /.sub-menu -->
                        </li> --}}
                        {{-- <li class="active">
                            <a href="#" title="">CONTACT US</a>
                                <ul class="sub-menu">
                                    <li><a href="contact-1.html" title="">Contact Us 1</a></li>
                                    <li><a href="Contact-2.html" title="">Contact Us 2</a></li>
                                </ul><!-- /.sub-menu -->
                         </li> --}}
                    </ul>
                </nav>
             </div><!-- /.nav-wrap -->
             <div class="search clearfix">
                 <ul>
                     <li><input type="search" id="search" placeholder="Search..." ></li>
                     <li><a href="#" class="header-search-icon"><i class="ti-search" aria-hidden="true"></i></a></li>
                     <li><a href="#"> <i class="ti-align-justify" aria-hidden="true"></i> </a>
                        <ul class="sub-menu">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('User Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/user/dashboard') }}">
                                            <span class="sidebar-icon"><i class="fas fa-tachometer-alt"></i></span>
                                            <span class="sidebar-title">Dashboard</span>
                                        </a>
                                </li>
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
                            {{-- <li><a href="projects1.html" title="">Login/ Register</a></li>
                            <li><a href="projects1.html" title="">My Account</a></li>
                            <li><a href="projects1.html" title="">My Wishlist</a></li>
                            <li><a href="projects1.html" title="">My Cart</a></li>
                            <li><a href="projects1.html" title="">Tracking Orders</a></li>
                            <li class="language"><a href="projects1.html" title="">LANGUAGE</a></li>
                            <li class="flag"><a href="projects1.html" title="">
                                <span><img src="image/flash3.png" alt="image"></span>
                                <span><img src="image/flash1.png" alt="image"></span>
                                <span><img src="image/flash2.png" alt="image"></span>
                            </a></li> --}}
                        </ul><!-- /.sub-menu -->
                      </li>
                 </ul>
                 <form class="header-search-form" role="search" method="get" action="#">
                    <input type="text" value="" name="#" class="header-search-field" placeholder="Search...">
                    <button type="submit" class="header-search-submit" title="Search"><i class="fa fa-search"></i></button>
                 </form>
             </div>
        </div><!-- /container -->
        </div>
    </header>
    @yield('content')

    <footer class="style3">
        <div class="container">
            <div class="footer-widgets">
                <div class="widget widget-logo">
                    <a href="index.html" class="logo"><img src="{{ asset('HE_rectangle.png')}}" alt="image" width="129" height="37" data-retina="image/logo-2x.png" data-width="147" data-height="21"></a>
                </div> <!-- /widget-logo -->
                <div class="widget widget-icon">
                    <ul>
                        <li class="active"><a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-skype" aria-hidden="true"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
                    </ul>
                </div> <!-- /widget-icon -->
                {{-- <div class="widget widget-title">
                     <h2>Get news & offers</h2>
                </div> <!-- /widget-title --> --}}
                {{-- <div class="widget widget-contact">
                     <input type="search" id="search-footer" placeholder="Your Email" >
                     <button type="submit"><i class="fa fa-location-arrow" aria-hidden="true"></i></button>
                </div> <!-- /widget-contact -->
                <div class="widget widget-menu">
                     <ul>
                         <li class="active"><a href="About-2.html"> About Us </a></li>
                         <li><a href="Shop-fullwidth-grid.html"> Customer Service </a></li>
                         <li><a href="Homepage2.html"> Terms & Conditions </a></li>
                         <li><a href="Blog-grid-3column.html"> Privacy Policy </a></li>
                         <li class="contact"><a href="contact-1.html"> Contact </a></li>
                     </ul>
                </div> <!-- /widget-about --> --}}
                <div class="widget widget-text">
                    <span>© 2019 Emerald Green. All Rights Reserved</span>
                </div>
            </div> <!-- /footer-widgets -->
        </div> <!-- /container -->
    </footer>
    <a id="scroll-top"><i class="fa fa-angle-right" aria-hidden="true"></i></a> <!-- /#scroll-top -->

    <script src="{{ asset('landing') }}/javascript/jquery.min.js"></script>
    <script src="{{ asset('landing') }}/javascript/rev-slider.js"></script>
    <script src="{{ asset('landing') }}/javascript/owl.carousel.min.js"></script>
    <script src="{{ asset('landing') }}/javascript/jquery-countTo.js"></script>
    <script src="{{ asset('landing') }}/javascript/jquery-waypoints.js"></script>
    <script src="{{ asset('landing') }}/javascript/bootstrap.min.js"></script>
    <script src="{{ asset('landing') }}/javascript/jquery.easing.js"></script>
    <script src="{{ asset('landing') }}/javascript/main.js"></script>

     <!-- Slider -->
    <script src="{{ asset('landing') }}/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="{{ asset('landing') }}/javascript/rev-slider.js"></script>
    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{ asset('landing') }}/rev-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>
</html>
