

@extends('layouts.app')



@section('content')

<div class="404-page">
    <section class="flat-error">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="wrap-error text-center">

                        <h1 class="heading-error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>@yield('code')</h1>
                        <h1 class="title-error">@yield('message')</h1>
                        <p><span class="link">@yield('action')</p>
                        {{-- <input type="search" id="search-bug" placeholder="Search..." > --}}

                        {{-- <div class="error-code"></div>
                                    <div class="error-text"  style="color:#fff"></div>
                                    <div class="error-subtext" style="color:#fff"></div>
                                    <div class="error-actions">
                                        <div class="row">

                                        </div>
                                    </div> --}}
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
</div>
@endsection


