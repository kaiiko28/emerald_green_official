<!DOCTYPE html>
<html lang="en">

<head>
        <script data-ad-client="ca-pub-6024348099551489" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="entertainment, online earnings, online selling" />
    <meta name="description" content="Beautygenic Online Marketing" />
    <meta name="author" content="kaiiko28" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name', 'Emerald Green') }}</title>


       <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,500,700,900" rel="stylesheet">


        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <!--  Bootstrap Css -->
        <link rel="stylesheet" href="{{ asset('landing/plugins/bootstrap/css/bootstrap.css') }}">

        <!-- Icons Css -->
        <link rel="stylesheet" href="{{asset('/')}}landing/css/jquery-ui.css" />
        <link rel="stylesheet" href="{{asset('/')}}landing/plugins/icofont/css/icofont.css">

        <link rel="stylesheet" href="{{asset('/')}}landing/plugins/thimfy-icon/themify-icons.css">

        <!--  Fontawesome Css -->
        <link rel="stylesheet" href="{{asset('/')}}landing/plugins/font-awesome/css/font-awesome.min.css">

        <!--  Owl Carousel -->
        <link rel="stylesheet" href="{{asset('/')}}landing/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset('/')}}landing/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

        <!-- Base MasterSlider style sheet -->
        <link rel="stylesheet" href="{{asset('/')}}landing/plugins/master-slider/style/masterslider.css" />

        <!-- Master Slider Skin -->
        <link href="{{asset('/')}}landing/plugins/master-slider/skins/default/style.css" rel='stylesheet' type='text/css'>

        <!-- MasterSlider Template Style -->
        <link href="{{asset('/')}}landing/plugins/master-slider/css/ms-staff-style.css"  rel="stylesheet">


		<link rel="stylesheet" href="{{asset('/')}}landing/css/switcher-all.css" />
		<!--  Custom Css -->
        <link rel="stylesheet" href="{{asset('/')}}landing/css/layout.css">

		<link rel="stylesheet" href="{{asset('/')}}landing/css/responsive.css">
		<link rel="stylesheet" href="{{asset('/')}}landing/css/switcher-all.css" />
        <style>
            .inner-banner-area {
                padding: 162px 0px;
            }
        </style>
	<!-- Color Css -->
        <!-- <link rel="alternate stylesheet" type="text/css" href="{{asset('/')}}landing/css/color1.css" title="color1.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="{{asset('/')}}landing/css/color2.css" title="color2.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="{{asset('/')}}landing/css/color3.css" title="color3.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="{{asset('/')}}landing/css/color4.css" title="color4.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="{{asset('/')}}landing/css/color5.css" title="color5.css" media="all" /> -->
</head>
<body id="page-top">
	<div id="fullpage">
		<!-- Nav Bar -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-light" id="header-fix">
			<div class="container">
						<a class="navbar-brand" href="{{ url('/home') }}" style="color: #fff;"><img class="img-responsive" style="width:50px"  src="{{ asset('logo.png') }}" alt="EMERALD GREEN"> {{ config('app.name', 'EMERALD GREEN') }}</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
							<span class="navbar-toggler-icon"></span>
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-center" id="navbarColor03">
							<ul class="navbar-nav ml-auto">

                            <li data-menuanchor="firstPage" class="nav-item">
                                            <!-- <a  href="#intro">Intro</a> -->
                                            <a  class="nav-link scrolling" href="{{ url('/home') }}#intro">Intro</a>
                                        </li>
                                        <li data-menuanchor="firstPage" class="nav-item">
                                            <a  class="nav-link scrolling" href="#about">About Us</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link scrolling" href="#pricing">Pricing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link scrolling" href="#contact">Contact Us</a>
                                        </li>


                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link scrolling" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link scrolling" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle  scrolling" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                                        {{ __('Dashboard') }}
                                                    </a>

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
		</nav>

		<!-- Text Editor -->
		<div class="inner-banner-area" id="intro">
			<div id="particles-js"></div>
			<div class="container">
				<div class="row pt-5">
					<div class="col-lg-8 col-md-12 mx-auto align-items-center pt2">
						<h1 class="display-5 font-weight-bold  text-uppercase text-white pt-5">EMERALD GREEN</h1>
						<h4 class="text-white">The habit of saving is itself an education; it fosters every virtue, teaches self-denial, cultivates the sense of order, trains to forethought, and so broadens the mind.</h4>
						<p>Free time is a terrible thing to waste. <br> JOIN US NOW.</p>

					</div>
					<div class="col-lg-4 col-md-12 mt5 ml-auto imgb1">
                        <img  class="img-fluid"  src="{{ asset('logo.png') }}" alt="beautigenic_Logo">
						{{-- <img src="{{asset('/')}}landing/images/mobile1.png" class="img-fluid" alt="" /> --}}
					</div>

				</div>
			</div>
		</div>

		{{-- <!-- About Section -->
		<div id="about" class="pt5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5  text-uppercase font-weight-bold mb-3">Our Marketing Features</h1>
						<p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet.</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-camera"></i></div>
							<h5 class="pt-3 mb-1">Feature 1</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-ui-chat"></i></div>
							<h5 class="pt-3 mb-1">Feature 2</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-crop"></i></div>
							<h5 class="pt-3 mb-1">Feature 3</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-interface"></i></div>
							<h5 class="pt-3 mb-1">Feature 4</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-random"></i></div>
							<h5 class="pt-3 mb-1">Feature 5</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mx-auto text-center mb-4">
						<div class="border p-3">
							<div class="icons-bg1"><i class="icofont icofont-rocket-alt-1"></i></div>
							<h5 class="pt-3 mb-1">Feature 6</h5>
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="relative pt5">
			<div class="md-color-overlay gradient-pink-purple"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-7 text-white  pt2">
						<h1 class="display-5 text-uppercase font-weight-bold text-white mb-3 pt-5"> About EMERALD GREEN  </h1>

                        <p>Beautygenic is an Affliate marketing and online store involves direct selling of products and works primarily on encoding captcha's.</p>

                        <h1 class="display-5 text-uppercase font-weight-bold text-white mb-3 pt-5"> Our Mission </h1>

						<p>Beautygenic's mission is to produce high quality products,to help people earn and to regrow the online business here in the Philippines.</p>
						<!-- <a href="#" class="btn btn-light">Read More</a> -->
					</div>
					<div class="col-lg-5 col-md-5 mt5">
						<img src="{{asset('/')}}landing/images/about.png" class="img-fluid" alt="" />
					</div>
				</div>
            </div>

		</div>

		<!-- Features Section -->
		<div id="features" class="relative pt5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3">Learn to Earn!</h1>
						<p>Here the steps and ways to earn here in EMERALD GREEN</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-4 col-md-6 pt-5 ">
						<div class="media mb-4">
							<div class="media-body text-right">
								<h5 class="mt-0 mb-2">Contact us</h5>
								<p>If you dont have any contact internally. Contact us and will acess you thru the process</p>
							</div>
							<div class="icon-bg ml-3">	<i class="icofont icofont-clock-time"></i></div>
						</div>
						<div class="media mb-4">
							<div class="media-body text-right">
								<h5 class="mt-0 mb-2">Register</h5>
								<p>Our team will provide a link where you can register</p>
							</div>
							<div class="icon-bg ml-3">	<i class="icofont icofont-idea"></i></div>
						</div>
						<div class="media">
							<div class="media-body text-right">
								<h5 class="mt-0 mb-2">Login</h5>
								<p>After registering its important to re-enter your credential to allow the system to redirect you to your official dashboard</p>
							</div>
							<div class="icon-bg ml-3">	<i class="fa fa-video-camera" aria-hidden="true"></i></div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="extra-pic text-center">
							<img src="{{asset('/')}}landing/images/extra.png" alt="img">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 pt-5 ">
						<ul class="list-unstyled">
							<li class="media mb-4">
								<div class="icon-bg mr-3"><i class="icofont icofont-ui-browser"></i></div>
								<div class="media-body">
									<h5 class="mt-0 mb-1 text-uppercase">Affliate Program</h5>
									<p>Our System gives a reward for every successful envites or referral. </p>
								</div>
							</li>
							<li class="media mb-4">
								<div class="icon-bg mr-3"><i class="icofont icofont-ui-map"></i></div>
								<div class="media-body">
									<h5 class="mt-0 mb-1">Problem Solving</h5>
									<p>You can also solve problem on our system where every correct answer will give you rewards!</p>
								</div>
							</li>
							<li class="media">
								<div class="icon-bg mr-3">	<i class="icofont icofont-video-alt"></i></div>
								<div class="media-body">
									<h5 class="mt-0 mb-1">Selling Product</h5>
									<p>Aside from inviting and solving problem we also have a product! Sell it out and earn! </p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Features Section -->
		<div class="relative pt5">
			<div class="md-color-overlay gradient-pink-purple"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-md-10 mx-auto text-center text-white">
						<h1 class="display-5 text-uppercase font-weight-bold mb-3 text-white">What are you waiting for?</h1>
                        <p>Start earning with our pioneering program! With our fun and human friendly application. With super friendly team and admins</p>
                        <a href="#" class="btn btn-light">Contact us now!</a>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center mt-3">
						<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active mr-3 mb-3" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-selected="true"><i class="fa fa-android"></i> Android Store</a>
							</li>
							<li class="nav-item">
								<a class="nav-link mr-3 mb-3" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-selected="false"><i class="fa fa-apple"></i> App Store</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-selected="false"><i class="fa fa-windows"></i> Window Store</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active text-white" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...</div>
							<div class="tab-pane fade text-white" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...</div>
							<div class="tab-pane fade text-white" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled..</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>

		<!-- Screenshort Section -->
		<div id="screenshort" class="pt5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3">APP SCREENSHOTS</h1>
						<p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet.</p>
					</div>
				</div>
				<div class="ms-staff-carousel">
					<div class="master-slider" id="masterslider">
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen1.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen2.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen3.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen4.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen1.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen2.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen3.png" alt="lorem ipsum dolor sit"/>

						</div>
						<div class="ms-slide">
							<img src="{{asset('/')}}landing/images/screen/screen4.png" alt="lorem ipsum dolor sit"/>

						</div>


					</div>
				</div>
			</div>
		</div>

		<!-- Our App -->
		<div class="relative pt5">
			<div class="md-color-overlay gradient-pink-purple"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3 text-white">Our Feeds </h1>
						<p class="text-white">More and more member everyday!</p>
					</div>
				</div>

				<div class="row mt-4 text-center text-white">
					<div class="col-lg-6 col-md-6 mx-auto text-center mb4">
						<div class="single_counter text-white ">
							<i class="fa fa-users fa-3x clr-blgt" aria-hidden="true"></i>
							<h3 class="statistic-counter text-white pt-3">25000</h3>
							<h6 class="text-white text-uppercase">USERS</h6>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 mx-auto text-center">
						<div class="single_counter p-y-2 mt-1 text-white mb4">
							<i class="fa fa-heart fa-3x clr-blgt" aria-hidden="true"></i>
							<h3 class="statistic-counter text-white pt-3">400</h3>
							<h6 class="text-white text-uppercase">Happy Members! </h6>
						</div>
					</div>
				</div>



			</div>
		</div>

		<!-- Pricing List -->
		<div id="pricing" class="relative pt5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3">Our Account Pricing List</h1>
						<p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet.</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-4 col-md-6 mb4">
						<div class="price-header p-4 text-center">
						<h4 class="text-white text-uppercase font-weight-bold">Codeseller</h4>
						<h6 class="text-white">₱ 600</h6>
					</div>
						<ul class="price">
						<li>Lorem ipsum dolor sit amet consectetur</li>
						<li>Lorem ipsum dolor sit amet consectetur</li>
						<li>Lorem ipsum dolor sit amet consectetur</li>
						<li>Lorem ipsum dolor sit amet consectetur</li>
						<li class="grey"><a href="#" class="btn btn-bg py-2 px-4 text-uppercase">Sign Up</a></li>
					</ul>
					</div>
					<div class="col-lg-4 col-md-6 mb4">
						<div class="price-header p-4 text-center">
								<h4 class="text-white text-uppercase font-weight-bold">Basic</h4>
								<h6 class="text-white">₱ 300</h6>
							</div>
						<ul class="price">
								<li>Lorem ipsum dolor sit amet consectetur</li>
								<li>Lorem ipsum dolor sit amet consectetur</li>
								<li>Lorem ipsum dolor sit amet consectetur</li>
								<li>Lorem ipsum dolor sit amet consectetur</li>
								<li class="grey"><a href="#" class="btn btn-bg py-2 px-4 text-uppercase">Sign Up</a></li>
							</ul>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="price-header p-4 text-center">
							<h4 class="text-white text-uppercase font-weight-bold">Reseller Account</h4>
							<h6 class="text-white">₱ 650</h6>
						</div>
						<ul class="price">
							<li>Lorem ipsum dolor sit amet consectetur</li>
							<li>Lorem ipsum dolor sit amet consectetur</li>
							<li>Lorem ipsum dolor sit amet consectetur</li>
							<li>Lorem ipsum dolor sit amet consectetur</li>
							<li class="grey"><a href="#" class="btn btn-bg py-2 px-4 text-uppercase">Sign Up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Testimonials List -->
		<div id="review" class="relative pt5">
			<div class="md-color-overlay gradient-pink-purple"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center text-white">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3 text-white">Our Product</h1>
						<p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet.</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-12 col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial text-white">
								<div class="pic">
									<img src="{{asset('/')}}landing/images/product/1.jpg" alt="">
								</div>
								<div class="testimonial-profile">
									<h3 class="title text-white">product 1</h3>
									<span class="post text-white">Lorem ipsum dolor</span>
									<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit  mauris.</p>
								</div>

							</div>
							<div class="testimonial text-white">
								<div class="pic">
									<img src="{{asset('/')}}landing/images/product/2.jpg" alt="">
								</div>
								<div class="testimonial-profile">
									<h3 class="title text-white">product 2</h3>
									<span class="post text-white">Lorem ipsum dolor</span>
									<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
								</div>

							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('/')}}landing/images/product/3.jpg" alt="">
								</div>
								<div class="testimonial-profile">
									<h3 class="title text-white">product 3</h3>
									<span class="post text-white">Lorem ipsum dolor</span>
									<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
								</div>

							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="{{asset('/')}}landing/images/product/4.jpg" alt="">
								</div>
								<div class="testimonial-profile">
									<h3 class="title text-white">product 4</h3>
									<span class="post text-white">Lorem ipsum dolor</span>
									<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Contact Section -->
		<div id="contact" class="pt5">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 mx-auto text-center">
						<h1 class="display-5 font-weight-bold text-uppercase mb-3">Have any questions? </h1>
						<p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet.</p>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-8 col-md-12 col-sm-12 ">
						<div class="contact-form">
							<form id="contatc_form" method="POST" action="#" name="myform" novalidate="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label><strong>Name</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Your Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label><strong>E-mail</strong></label>
											<input type="email" class="form-control" name="email" placeholder="Email Address" required="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label><strong>Subject</strong></label>
									<input type="text" class="form-control"  placeholder="Your subject" required="">
								</div>
								<div class="form-group">
														<label><strong>Message</strong></label>
									<textarea class="form-control" id="contact_message" name="message" rows="5" placeholder="Enter your message here..." required="" ></textarea>
								</div>

								<div class="mt-3">
									<button type="submit" class="btn btn-bg py-2 px-4 text-uppercase">Send Message</button>
							   </div>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-8 mt5">
						<div class="contact-info">
							<ul class="list-unstyled">
								<li class="media border p-4 mb-4">
									<div class="icon-bg mr-3"><i class="icofont icofont-social-google-map"></i></div>
									<div class="media-body">
										<h5 class="mt-0 mb-1">Office Address:</h5>
										<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</li>
								<li class="media border p-4 mb-4">
									<div class="icon-bg mr-3"><i class="icofont icofont-envelope"></i></div>
									<div class="media-body">
										<h5 class="mt-0 mb-1">E-mail Address:</h5>

										<p class="mb-0">lorem@gmail.com <br />lorem@gmail.com</p>
									</div>
								</li>
								<li class="media border p-4">
									<div class="icon-bg mr-3"><i class="icofont icofont-phone"></i></div>
									<div class="media-body">
										<h5 class="mt-0 mb-1">Phone Number:</h5>
									   <p class="mb-0">09123456789 <br> 09123456789</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> --}}

		<!-- Footer Section -->
		<footer class="relative py-5">
			<div class="md-color-overlay gradient-pink-purple"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 mx-auto text-center">
						<h6 class="text-white">2019 All Right Reserved By EMERALD GREEN Online</h6>
						<ul class="list-inline mt-3 mb-0">
							{{-- <li class="list-inline-item">
								<a href="https://www.facebook.com/LeisureShine-Support-Group-120547032673970/"><div class="icon-bg1"><i class="fa fa-facebook"></i></div></a>
							</li> --}}
							{{-- <li class="list-inline-item">
								<a href="#"><div class="icon-bg1"><i class="fa fa-twitter"></i></div></a>
							</li>
							<li class="list-inline-item">
								<a href="#"><div class="icon-bg1"><i class="fa fa-google"></i></div></a>
							</li>
							<li class="list-inline-item">
								<a href="#"><div class="icon-bg1"><i class="fa fa-linkedin"></i></div></a>
							</li>
							<li class="list-inline-item">
								<a href="#"><div class="icon-bg1"><i class="fa fa-instagram"></i></div></a>
							</li> --}}
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>
        <!-- Switcher -->
		<!-- <div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
				<div class="form_holder">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="predefined_styles">
								<div class="skin-theme-switcher">
									<h4>Color</h4>
									<a href="#" data-switchcolor="layout.css" class="styleswitch color1" > </a>
									<a href="#" data-switchcolor="color1.css" class="styleswitch color2" > </a>
									<a href="#" data-switchcolor="color2.css" class="styleswitch color3"> </a>
									<a href="#" data-switchcolor="color3.css" class="styleswitch color4"> </a>
									<a href="#" data-switchcolor="color4.css" class="styleswitch color5"> </a>
									<a href="#" data-switchcolor="color5.css" class="styleswitch color6"> </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
		<!-- Jquery Js -->
        <script src="{{asset('/')}}landing/js/jquery.min.js"></script>

		<!-- Bootstrap Js -->
	   	<script src="{{asset('/')}}landing/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{asset('/')}}landing/plugins/bootstrap/js/bootstrap.min.js"></script>


		<!-- Master Slider -->
		<!--<script src="{{asset('/')}}landing/plugins/master-slider/js/jquery.min.js"></script>-->
        <script src="{{asset('/')}}landing/plugins/master-slider/js/jquery.easing.min.js"></script>
		<script src="{{asset('/')}}landing/plugins/master-slider/js/masterslider.min.js"></script>
        <script src="{{asset('/')}}landing/js/master-slider-custom.js"></script>


        <!-- Counter Js -->
        <script src="{{asset('/')}}landing/plugins/counter/jquery.waypoints.min.js"></script>
        <script src="{{asset('/')}}landing/plugins/counter/jquery.counterup.min.js"></script>
        <script src="{{asset('/')}}landing/js/counter-custom.js"></script>


        <!-- Testimonials Js -->
        <script src="{{asset('/')}}landing/plugins/owl-carousel/js/owl.carousel.min.js"></script>
        <script src="{{asset('/')}}landing/js/testimonials-custom.js"></script>

        <!-- Canvas Js -->
        <script src="{{asset('/')}}landing/plugins/canvas-js/canvas-min.js"></script>
        <script src="{{asset('/')}}landing/js/canvas-custom.js"></script>

        <!-- Custom Js -->
       <!-- <script src="{{asset('/')}}landing/js/custom.js"></script>-->

        <!-- Header Fixed -->
        <script src="{{asset('/')}}landing/js/header-fix.js"></script>


        <!-- Scroll Js -->
     	<script src="{{asset('/')}}landing/js/scroll-custom.js"></script>

        <!-- Bg maker Custom Js -->
        <script src="{{asset('/')}}landing/js/bg-maker-custom.js"></script>
        <script src="{{asset('/')}}landing/plugins/switcher/switcher.js"></script>

		<script src="{{asset('/')}}landing/js/menu.js"></script>

</body>

</html>
