@extends('layouts.app')


@section('styles')
    <script data-ad-client="ca-pub-3914889088866533" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        }
        .input-group-text, .form-control {
            color: #000!important;
            font-weight: bolder!important;
            font-size: 16px;
            letter-spacing: 1px;
        } */

        .flat-get-in-touch input {
            width: auto;
        }
        .form-control {
            width: 100%!important;
        }
    </style>
@endsection

@section('content')

<section class="flat-get-in-touch">
        <div class="container">
            <div class="row">

                @include('inc.messeges')
                <div class="col-md-offset-2 col-lg-8">
                    <div class="title-section">
                        <h3 class="our-product-title"><a href="#"> Member Registration </a></h3>
                        {{-- <h1 class="our-product-main"><a href="#"> Login to  </a></h1> --}}
                        <div class="our-product-image">
                            <img src="{{asset('img/login.png')}}" alt="image">
                        </div>
                    </div> <!-- /title-section -->
                </div>
                <div class="col-md-offset-2 col-lg-8">
                    <!-- <form>
                        <input type="text"  class="mg-bottom-25 left" required="" placeholder="Name*" >
                        <input type="text"  class="mg-bottom-25 right" required="" placeholder="Email" >
                        <textarea name="messages"  required="" placeholder="Messages*"></textarea>
                        <p class="submit-form">
                            <button name="submit" type="submit"  class="submit btn btn-styl hvr-shutter-out-horizontal" >SUBMIT</button>
                        </p>
                    </form>  -->
                    <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2 class="text-center">User Details</h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text md-addon col-form-label">Name: </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="text" aria-label="First name" id="first" name="first" class="form-control @error('name') is-invalid @enderror" value="{{ old('first') }}" placeholder="First Name">
                                                @error('first')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" aria-label="Last name" id="last" name="last"  class="form-control @error('name') is-invalid @enderror" value="{{ old('last') }}" placeholder="Last Name">
                                                @error('last')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon">Birthday: </span>
                                    </div>
                                    <input placeholder="Selected date" type="date" id="date-picker-example birthday" name="birthday" class="form-control" value="{{ old('birthday') }}" >

                                </div>

                                <div class="col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon">Contact no.: </span>
                                    </div>
                                    <input placeholder="09491234567" type="tel" id="contact" name="contact" class="form-control" pattern="[0-9]{11}" value="{{ old('contact') }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">{{ __('E-Mail Address') }} </span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="your_email@email.com">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                                <div class="col-sm-6">


                                        <div class="input-group-prepend">
                                            <span class="input-group-text md-addon">{{ __('Upline Referral code') }}: </span>
                                        </div>
                                        <input id="referral" type="text" class="form-control @error('referral_code') is-invalid @enderror" name="referral" required autocomplete="referral_code" placeholder="Referral Code" value="{{ request()->get('refcode') }}" readonly>

                                            @error('referral_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>
                            </div>


                            <hr>


                            <h2 class="text-center">Account Details</h2>


                                <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text md-addon">{{ __('Activation code') }}: </span>
                                                </div>
                                                {{-- <input id="activation" type="text" class="form-control @error('activation') is-invalid @enderror" name="activation" required autocomplete="activation" placeholder="Activation Code"> --}}
                                                <input id="activation" type="text" class="form-control @error('activation') is-invalid @enderror" name="activation" required autocomplete="activation" placeholder="Activation Code">
                                                    @error('activation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text md-addon">{{ __('Connection code') }}: </span>
                                                </div>
                                                <input id="connection_id" type="text" class="form-control @error('connection_id') is-invalid @enderror" name="connection_id" autocomplete="connection_id" placeholder="Connection ID" value="{{ request()->get('concode') }}" readonly>
                                                    @error('connection_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                        </div>


                                            <div class="col-sm-12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text md-addon">Username: </span>
                                                </div>
                                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" placeholder="Username">

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>


                                        <div class="col-sm-12">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">{{ __('Password') }} </span>
                                            </div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>


                                        <div class="col-sm-12">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text md-addon">{{ __('Confirm Password') }} </span>
                                            </div>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                                        </div>
                                </div>





                            <div class="form-group row mb-0">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary form-control" id="register" style="width:100%;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#register").on('click',function(){
                $.get('{{ route('register') }}', function(data){
                    console.log(data);
                });
            });
        });


    </script>


@endsection
