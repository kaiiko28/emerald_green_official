@extends('layouts.user')
@section('styles')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <style>
        .bordered {
            border: 1px solid #fff;
            padding: 25px 10px;
            margin: 10px 0 10px
        }
        .bg-light {
            color: #000;
            border: 1px solid #000;
        }
    </style>
@endsection

@section('content')


        <div class="card-header" id="container" >
            <h2>
                <span id="header">Table ID: {{$user->current_table_id}}<button class="pull-right btn btn-success" style="float:right;margin: 0;" id="reload">Refresh Table</button></span> </h2>
        </div>
        {{-- @php
            $exiter = DB::table('tableofexit')->where('current_table_id',$user->current_table_id)->first();

            echo $exiter->username
        @endphp --}}


        <div class="card-body" id="toe">
            <div id="content">
                <h2 class="text-center">{{$user->current_table}}</h2>
                {{-- {{$connection->username}} <br> --}}
                {{-- {{$connection->connection_id}} --}}
                {{-- @if (count($tables) > 0)
                    @foreach ($tables as $jtem)
                        @if ($jtem->table_count >= 15)
                            @php
                                $connection_id = DB::table('tableofexit')->where('current_table_id', $jtem->current_table_id)->first();
                            @endphp
                            <p>{{$jtem->current_table_id}} == {{$connection_id->connection_id}}</p>



                        @endif
                    @endforeach
                @endif --}}

                {{-- {{$tables}} --}}
                <span id="users"></span>
                @if (count($user_table) > 0)

                    @php
                        $j = 1;

                        $column = 0;
                    @endphp

                    <div class="row text-center">

                        @foreach($user_table as $user)
                                    @php

                                        $column = $j;
                                        $colspan = 12 / $column;

                                        if ($column == 1) {
                                            $colspan =  12;
                                            $width = 100;
                                        }
                                        if ($column == 2 || $column == 3) {
                                            $colspan =  6;
                                            $width = 50;
                                        }

                                        if ($column == 4 || $column == 5 || $column == 6 || $column == 7) {
                                            $colspan =  3;
                                            $width = 25;
                                        }
                                        if ($column == 8 || $column == 9 || $column == 10 || $column == 11 || $column == 12 || $column == 13 || $column == 14 || $column == 15) {
                                            $colspan = 12.5;
                                            $width = 12.5;
                                        }
                                        if (
                                            $column == 16 || $column == 17 || $column == 18 ||
                                            $column == 19 || $column == 20 || $column == 21 ||
                                            $column == 22 || $column == 23 || $column == 24 ||
                                            $column == 25 || $column == 26 || $column == 27 ||
                                            $column == 28 || $column == 29 || $column == 30 ||
                                            $column == 31
                                                ) {

                                            $colspan = 6.25;
                                            $width = 6.25;
                                        }


                                    @endphp
                                    @php
                                        $user = DB::table('tableofexit')->where('userid',  $user->userid)->first();
                                    @endphp
                                    @if ($column == 1)
                                        @if($user->table_batch != "table top")
                                            @php
                                                DB::table('tableofexit')->where('userid',  $user->userid)->update([
                                                    "table_batch" => 'table top',
                                                ]);
                                            @endphp
                                        @endif

                                    @elseif ($column == 2 || $column == 4 || $column == 5 || $column == 8 || $column == 9 || $column == 10 || $column == 11 || $column == 16 || $column == 17 || $column == 18 || $column == 19 || $column == 20 || $column == 21 || $column == 22 || $column == 23)
                                        @if($user->table_batch != "batch a")
                                            @php
                                                DB::table('tableofexit')->where('userid',  $user->userid)->update([
                                                    "table_batch" => 'batch a',
                                                ]);
                                            @endphp
                                        @endif
                                    @else
                                        @if($user->table_batch != "batch b")
                                            @php
                                                DB::table('tableofexit')->where('userid',  $user->userid)->update([
                                                    "table_batch" => 'batch b',
                                                ]);
                                            @endphp
                                        @endif
                                    @endif
                                    @if ($colspan ==  12 || $colspan ==  6 || $colspan ==  3)

                                    <div class="col-sm-{{$colspan}} bordered  @if($user->username == auth()->user()->username) bg-success @else bg-light  @endif" style="width:{{$width}}%;">{{ $user->username }} <br>{{ $user->current_table_earning }}</div>
                                    @else
                                        <div class="bordered @if($user->username == auth()->user()->username) bg-success @else bg-light @endif" style="width:{{$width}}%;">{{ $user->username }} <br> {{ $user->current_table_earning }}</div>

                                    @endif
                                    @php
                                        $column = $j++;
                                    @endphp


                        @endforeach

                        @while($column < 15)
                            @php

                                $column = $j;
                                $colspan = 12 / $column;

                                if ($column == 1) {
                                    $colspan =  12;
                                    $width = 100;
                                }
                                if ($column == 2 || $column == 3) {
                                    $colspan =  6;
                                    $width = 50;
                                }

                                if ($column == 4 || $column == 5 || $column == 6 || $column == 7) {
                                    $colspan =  3;
                                    $width = 25;
                                }
                                if ($column == 8 || $column == 9 || $column == 10 || $column == 11 || $column == 12 || $column == 13 || $column == 14 || $column == 15) {
                                    $colspan = 12.5;
                                }
                            @endphp

                            @if ($colspan ==  12 || $colspan ==  6 || $colspan ==  3)

                                <div class="bordered col-xs-{{$colspan}} col-sm-{{$colspan}} bg-dark" style="width:{{$width}}%;">OPEN {{ $j }}</div>
                            @else
                                <div class="bordered bg-dark" style="width:{{$colspan}}%;">OPEN {{ $j }}</div>

                            @endif
                            @php
                                $column = $j++;
                            @endphp
                        @endwhile


                    </div>
                @endif

            </div>
        </div>


@stop


@section('scripts')
    <script>
        $("#reload").on('click', function() {
            $("#content").load(location.href + " #toe");
            $("#header").load(location.href + " #header");
        });

        setInterval(function(){

        $("#content").load(location.href + " #toe");
        }, 5000);

        setInterval(function(){

        $("#header").load(location.href + " #header");
        }, 5000);

    </script>


<script type="text/javascript">
    $(document).ready(function(){
        // $.get('getRequest', function(data){
        //     console.log(data);
        // });

        $.ajax({
            type: "GET",
            url: "getRequest",
            success: function(data){
                if ((data.errors)) {
                    console.log(data.errors);
                }
                else {
                    console.log(data);
                    // $('#users').html({
                    //     array.forEach(data => data {
                    //         '<div>' + data.userid + '</div>'
                    //     });
                    // });

                    console.log('asdfasg');
                }

            }
        })


    });




</script>



@stop
