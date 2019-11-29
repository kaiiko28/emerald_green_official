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
        <div class="panel panel-default ">
            <div class="panel-heading text-center">
                <h1>ACCOUNT ACTIVATION CODES</h1>
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
                                <th>Note</th>
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
                                            {{ date('F d, Y ---- h:ia',strtotime('+8 hour',strtotime($accode->created_at))) }}

                                        </td>
                                        <td>
                                            {{$accode->status}}
                                        </td>
                                        <td>
                                            {{$accode->notice}}
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
                                @if($date > '2019-10-20')
                                <th>Note</th>
                                @endif
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
                                            {{$user->name}}
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
                                        @if($date > '2019-10-20')
                                        <td>
                                            {{$used->notice}}
                                        </td>
                                        @endif
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

    var table = document.getElementById("invite_list"), sumVal = 0;

            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
            }

            document.getElementById("invite_earnings").innerHTML = "₱ " + sumVal;

            console.log(sumVal);
            console.log(gross);


            var gross =  {{$UserCaptcha->Earnings}} ;
            var all = sumVal + gross;

            document.getElementById("total_gross").innerHTML = "₱ " + all;

            document.getElementById('encashments').value = all;

    </script>
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
