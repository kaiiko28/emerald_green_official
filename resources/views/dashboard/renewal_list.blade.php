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
<div class="row">

    <div class="col-lg-12">
        @php
            $t = date("h")+8;
            $date = date("Y-m-d",strtotime("+8 hours"));

        @endphp
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h1>CAPTCHA RENEWAL CODES</h1>
            </div>
            <div class="tabs">
                    <ul class="nav nav-tabs nav-justified" style="margin:10px 0;">
                            <li class="active"><a href="#tab8" data-toggle="tab" aria-expanded="false">AVAILABLE</a></li>
                            <li class=""><a href="#tab9" data-toggle="tab" aria-expanded="false">USED</a></li>
                        </ul>
            </div>
            <div class="panel-body tab-content">
                <div class="tab-pane active" id="tab8" style="overflow: auto;">
                    <table id="code_list" class="table table-bordered table-responsive">
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


                            @if(count($myrenewal) > 0)
                                @foreach($myrenewal as $code)

                                    <tr>
                                        <td>
                                            {{$code->renewal_code}}
                                        </td>
                                        <td>
                                            {{$code->reseller}}
                                        </td>
                                        <td>
                                            {{$code->prices}}
                                        </td>
                                        <td>
                                            {{ date('F d, Y ---- h:ia',strtotime('+8 hour',strtotime($code->created_at))) }}

                                        </td>
                                        <td>
                                            {{$code->status}}
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab9" style="overflow: auto;">
                    <table id="invite_list" class="table datatable table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>FULL NAME</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>CODE</th>
                            </tr>
                        </thead>

                        <tbody>


                            @if(count($usedrenewal) > 0)
                                @foreach($usedrenewal as $used)
                                    @php
                                        $captcha = DB::table('user_captchas')->where('reactivation_code', $used->renewal_code)->first();
                                        // echo $captcha->username
                                    @endphp
                                    <tr>
                                        @if ($captcha == null)
                                            <td colspan="3" class="text-center">
                                                    This Code Completely Use and
                                                    Renewed to another Code by the user
                                            </td>
                                        @else
                                            @php

                                                $user = DB::table('users')->where('username', $captcha->username)->first();
                                            @endphp
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$captcha->username}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>

                                        @endif

                                        <td>
                                            {{$used->renewal_code}}
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

        <script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topRight.js'></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/themes/default.js'></script>

@endsection
