@extends('layouts.user')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/mdb/css/mdb.css') }}">
    <style>

    </style>


@endsection

@section('content')

    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">

                @include('inc.messeges')
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="text-center">You've reach the maximum captcha encoding.</h1>
                    {{-- <h3 class="text-center">Coming soon. ---- CAPTCHA RENEW</h3> --}}
                </div>
                <div class="panel-body text-center" style="padding: 50px 10px">

                    <form action="{{route('user.renewal_validation')}}" method="POST" class="form-group">
                        @csrf

                        <h3 style="color:#fff">Please avail Renewal Code to continue solving</h3>

                        <input type="text"  style="font-size: 40px;height: auto;text-align: center;font-weight: bolder;" class="form-control text-center" name="renew_captcha">

                        <button type="submit" class="btn btn-success"> RENEW MY CAPTCHA </button>

                    </form>
                </div>
                <div class="panel-footer">
                    <h1 class="text-center"><a class="btn btn-lg btn-success text-center" href="{{ route('user.dashboard')}}">Return to Dashboard</a></h1>
                </div>
            </div>

        </div>

    </div>


@stop


@section('scripts')
    <script>
        $('#solve').on('click',function(){
            $('#solve').on('click',function(){
                // let a common class(disable-btn) for each button which should be disabled for on second
                $('.disable-btn').prop('disabled',true);
                setTimeout(function(){
                // enable click after 1 second
                $('.disable-btn').prop('disabled',false);
                },30000);
            });
        });
    </script>
{{-- <script type="text/javascript">
window.onload=function(){
    document.getElementById("my_audio").play();
    }
</script> --}}

{{-- <script src="{{ asset('dashboard.js.ajax.js') }}"></script> --}}

<script>
    $("#solving").focus();
    $("#solving").click();
    $("#solving").prompt("tap"); //jQuery Mobile
</script>




{{-- <script type="text/javascript">

    function reload()
    {
    img = document.getElementById("capt");
    img.src="{{ captcha_src('flat') . '?v=1.1' }}"  + Math.random();
    }

</script> --}}
@stop
