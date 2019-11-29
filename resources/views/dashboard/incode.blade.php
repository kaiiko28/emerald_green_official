@extends('layouts.user')

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('content')

    <div class="card-header text-center">
        <h2>CAPTCHA SOLVING</h2>
    </div>


    <div class="row">
            <div class="col-sm-8 col-xs-12 pull-right">

                    <div  id="reached" class="panel-body text-center">
                            @php
                                $t = date('Y-m-d H:i:s');
                                $date = date("Y-m-d",strtotime("+8 hours"));
                                $lastincode = $user_captchas->last_incode;
                                $last = date_format(new DateTime($lastincode),"Y-m-d");
                                $lasttype = date_format(new DateTime($lastincode),"Y-m-d -- h:i:sa");
                                $now = date('Y-m-d H:i:s',strtotime("+8 hours"));


                                // echo $t;
                                // echo '<br>';
                                // echo $now;
                            @endphp
                            {{-- @if($last == $now) --}}
                                @if($user_captchas->Solved < 500)
                                    <form id="reload" style=" background:#fff;">
                                        {{csrf_field()}}

                                            <div class="col-sm-12 CursiveOption" id="incode" style="padding: 10px;">


                                                @php
                                                        $n=rand(4, 5);
                                                        $characters = '1234567890';
                                                        $randomString = '';

                                                        for ($i = 0; $i < $n; $i++) {
                                                            $index = rand(0, strlen($characters) - 1);
                                                            $randomString .= $characters[$index];
                                                        }

                                                        $textsize = '<font size="50px" face="Arial">' . $randomString . '</font>';
                                                        $htmlchar = '<font>';

                                                        $newtext = strip_tags($textsize, $htmlchar);
                                                        $img = imagecreate(300, 70);

                                                        // $font = imageloadfont( 'public/cursiveOption.ttf' );
                                                        $textbgcolor = imagecolorallocate($img, 255, 255, 255);
                                                        $textcolor = imagecolorallocate($img, 200, 0, 50);
                                                        $font = base_path('resources/views/dashboard/fonts/Crystal.ttf');


                                                        // imagestring($img, $font, 180, 200, $randomString, $textcolor);
                                                        imagettftext($img, 60, 0, 0, 60, $textcolor, $font, $randomString);
                                                        ob_start();
                                                        imagepng($img);
                                                        $capt = printf('<img src="data:image/png;base64,%s"/ width="300px" style="margin: 0 auto;" id="capt">', base64_encode(ob_get_clean()));

                                                    // echo getName($n);
                                                @endphp




                                                <input type="text" id="challenge" value="{{$randomString}}" readonly style="color:black; display:hidden;" hidden>
                                                <input type="text" id="solving" class="form-control" tabindex="1" autocomplete="off" style="font-size: 40px;height: auto;text-align: center;font-weight: bolder; color: #000!important; margin-top:20px;">

                                            </div>
                                            <div class="col-sm-12">

                                                    <button type="button" id="solve" class="btn btn-primary disable-btn">Submit</button>
                                                    {{-- <button id="reload-div" class="btn btn-warning disable-btn" value="reload">Reload</button> --}}


                                                    {{-- <input type="button"> --}}
                                            </div>
                                    </form>


                                @else
                                    <h1>YOU REACH 700 ENCODE</h1>
                                    @if($now != $last)
                                        <a class="btn btn-success" href="{{ route('user.reset_incode') . '?user_id=' . Auth::user()->id }}">RESET</a>
                                    @else
                                        <p>WAIT TILL THE RESET BUTTON WILL APPEAR</p>
                                    @endif

                                @endif


                            {{-- @else
                                <h1 style="color:#fff">It's a new day! Lets start the day with fresh and warm encoding!</h1>
                                <div class="center">
                                    <img class="animated tada infinite" style="transition-delay:5s;" src="{{ asset('logo.png') }}" alt="" width="50%">
                                </div>
                                <a class="btn btn-success" href="{{ route('user.reset_incode') . '?user_id=' . Auth::user()->id }}">FRESHEN UP!</a>
                            @endif --}}

                        </div>

            </div>
            <div class="col-sm-4"  id="status" style="margin-top:10px;">
                <div class="col-md-12">
                    <div class="card text-center bg-success">
                        <div class="card-body">
                            <h4>Solved: ₱ <span id="earning-points"></span></h4>

                        </div>
                    </div>

                </div>
                <hr>
                <div class="col-md-12">

                    <div class="card text-center bg-success">
                        <div class="card-body">
                            <h4>Remaining: <span id="remaining-incode"></span> captcha</h4>

                        </div>
                    </div>


                </div>
            </div>
    </div>








            <!-- END PROJECTS BLOCK -->

@stop


@section('scripts')

<script>

        $("#solving").focus();
        $("#solving").click();
        // $("#solving").prompt("tap"); //jQuery Mobile

        document.getElementById("earning-points").innerHTML = decimal({{ $user_captchas->Earnings }});
        // document.getElementById("solve-today").innerHTML = formatNumber({{ $user_captchas->Solved }});
        document.getElementById("remaining-incode").innerHTML = formatNumber({{ $user_captchas->captcha_count }});
        function decimal(num) {
            return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }
        // $('#earning-points').html(data.Earnings);
        // $('#solve-today').html(data.Solved);
    </script>


<script type="text/javascript">
        $(document).ready(function(){
            $("#solve").on('click', function() {
                event.preventDefault();
                $.ajax({
                type: 'POST',
                url: 'validate',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'challenge' : $('#challenge').val(),
                    'solving' : $('#solving').val(),
                },
                success: function(data){
                    if ((data.errors)) {
                        // $('.error').removeClass('hidden');
                    } else {

                    console.log('sdfsfdgsdfg');
                    console.log( data.Earnings);
                    console.log( data.Solved);
                        if (data.Solved <= 500) {
                            $('#earning-points').html(data.Earnings);
                            $('#solve-today').html(data.Solved);
                            $('#remaining-incode').html(data.captcha_count);


                            $("#incode").load(location.href + " #incode");

                            $("#solving").focus();
                            $("#solving").click();
                            // $("#solving").prompt("tap"); //jQuery Mobile
                        }
                        if(data.Solved >= 500) {
                            $('#reached').html(
                            "<h1>YOU REACH 700 ENCODE</h1>" +
                            @if($now != $last)
                                "<a class='btn btn-success' href='{{ route('user.reset_incode') . '?user_id=' . Auth::user()->id }}'>RESET</a>"
                            @else
                                "<p>WAIT TILL THE RESET BUTTON WILL APPEAR</p>"
                            @endif
                            )
                        }
                        if ($('#challenge').val() != $('#solving').val()) {
                            console.log('WRONG');

                            $('.error').removeClass('hidden');

                            $("#incode").load(location.href + " #incode");
                        }


                    }
                    }

                });
            });
        });


</script>





{{-- <script type="text/javascript">

    function reload()
    {
    img = document.getElementById("capt");
    img.src="{{ captcha_src('flat') . '?v=1.1' }}"  + Math.random();
    }

</script> --}}
@stop
