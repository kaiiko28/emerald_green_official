{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    @yield('message')
                </div>
            </div>
        </div>
    </body>
</html> --}}





@extends('layouts.app')



@section('content')

<div class="404-page">
    <section class="flat-error">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="wrap-error text-center">

                        @yield('message')
                        <h1 class="heading-error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>404</h1>
                        <h1 class="title-error">Opps! page not found</h1>
                        <p>It looks like nothing was found at this location. Click the link to return <span class="link"><a href="index.html">Home</a></span></p>
                        <input type="search" id="search-bug" placeholder="Search..." >
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
</div>
@endsection

