@extends('layouts.admin')

@section('styles')
 <style>

    .form-control[disabled], .form-control[readonly] {
        color: #000000;
    }
    .form-control {
        margin: 10px;
        padding: 9px 10px;
        font-size: 18px;
        line-height: 18px;
    }
    .bg-default {
        color: #fff!important;
        background: #ccccccba;
    }
    .form-control {
        margin: 10px;
        padding: 9px 10px;
        font-size: 12px;
        line-height: 18px;
    }
    .panel-title{
        padding: 10px;
    }


 </style>
@endsection

@section('content')
<!-- START WIDGETS -->

@php
$t = date("h")+8;
$date = date("Y-m-d");
$request_date = $mypayouts->created_at;
$new = date("F d, Y", strtotime($request_date));

@endphp
<div class="row">
        <div class="col-md-12">
            <div class="panel-success bg-default">
                <div @if ($mypayouts->status == 'Pending')
                        class="panel-title bg-warning"
                    @else
                        class="panel-title bg-success"
                    @endif>
                    <h1 style="padding-bottom:0;">REQUEST PAYOUT {{$new}}</strong>
                        <span class="push-down-10 pull-right">
                                Status: {{$mypayouts->status}}
                        </span>
                    </h2>
                </div>
                <div class="panel-body">

                    <!-- INVOICE -->
                    <div class="invoice">

                        <div class="row">
                            <div class="col-md-3">

                                    <div class="invoice-address">
                                            <h4>From</h4>
                                            <h6>EMERALD GREEN</h6>
                                            <p>Valenzuela City 1444</p>
                                            <p><a href="tel:+639562695368" style="color:#fff;">0956 269 5368</a></p>
                                            <p></p>
                                        </div>

                            </div>
                            <div class="col-md-3">

                                <div class="invoice-address">
                                    <h5>To</h5>
                                    <h6>{{$mypayouts->name}}</h6>
                                    <p>{{$mypayouts->address}}</p>
                                    <p>{{$mypayouts->number}}</p>
                                    <p>{{$mypayouts->user_code}}</p>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="invoice-address">
                                    <h5>Request</h5>
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Request Date:</td><td class="text-right">{{$new}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Request Amount:</strong></td><td class="text-right"><strong>₱ {{$mypayouts->sub_total}}</strong></td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="table-invoice" style="overflow:auto;">
                                        <table class="table table-responsiver">
                                            <tr>
                                                <th>Source</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Account Status</th>
                                                <th class="text-center">Balance</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>
                                                        {{$mypayouts->source}}
                                                    </strong>
                                                </td>
                                                <td class="text-center">₱ {{$mypayouts->sub_total}}</td>
                                                <td class="text-center">
                                                    {{$mypayouts->acc_status}}
                                                </td>
                                                <td class="text-center">
                                                    @if ($mypayouts->acc_status == 'Paid')
                                                        0
                                                    @else
                                                        ₱ 210
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($mypayouts->acc_status == 'Paid')
                                                        ₱ {{$mypayouts->sub_total}}
                                                    @else
                                                        ₱ {{$mypayouts->sub_total - 210}}
                                                    @endif

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>Payment Method</h4>

                                <div class="paymant-table text-center">
                                    @if ($mypayouts->mop == 'PALAWAN')
                                        <img src="{{ asset('img/mop/palawan.png') }}" height="100px"/>
                                        <h3>PALAWAN</h3>

                                    @endif
                                    @if ($mypayouts->mop == 'MLUILLER')
                                        <img src="{{ asset('img/mop/mlhuillier.png') }}" height="100px"/>
                                        <h3>MLUILLER</h3>

                                    @endif
                                    @if ($mypayouts->mop == 'GCASH')
                                        <img src="{{ asset('img/mop/gcash.png') }}" height="100px"/>
                                        <h3>GCASH</h3>
                                    @endif
                                    @if ($mypayouts->mop == 'COINS.PH')
                                        <img src="{{ asset('img/mop/coinph.png') }}" height="100px"/>
                                        <h3>COINS.PH</h3>
                                    @endif
                                    @if ($mypayouts->mop == 'PAYMAYA')
                                        <img src="{{ asset('img/mop/paymaya.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'BDO')
                                        <img src="{{ asset('img/mop/bdo.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'BPI')
                                        <img src="{{ asset('img/mop/bpi.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'METRO_BANK')
                                        <img src="{{ asset('img/mop/metrobank.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'EAST WEST')
                                        <img src="{{ asset('img/mop/ew.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'WESTERN_UNION')
                                        <img src="{{ asset('img/mop/western.png') }}" height="100px"/>

                                    @endif
                                    @if ($mypayouts->mop == 'PNB')
                                        <img src="{{ asset('img/mop/pnb.png') }}" height="100px"/>
                                        <h3 class="bg-primary" style="text-align:left; padding: 10px;">Account Number: <span class="pull-right">{{$mypayouts->acc_number}}</span></h3>
                                    @endif
                                    @if ($mypayouts->mop == 'CEBUANA')
                                        <img src="{{ asset('img/mop/cebuana.png') }}" height="100px"/>

                                    @endif

                                </div>

                                <h3>{{$mypayouts->sub_total}}</h3>

                            </div>
                            <div class="col-md-6">
                                <h4>Amount Due</h4>

                                <table class="table table-striped">
                                    <tr>
                                        <td width="200"><strong>Sub Total:</strong></td>

                                        <td class="text-right">
                                            @if ($mypayouts->acc_status == 'Paid')
                                                ₱ {{$mypayouts->sub_total}}
                                            @else
                                                ₱ {{$mypayouts->sub_total - 210}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tax 10%:</strong></td>
                                        <td class="text-right">
                                            @if ($mypayouts->acc_status == 'Paid')
                                                ₱ {{$mypayouts->sub_total * .10}}
                                            @else
                                                ₱ {{($mypayouts->sub_total - 210) * .10}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total Amount:</td><td class="text-right">
                                            @if ($mypayouts->acc_status == 'Paid')
                                                ₱ {{ $mypayouts->sub_total - ($mypayouts->sub_total * .10) }}
                                            @else
                                                ₱ {{ ($mypayouts->sub_total - 210) - (($mypayouts->sub_total - 210) * .10) }}
                                            @endif

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right push-down-20">
                                    <button class="btn btn-success"><span class="fa fa-credit-card"></span> Process Payment</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- END INVOICE -->

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

    <script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>


    <script type="text/javascript">


        (function($) {

            'use strict';

            var datatableInit = function() {
                var $table = $('#datatable-details');

                // format function for row details
                var fnFormatDetails = function( datatable, tr ) {
                    var data = datatable.fnGetData( tr );

                    return [
                        '<table class="table mb-0">',
                            '<tr class="b-top-0">',
                                '<td><label class="mb-0">Invites by this:</label></td>',
                                '<td>' + data[1]+ ' ' + data[2] + '</td>',
                            '</tr>',
                            '<tr>',
                                '<td><label class="mb-0">Direct Invite By this User:</label></td>',
                                '<td>Comming soon</td>',
                            '</tr>',
                        '</table>'
                    ].join('');
                };

                // insert the expand/collapse column
                var th = document.createElement( 'th' );
                var td = document.createElement( 'td' );
                td.innerHTML = '<i data-toggle class="far fa-plus-square text-primary h5 m-0" style="cursor: pointer;"></i>';
                td.className = "text-center";

                $table
                    .find( 'thead tr' ).each(function() {
                        this.insertBefore( th, this.childNodes[0] );
                    });

                $table
                    .find( 'tbody tr' ).each(function() {
                        this.insertBefore(  td.cloneNode( true ), this.childNodes[0] );
                    });

                // initialize
                var datatable = $table.dataTable({
                    dom: '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [ 0 ]
                    }],
                    aaSorting: [
                        [3, 'desc']
                    ]
                });

                // add a listener
                $table.on('click', 'i[data-toggle]', function() {
                    var $this = $(this),
                        tr = $(this).closest( 'tr' ).get(0);

                    if ( datatable.fnIsOpen(tr) ) {
                        $this.removeClass( 'fa-minus-square' ).addClass( 'fa-plus-square' );
                        datatable.fnClose( tr );
                    } else {
                        $this.removeClass( 'fa-plus-square' ).addClass( 'fa-minus-square' );
                        datatable.fnOpen( tr, fnFormatDetails( datatable, tr), 'details' );
                    }
                });
            };

            $(function() {
                datatableInit();
            });

            }).apply(this, [jQuery]);

    </script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topRight.js'></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/themes/default.js'></script>

@endsection
