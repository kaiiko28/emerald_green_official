@extends('layouts.app')

@section('styles')
<script data-ad-client="ca-pub-3914889088866533" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <style>
        /* .form-control {
            display: block;
            width: 100%;
            height: calc(2.19rem + 2px);
            padding: .375rem .75rem;
            font-size: .9rem;
            line-height: 1.6;
            color: #000!important;
            background-color: transparent;
            border: none!important;
            background-clip: padding-box;
            border-bottom: 1px solid #ced4da!important;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        } */
        .flat-get-in-touch input {
            width: auto;
        }
        .form-control {
            width: 100%!important;
        }
        .flat-get-in-touch {
            padding: 90px 0 0 0;
        }
    </style>
@endsection

@section('content')



<section class="flat-get-in-touch">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-section">

                @include('inc.messeges')
                    <h3 class="our-product-title"><a href="#"> User Login </a></h3>
                    {{-- <h1 class="our-product-main"><a href="#"> Login to  </a></h1> --}}
                    <div class="our-product-image">
                        <img src="{{asset('img/login.png')}}" alt="image">
                    </div>
                </div> <!-- /title-section -->
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <!-- <form>
                    <input type="text"  class="mg-bottom-25 left" required="" placeholder="Name*" >
                    <input type="text"  class="mg-bottom-25 right" required="" placeholder="Email" >
                    <textarea name="messages"  required="" placeholder="Messages*"></textarea>
                    <p class="submit-form">
                        <button name="submit" type="submit"  class="submit btn btn-styl hvr-shutter-out-horizontal" >SUBMIT</button>
                    </p>
                </form>  -->
                {{-- <form method="POST" action="{{ route('login') }}"> --}}
                        <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 remember-container">
                                        <div class="form-check text-center">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-7">


                                        {{-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif --}}
                                    </div>
                                </div>
                            </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>
@endsection
