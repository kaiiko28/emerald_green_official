@extends('layouts.user')

@section('styles')
    <style>
        .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus {
            border: 0px;
            border-top: 2px solid #33414E;
            background: #014802;
            -moz-border-radius: 3px 3px 0px 0px;
            -webkit-border-radius: 3px 3px 0px 0px;
            border-radius: 3px 3px 0px 0px;
            color: #fff;
            font-weight: bolder;
        }
        .nav-tabs.nav-justified > li > a:hover {
            border-color: #33414E;
            background: #7ef010;
        }
    </style>
@endsection



@section('content')
<!-- START WIDGETS -->

<div class="card-header text-center">
    <h2>MY PURCHASED ACTIVATION CODES</h2>
</div>
<div class="card-body">

    <div class="col-lg-12">
        @php
            $t = date("h")+8;
            $date = date("Y-m-d",strtotime("+8 hours"));

        @endphp
        <div class="panel panel-default ">
            <div class="tabs">
                {{-- <ul class="nav nav-tabs nav-justified" style="margin:10px 0;">
                    <li class="active"><a href="#tab8" data-toggle="tab" aria-expanded="false">AVAILABLE</a></li>
                    <li class=""><a href="#tab9" data-toggle="tab" aria-expanded="false">USED</a></li>
                </ul> --}}
                <ul class="nav nav-tabs  nav-justified" id="myTabMD" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#tab8" role="tab" aria-controls="tab8"
                        aria-selected="true">AVAILABLE CODES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#tab9" role="tab" aria-controls="tab9"
                        aria-selected="false">USED CODE</a>
                    </li>
                </ul>
            </div>

            <div class="panel-body tab-content">
                <div class="tab-pane active" id="tab8" style="overflow: auto;">
                    <table id="code_list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Reseller Email</th>
                                <th>Price</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>


                            @if(count($accodes) > 0)
                                @foreach($accodes as $accode)

                                    <tr>
                                        <td>
                                            {{$accode->activation_code}}
                                        </td>
                                        <td>
                                            {{$accode->reseller}}
                                        </td>
                                        <td>
                                            {{$accode->prices}}
                                        </td>
                                        <td>
                                            {{ date('F d, Y',strtotime('+8 hour',strtotime($accode->created_at))) }} <br>
                                            {{ date('h:ia',strtotime('+8 hour',strtotime($accode->created_at))) }}

                                        </td>
                                        <td>
                                            {{$accode->status}}
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab9">
                    <table id="used_list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>USER FULL NAME</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>CODE</th>
                            </tr>
                        </thead>

                        <tbody>


                            @if(count($usedcode) > 0)
                                @foreach($usedcode as $used)
                                    @php
                                        $user = DB::table('users')->where('code', $used->activation_code)->first();
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$user->firstname}} {{$user->lastname}}
                                        </td>
                                        <td>
                                            {{$user->username}}
                                        </td>
                                        <td>
                                            {{$user->username}}
                                        </td>
                                        <td>
                                            {{$user->code}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



@section('scripts')
    <script>
        $('#code_list').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false
        } );
    </script>
    <script>
        $('#used_list').DataTable();
    </script>
@endsection
