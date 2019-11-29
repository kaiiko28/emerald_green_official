@extends('layouts.app')



@section('content')
{{-- <div class="container-fluid" style="margin-top:50px;">
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <div class="view">
                      <img class="d-block w-100" src="https://www.sticaloocan.edu.ph/assets/images/tourism.jpg"
                        alt="First slide">
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h3 class="h3-responsive">Caption 1</h3>
                      <p>Caption Discription</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                      <img class="d-block w-100" src="https://www.sticaloocan.edu.ph/assets/images/arts.jpg"
                        alt="Second slide">
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h3 class="h3-responsive">Caption 2</h3>
                      <p>Caption Discription</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                      <img class="d-block w-100" src="https://www.sticaloocan.edu.ph/assets/images/engineering.jpg"
                        alt="Third slide">
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h3 class="h3-responsive">Caption 3</h3>
                      <p>Caption Discription</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                      <img class="d-block w-100" src="https://www.sticaloocan.edu.ph/assets/images/hospitality.jpg"
                        alt="Third slide">
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h3 class="h3-responsive">Caption 4</h3>
                      <p>Caption Discription</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                      <img class="d-block w-100" src="https://www.sticaloocan.edu.ph/assets/images/enroll.jpg"
                        alt="Third slide">
                      <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                      <h3 class="h3-responsive">Caption 5</h3>
                      <p>Caption Discription</p>
                    </div>
                  </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
              </div>
              <!--/.Carousel Wrapper-->
</div> --}}
{{-- <div class="container">
    <!--Carousel Wrapper-->


    @foreach ($content as $item)
        @if ($item->theme == "default_theme")
            <div class="card card-bg text-center">
                <div class="card-header">

                    <h1>{{$item->title}}</h1>
                </div>
                <div class="card-body">

                        @php
                        $body = "$item->body";


                        // Allow <p> and <a>
                        echo strip_tags($body, $htmlchar);
                    @endphp
                </div>
            </div>


        @elseif ($item->theme == "success_theme")
        <div class="card bg-success text-center">
            <div class="card-header">

                <h1>{{$item->title}}</h1>
            </div>
            <div class="card-body">

                @php
                    $body = "$item->body";


                    // Allow <p> and <a>
                        echo strip_tags($body, $htmlchar);
                @endphp
            </div>
        </div>
        @elseif ($item->theme == "warning_theme")
        <div class="card bg-warning text-center">
            <div class="card-header">

                <h1>{{$item->title}}</h1>
            </div>
            <div class="card-body">

                @php
                    $body = "$item->body";


                    // Allow <p> and <a>
                        echo strip_tags($body, $htmlchar);
                @endphp
            </div>
        </div>
        @elseif ($item->theme == "info_theme")
        <div class="card bg-info text-center">
            <div class="card-header">

                <h1>{{$item->title}}</h1>
            </div>
            <div class="card-body">

                @php
                    $body = "$item->body";


                    // Allow <p> and <a>
                        echo strip_tags($body, $htmlchar);
                @endphp
            </div>
        </div>
        @endif
    @endforeach


</div> --}}

<div class="flat-slider style1">
        <!-- SLIDER -->
        <div class="rev_slider_wrapper fullwidthbanner-container" >
            <div id="rev-slider1" class="rev_slider fullwidthabanner">
                <ul>
                    <!-- Slide 1 -->
                    <li data-transition="random">
                        <!-- Main Image -->
                        <img src="{{ asset('img/cover.png') }}" alt="" data-bgposition="center center" data-no-retina>
                        <div class="overlay"></div>

                        <!-- Layers -->
                        <div class="tp-caption tp-resizeme text-ffb922 font-rubik font-weight-500 wellcome"
                        data-x="['left','left','left','center']" data-hoffset="['2','4','4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-132','-118','-98','-78']"
                        data-fontsize="['36','20','20','16']"
                        data-lineheight="['48','48','28','14']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="700"
                        data-splitin="none"
                        data-splitout="none"
                        data-paddingleft= "['3','3','3','3']"
                        data-responsive_offset="on">Welcome to Emerald Green Online Shop</div>

                        <div class="tp-caption tp-resizeme font-rubik font-weight-700 best"
                        data-x="['left','left','left','center']" data-hoffset="['-4','-4','-4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-50','-40']"
                        data-fontsize="['72','60','40','32']"
                        data-lineheight="['80','80','45','35']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"> <a href="#" class="text-white">Best Product on your finger tip</a> </div>

                        <div class="tp-caption tp-resizeme text-white font-rubik font-weight-400 text-wizym"
                        data-x="['left','left','left','center']" data-hoffset="['0','-2','-2','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['27','27','27','17']"
                        data-fontsize="['18','18','16','14']"
                        data-lineheight="['32','32','26','22']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-paddingright="['550','155','50','2']" >Emeral Green offers extensive collections of product from trusted brand around the country  </div>

                        {{-- <div class="tp-caption"
                        data-x="['left','left','left','center']" data-hoffset="['0','-4','-4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['102','102','92','70']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> <a href="#" class="btn btn-styl button-project">READ MORE</a></div>
                    </li><!-- /End Slide 1 --> --}}

                    <!-- Slide 2 -->
                    <li data-transition="random">
                        <!-- Main Image -->
                        <img src="{{ asset('img/cover2.png') }}" alt="" data-bgposition="center center" data-no-retina>
                        <div class="overlay"></div>

                        <!-- Layers -->
                        <div class="tp-caption tp-resizeme text-ffb922 font-rubik font-weight-500 wellcome"
                        data-x="['left','left','left','center']" data-hoffset="['2','4','4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-132','-118','-98','-78']"
                        data-fontsize="['36','20','20','16']"
                        data-lineheight="['48','48','28','14']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="700"
                        data-splitin="none"
                        data-splitout="none"
                        data-paddingleft= "['3','3','3','3']"
                        data-responsive_offset="on">Welcome to Emerald Green Online Shop</div>

                        <div class="tp-caption tp-resizeme font-rubik font-weight-700 best"
                        data-x="['left','left','left','center']" data-hoffset="['-4','-4','-4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['-60','-60','-50','-40']"
                        data-fontsize="['72','60','40','32']"
                        data-lineheight="['80','80','45','35']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"> <a href="#" class="text-white">Best Product on your finger tip</a> </div>

                        <div class="tp-caption tp-resizeme text-white font-rubik font-weight-400 text-wizym"
                        data-x="['left','left','left','center']" data-hoffset="['0','-2','-2','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['27','27','27','17']"
                        data-fontsize="['18','18','16','14']"
                        data-lineheight="['32','32','26','22']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-paddingright="['550','155','50','2']" >Emeral Green offers extensive collections of product from trusted brand around the country </div>

                        {{-- <div class="tp-caption"
                        data-x="['left','left','left','center']" data-hoffset="['0','-4','-4','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['102','102','92','70']"
                        data-width="full"
                        data-height="none"
                        data-whitespace="normal"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                        data-mask_in="x:0px;y:[100%];"
                        data-mask_out="x:inherit;y:inherit;"
                        data-start="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on"
                        data-paddingtop= "['50','50','50','50']"
                        data-paddingbottom= "['50','50','50','50']"> <a href="#" class="btn btn-styl button-project">READ MORE</a></div> --}}
                    </li><!-- /End Slide 2 -->
                </ul>
            </div>
        </div>
</div> <!-- /.flat-slider -->

<div class="main-homepage-1">
          <section class="flat-about style1">
                 <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                           <div class="image-single">
                                <img src="{{ asset('img/home1.png')}}" alt="image">
                           </div>
                        </div> <!-- /col-lg-7 -->
                        <div class="col-lg-5 col-md-5">
                            <div class="flat-divider margin-top50px"></div>
                            <div class="flat-textbox">
                                <h3 class="textbox-title"><a href="#"> Our Form Emerald Green</a></h3>
                                <h1 class="textbox-main"><a href="#"> Welcome To Emerald Green</a></h1>
                                 <p>Best and affordable Product on your finger tip</p>
                            </div> <!-- /flat-textbox -->
                            <div class="flat-divider margin-top24px"></div>
                            <div class="information">
                                <div class="information-address">
                                    <span>Address:</span>
                                    <span class="information-content">Marindal Street <br>
                                            Valenzuela City 1444</span>
                                </div>
                                <div class="information-hotline information-bottom">
                                    <span>Hotline:</span>
                                    <span class="information-content">
                                            0956 269 5368</span>
                                </div>
                                <div class="information-open information-bottom">
                                    <span>We're Open</span>
                                    <span class="information-content">Mon-Sun: 9:00am - 10.00pm</span>
                                </div>
                                <div class="information-open information-bottom">
                                    <span>Facebook Page:</span>
                                    <span class="information-content"><a href="https://web.facebook.com/Happy-Emerald-102829421169785/">Happy Emerald Online Shop</a></span>
                                </div>
                            </div> <!-- /information -->
                        </div><!-- /col-lg-5 -->
                    </div> <!-- /row-->
                 </div> <!-- /container -->
          </section> <!-- /flat-about -->
          <section class="flat-our-product our-product-new">
                 <div class="container">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="title-section">
                                <h3 class="our-product-title"><a href="#"> Our Products </a></h3>
                                <h1 class="our-product-main"><a href="#"> Popular This Month </a></h1>
                                <div class="our-product-image">
                                    <img src="{{ asset('img/season1.png')}}" alt="image">
                                </div>
                            </div> <!-- /title-section -->
                        </div> <!-- /col-lg-12 -->
                        <div class="product-content product-fourcolumn clearfix">
                          <ul class="product clearfix">
                              <li class="product-item">
                                  <div class="product-thumb clearfix">
                                      <a href="#" class="product-thumb">
                                          <img style="height: 290px;width:auto;" src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/73482752_104236004362460_8926154128103571456_n.jpg?_nc_cat=107&_nc_eui2=AeGyqhhlVxDIpOPODk65yGW4C41MmBJi71LKY4TEJDoVRqO0OisMy30Z-9x10ceK3RlKacWQi1kNB2BJhuXw-dBOd4-3vp4DSswDwo36H0_Z3g&_nc_oc=AQkdTmIWE6YMwyW00TrPEUPuGWpSj8h52fha5YP9uqGiRY_5CRAjdi1Xgi4RlJFEsK8&_nc_ht=scontent-hkg3-1.xx&oh=ae3a847be90cc7e489ad5818941d83ad&oe=5E48DB3F" alt="image">
                                      </a>
                                  </div>
                                  <div class="product-info text-center clearfix">
                                      <span class="product-title">Sarap Savers</span>
                                      <div class="price">
                                          <ins>
                                              <span class="amount">₱120.00</span>
                                          </ins>
                                      </div>
                                  </div>
                                  <div class="product-review">
                                      <div class="add-cart">
                                           <a href="#" class="like1"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                      </div>
                                      <div class="add-cart">
                                           <a href="#" class="like2"><i class="fa fa-heart-o"></i></a>
                                      </div>
                                      <div class="add-cart">
                                           <a href="#" class="like3"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                      </div>
                                  </div>
                              </li> <!-- /product-item -->
                              <li class="product-item">
                                  <div class="product-thumb clearfix">
                                      <a href="#" class="product-thumb">
                                          <img style="height: 290px;width:auto;" src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/75009068_104226511030076_8815475788708052992_n.jpg?_nc_cat=107&_nc_eui2=AeHtVRnAewGpf8zz5lsMqZSDosH9eO8mLlSY2MTZONRkTS5vOkdR7r2ZUvNr-M3akBHVaxiRieQF7ZHHyzXgN1YOFOXGuM5-dWz4gUh7f73TeA&_nc_oc=AQmPRHv08yNk7FTZ1hZjx_o_PAg8AJV3PGqlieKBfz0nA9lUm6hfCwlIZob-pxtNqEs&_nc_ht=scontent-hkg3-1.xx&oh=ce84106503d9b81166add3cfbc835c6b&oe=5E17013D" alt="image">
                                      </a>
                                      <span class="new">Sale</span>
                                  </div>
                                  <div class="product-info product-hight clearfix">
                                      <span class="product-title">Del Monte Sweetend Pineapple drink</span>
                                      <div class="price">
                                          <ins>
                                              <span class="amount">₱60.00</span>
                                              <del>₱80.99</del>
                                          </ins>
                                      </div>

                                  </div>
                                  <div class="product-review">
                                          <div class="add-cart">
                                               <a href="#" class="like1"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                          </div>
                                          <div class="add-cart">
                                               <a href="#" class="like2"><i class="fa fa-heart-o"></i></a>
                                          </div>
                                          <div class="add-cart">
                                               <a href="#" class="like3"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                          </div>
                                  </div>
                              </li> <!-- /product-item -->
                              <li class="product-item">
                                  <div class="product-thumb clearfix">
                                      <a href="#" class="product-thumb">
                                          <img style="height: 290px;width:auto;" src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/74228878_104226164363444_6078954315412668416_n.jpg?_nc_cat=106&_nc_eui2=AeHheJ2TWrC-d0vKzW_1i04vgEZ_A_uznHsBBAXAREQX1PDw-jFSrGAUXG6U0PtIPZ1GMKkc9wY2vsD59FgayPj8a-fX-bxZnCLj99wPqwW_wA&_nc_oc=AQn5bnqdw7WDFQ1ANM5J3UKtMaxo_6A_wNuADw7zPk8qaGh79UTi92F2zTtfNoggWcU&_nc_ht=scontent-hkg3-1.xx&oh=09ae2a4cacb62281c6877f2d6b1f1c43&oe=5E4880B3" alt="image">
                                      </a>

                                  </div>
                                  <div class="product-info clearfix">
                                      <span class="product-title">Del Monte Spaghetti Pasta Italiana 900g</span>
                                      <div class="price">
                                          <ins>
                                              <span class="amount">₱80.00</span>
                                          </ins>
                                      </div>
                                  </div>
                                  <div class="product-review">
                                      <div class="add-cart">
                                           <a href="#" class="like1"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                      </div>
                                      <div class="add-cart">
                                           <a href="#" class="like2"><i class="fa fa-heart-o"></i></a>
                                      </div>
                                      <div class="add-cart">
                                           <a href="#" class="like3"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                      </div>
                                   </div>
                              </li> <!-- /product-item -->
                              <li class="product-item">
                                  <div class="product-thumb clearfix">
                                      <a href="#" class="product-thumb">
                                          <img style="height: 290px;width:auto;"  src="https://scontent-hkg3-1.xx.fbcdn.net/v/t1.0-9/75252979_104251267694267_8802695336129724416_n.jpg?_nc_cat=102&_nc_eui2=AeH_lIcoeu-9Fn-mm__8oGU1d1MIQGsRnZYdTMxsKnwoDVHn_jGZ3fHNfvkvOjL4PPJfl8nttGjnF9UpMrIbQXzaoMjsRbWx9igzqod91fc3hA&_nc_oc=AQneulepFP5tQB74rHyEzPSybRZXM78FEIKdjx7Anr9jig84joyzCeZTm1pnbinpfRo&_nc_ht=scontent-hkg3-1.xx&oh=004f604c2e70273932b8a7eb60245cac&oe=5E42EA35" alt="image">
                                      </a>
                                  </div>
                                  <div class="product-info clearfix">
                                      <span class="product-title">Elbow Macaroni</span>
                                      <div class="price">
                                          <ins>
                                              <span class="amount">₱58.00</span>
                                          </ins>
                                      </div>
                                    </div>
                                    <div class="product-review">
                                          <div class="add-cart">
                                               <a href="#" class="like1"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                          </div>
                                          <div class="add-cart">
                                               <a href="#" class="like2"><i class="fa fa-heart-o"></i></a>
                                          </div>
                                          <div class="add-cart">
                                               <a href="#" class="like3"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                          </div>
                                    </div>
                                </li> <!-- /product-item -->
                          </ul>
                        </div> <!-- /product-content -->
                        <div class="elm-btn">
                           <a href="#" class="themesflat-button outline ol-accent margin-top-40 hvr-shutter-out-horizontal">VIEW MORE</a>
                        </div>

                     </div> <!-- /row -->
                 </div> <!-- /container -->
          </section> <!-- /flat-out-product -->
          {{-- <section class="flat-deal-of-the-week style1">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                            <div class="title-section">
                                <h3 class="our-product-title"><a href="#"> Our Products </a></h3>
                                <h1 class="our-product-main"><a href="#"> Deal Of The Week </a></h1>
                                <div class="our-product-image">
                                     <img src="image/homepage14.png" alt="image">
                                </div>
                            </div> <!-- /title-section -->
                       </div> <!-- /col-lg-12 -->
                       <div class="col-lg-6 col-md-12">
                            <div class="flat-deal-week">
                                 <img src="image/homepage22.png" alt="image">
                                 <div class="flat-counter count-time" data-day="20" data-month="3" data-year="2019" data-hour="12" data-minute="12" data-second="12">
                                        <div class="counter">
                                             <ul>
                                                 <li class="content-counter">
                                                    <div class="wrap-bg">
                                                        <div class="inner-bg days">
                                                             <div class="numb-count numb" data-from="0" data-to="18" data-speed="2000" data-inviewport="yes">18</div>
                                                             <div class="name-count">Day</div>
                                                        </div>
                                                    </div>
                                                 </li>
                                                 <li class="content-counter">
                                                    <div class="wrap-bg">
                                                        <div class="inner-bg hours">
                                                             <div class="numb-count numb" data-from="0" data-to="11" data-speed="2000" data-inviewport="yes">11</div>
                                                             <div class="name-count">Hour</div>
                                                        </div>
                                                    </div>
                                                 </li>
                                                 <li class="content-counter">
                                                    <div class="wrap-bg">
                                                        <div class="inner-bg minutes">
                                                             <div class="numb-count numb" data-from="0" data-to="14" data-speed="2000" data-inviewport="yes">14</div>
                                                             <div class="name-count">Min</div>
                                                        </div>
                                                    </div>
                                                 </li>
                                                 <li class="content-counter">
                                                    <div class="wrap-bg numb">
                                                        <div class="inner-bg seconds">
                                                             <div class="numb-count numb" data-from="0" data-to="47" data-speed="2000" data-inviewport="yes">47</div>
                                                             <div class="name-count">Sec</div>
                                                        </div>
                                                    </div>
                                                 </li>
                                             </ul>
                                        </div> <!-- /counter -->
                        </div> <!-- /flat-counter -->
                            </div> <!-- /flat-deal-week -->
                       </div> <!-- /col-lg-6 -->
                       <div class="col-lg-6 col-md-12">
                           <div class="flat-deal-week-content">
                               <h3 class="deal-week-title"><a href="#"> 51 Eden Valley Riesling 1918</a></h3>
                               <span class="deal-week-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.</span>
                               <span class="flat-dolar">₱22.99</span>
                               <div class="elm-btn">
                                   <a href="#" class="themesflat-button outline ol-accent margin-top-40 hvr-shutter-out-horizontal">BUY NOW</a>
                               </div>
                           </div>
                       </div> <!-- /col-lg-6 -->
                   </div> <!-- /row -->
               </div> <!-- /container -->
          </section> <!-- /flat-deal-our-of-the-week --> --}}
          {{-- <section class="flat-products style1 straight ">
                <div class="container">
                    <div class="row straight">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="flat-latest">
                                <div class="latest-title mb-mgtop0">
                                    <h3><a href="#">Latest Products</a></h3>
                                </div>
                                <div class="flat-next">
                                    <a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                                <article class="post-border post-top">
                                    <div class="featured-post">
                                        <img src="image/homepage28.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Laboure Chardonnay </a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱19.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage29.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Godiva Chocolates Gift</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱28.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage30.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Bertrana Cap Insula Red</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱22.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div> <!-- /col-lg-4 -->
                        <div class="col-lg-4 col-md-4 col-sm-4">
                             <div class="flat-latest">
                                <div class="latest-title title-between">
                                    <h3><a href="#">Top Rated Products</a></h3>
                                </div>
                                <div class="flat-next">
                                    <a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                                <article class="post-border post-top">
                                    <div class="featured-post">
                                        <img src="image/homepage31.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Red Wine Trio 1988</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱22.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage32.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Dreaming Wine Trio</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱28.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage33.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Hall Eighteen Seventy</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱49.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div> <!-- /col-lg-4 -->
                        <div class="col-lg-4 col-md-4 col-sm-4">
                             <div class="flat-latest">
                                <div class="latest-title title-bottom">
                                    <h3><a href="#">Review Products</a></h3>
                                </div>
                                <div class="flat-next">
                                    <a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                                <article class="post-border post-top">
                                    <div class="featured-post">
                                        <img src="image/homepage34.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Brothers Patricia Pinot</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱24.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage35.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> Adelaide Hills Chardonnay</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱49.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                                <article class="post-border post-between">
                                    <div class="featured-post">
                                        <img src="image/homepage36.png" alt="image">
                                    </div>
                                    <div class="content-post">
                                        <div class="post-title">
                                            <span><a href="#"> 51 Eden Valley Riesling 1918</a></span>
                                        </div>
                                        <div class="post-dolar">
                                            <span>₱19.99</span>
                                        </div>
                                        <div class="post-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div> <!-- /col-lg-4 -->
                    </div> <!-- /row -->
                </div> <!-- /container -->
          </section> <!-- /flat-prodcuts -->
          <section class="flat-event style1">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                            <div class="title-section">
                                <h3 class="our-product-title"><a href="#"> Dont't Miss Anything </a></h3>
                                <h1 class="our-product-main"><a href="#"> Upcoming Events </a></h1>
                                <div class="our-product-image-background">
                                     <img src="image/test.png" alt="image">
                                </div>
                            </div> <!-- /title-section -->
                      </div>
                      <div class="col-lg-12">
                          <div class="flat-carousel-box data-effect clearfix" data-gap="30" data-column="4" data-column2="2" data-column3="1" data-dots= "true" data-auto="false">
                            <div class="owl-carousel">
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">14</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>SunDay: 11.30 - 19.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Adgio Vertical Tasting</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>₱28.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">18</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Monday: 9.30 - 15.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Reasons To Be Cheerful</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>₱30.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">27</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Thursday: 9.30 - 11.30 AM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> New Wines For Old?</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>₱22.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">11</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Friday: 8.00 - 11.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Catering For Higher</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>₱18.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">14</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>SunDay: 11.30 - 19.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Adgio Vertical Tasting</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>₱28.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">18</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Monday: 9.30 - 15.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Reasons To Be Cheerful</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$30.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">27</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Thursday: 9.30 - 11.30 AM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> New Wines For Old?</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$22.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">11</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Friday: 8.00 - 11.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Catering For Higher</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$18.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">14</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>SunDay: 11.30 - 19.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Adgio Vertical Tasting</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$28.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">18</h1>
                                            <span>March</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Monday: 9.30 - 15.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Reasons To Be Cheerful</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$30.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">27</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Thursday: 9.30 - 11.30 AM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> New Wines For Old?</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$22.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-member">
                                    <div class="team-border">
                                        <div class="team-title">
                                            <h1 class="title">11</h1>
                                            <span>April</span>
                                        </div>
                                        <div class="team-meta">
                                            <span>Friday: 8.00 - 11.30 PM</span>
                                        </div>
                                        <div class="team-content">
                                            <h2><a href="#"> Catering For Higher</a></h2>
                                        </div>
                                        <div class="team-dolar">
                                            <span>$18.99/Per Person</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /owl-carouse -->
                          </div> <!-- /flat-carousel-box -->
                      </div> <!-- /col-lg-12 -->
                  </div> <!-- /row -->
              </div> <!-- /container -->
          </section> <!-- /flat-event -->
          <section class="flat-new-latest style1">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="title-section">
                                <h3 class="our-product-title"><a href="#"> Our Blog </a></h3>
                                <h1 class="our-product-main"><a href="#"> News Latest </a></h1>
                                <div class="our-product-image">
                                     <img src="image/homepage14.png" alt="image">
                                </div>
                            </div> <!-- /title-section -->
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <article class="post">
                              <div class="featured-post">
                                  <img src="image/homepage44.png" alt="image">
                              </div>
                              <div class="content-post">
                                  <div class="post-title">
                                      <span><a href="#">Restaurant, The Wines</a></span>
                                  </div>
                                  <div class="post-content">
                                      <h3><a href="#">Champagne billecart-Salmon Releases Rare 'Cuvée 200' To Celebrate 200 Years</a></h3>
                                  </div>
                                  <div class="post-meta">
                                      <span><a href="#">May 28, 2018</a></span>
                                  </div>
                                  <div class="post-btn">
                                      <span><a href="#">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
                                  </div>
                              </div>
                          </article>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="content-box">
                              <ul>
                                  <li>
                                      <span class="box-heading"><a href="#">The Wines, Grape Wine</a></span>
                                      <h3 class="box-content"><a href="#">World Wine Awards 2018: Full results now available</a></h3>
                                      <span class="box-meta"><a href="#">June 02, 2018</a></span>
                                  </li>
                                  <li class="box-border">
                                      <span class="box-heading"><a href="#">Restaurant, Grape Wine</a></span>
                                      <h3 class="box-content"><a href="#">Taittinger launches Comtes de Champagne 2007</a></h3>
                                      <span class="box-meta"><a href="#">June 08, 2018</a></span>
                                  </li>
                                  <li class="box-border">
                                      <span class="box-heading"><a href="#">The Wines, Rose</a></span>
                                      <h3 class="box-content"><a href="#">Jefford on Monday: "Fine, fresh wines"</a></h3>
                                      <span class="box-meta"><a href="#">June 12, 2018</a></span>
                                  </li>
                                  <li class="box-border">
                                      <span class="box-heading"><a href="#">Bordeaux, Champagne</a></span>
                                      <h3 class="box-content"><a href="#">Colgate-Palmolive renews with Morz in Malaysia</a></h3>
                                      <span class="box-meta"><a href="#">June 19, 2018</a></span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </section> <!-- /flat-latest --> --}}
</div> <!-- /homepage1 -->
@endsection
