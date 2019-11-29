@extends('layouts.shop')

@section('style')
@endsection


@section('content')

    <main class="main">
        <div class="home-slider-container">
            <div class="home-slider owl-carousel owl-theme owl-theme-light">
                <div class="home-slide">
                    <div class="slide-bg owl-lazy" data-src="{{ asset('shop/') }}/images/slider/1.png" style="background-position:32% center;"></div><!-- End .slide-bg -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 offset-md-7">
                                <div class="home-slide-content slide-content-big">
                                    <h1>Perfumes</h1>
                                    <h3>
                                        <span>up to </span>
                                        <strong>10%</strong>
                                        <span>OFF in the<br>Bundle Order</span>
                                    </h3>
                                    <a href="#" class="btn btn-primary">Shop Now</a>
                                </div><!-- End .home-slide-content -->
                            </div><!-- End .col-lg-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .home-slide -->

                <div class="home-slide">
                    <div class="slide-bg owl-lazy" data-src="{{ asset('shop/') }}/images/slider/2.png" style="background-position:64% center;"></div><!-- End .slide-bg -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 offset-md-1">
                                <div class="home-slide-content slide-content-big">
                                    <h1>Male Perfumes</h1>
                                    <h3>
                                        <span>up to </span>
                                        <strong>10%</strong>
                                        <span>OFF in the<br>Bundle Order</span>
                                    </h3>
                                    <a href="#" class="btn btn-primary">Shop Now</a>
                                </div><!-- End .home-slide-content -->
                            </div><!-- End .col-lg-5 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .home-slide -->
            </div><!-- End .home-slider -->
        </div><!-- End .home-slider-container -->

        <div class="banners-container mb-4 mb-lg-6 mb-xl-8">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="banner">
                            <div class="banner-content">
                                <h3 class="banner-title">Perfume</h3>

                                <a href="#" class="btn">Shop now</a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="{{ asset('shop/') }}/images/banners/1.png" alt="perfumes">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->
                    <div class="col-md-4">
                        <div class="banner">
                            <div class="banner-content">
                                <h3 class="banner-title">Food and <br> Beverege</h3>

                                <a href="#" class="btn">Shop now</a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="{{ asset('shop/') }}/images/banners/2.png" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->
                    <div class="col-md-4">
                        <div class="banner">
                            <div class="banner-content">
                                <h3 class="banner-title">Watches</h3>

                                <a href="#" class="btn">Shop now</a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="{{ asset('shop/') }}/images/banners/watches.png" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .banners-container -->

        <div class="container mb-2 mb-lg-4 mb-xl-5">
            <h2 class="title text-center mb-3">Featured Products</h2>
            <div class="owl-carousel owl-theme featured-products">

                @if (count($fearured) > 0)
                    @foreach ($fearured as $product)
                        <div class="product">
                                <figure class="product-image-container">
                                    <a href="#" class="product-image">
                                        <img src="/storage/product_images/{{$product->cover_image}}" alt="{{$product->name}}">
                                        <img src="/storage/product_images/{{$product->cover_image}}" class="hover-image" alt="{{$product->name}}">
                                    </a>
                                    {{-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><span>Quick View</span></a> --}}
                                    {{-- <span class="product-label label-sale">-20%</span> --}}
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="#">{{$product->name}}</a>
                                    </h2>
                                    <div class="price-box">
                                        {{-- <span class="old-price">₱300</span> --}}
                                        <span class="product-price">₱ {{$product->price}}</span>
                                    </div><!-- End .price-box -->

                                    <div class="product-details-inner">
                                        <div class="product-action">
                                            <a href="#" class="paction add-cart" title="Add to Cart">
                                                <span>Add to Cart</span>
                                            </a>

                                        </div><!-- End .product-action -->
                                    </div><!-- End .product-details-inner -->
                                </div><!-- End .product-details -->
                            </div><!-- End .product -->
                    @endforeach
                @else

                    <h2 class="title text-center mb-3 ">No Featured Products</h2>

                @endif



            </div><!-- End .featured-products -->
        </div><!-- End .container -->

        <div class="promo-section" style="background-image: url({{ asset('shop/') }}/images/promo-bg.jpg)">
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="promo-slider owl-carousel owl-theme owl-theme-light">
                                <div class="promo-content">
                                    <h3>Up to <span>40%</span> Off<br> <strong>Special Promo</strong></h3>
                                    <a href="#" class="btn btn-primary">Comming Soon</a>
                                </div><!-- Endd .promo-content -->

                                <div class="promo-content">
                                    <h3>Up to <span>58%</span> Off<br> <strong>Holiday Promo</strong></h3>
                                    <a href="#" class="btn btn-primary">Comming Soon</a>
                                </div><!-- Endd .promo-content -->
                            </div><!-- End .promo-slider -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .container -->
        </div><!-- End .promo-section -->

        <div class="container mb-2 mb-lg-4 mb-xl-5">
            <h2 class="title text-center mb-3">New Arrivals</h2>
            <h4 class="title text-center mb-3">Comming Soon</h4>

            <div class="owl-carousel owl-theme new-products">

                @if (count($new_arrival)  > 0)
                    @foreach ($new_arrival as $item)
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="#" class="product-image">
                                    <img src="/storage/product_images/{{$item->cover_image}}" alt="{{$item->name}}">
                                    <img src="/storage/product_images/{{$item->cover_image}}" class="hover-image" alt="{{$item->name}}">
                            </a>

                        </figure>
                        <div class="product-details">
                            <h2 class="product-title">
                                <a href="#">{{ $item->name }}</a>
                            </h2>
                            <div class="price-box">
                                <span class="product-price">₱ {{ $item->price }}</span>
                            </div><!-- End .price-box -->

                            <div class="product-details-inner">
                                <div class="product-action">
                                    <a href="#" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-details-inner -->
                        </div><!-- End .product-details -->
                    </div><!-- End .product -->
                    @endforeach
                @endif

            </div><!-- End .featured-products -->
        </div><!-- End .container -->

    </main><!-- End .main -->
@endsection
