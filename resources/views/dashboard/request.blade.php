@extends('layouts.user')

@section('styles')
 <style>
    .form-control[disabled], .form-control[readonly] {
        color: #000000!important;
    }
    .form-control {
        margin: 0px!important;
        padding: 9px 10px;
        font-size: 18px;
        line-height: 18px;
        color: #000000!important;
    }
    .bg-default {
        color: #fff!important;
        background: #ccccccba;
        margin-bottom: 20px;
    }
    .form-control {
        margin: 10px;
        padding: 9px 10px;
        font-size: 12px;
        line-height: 18px;
    }
    .account {
        width: 100%!important;
        height: 36px!important;
        opacity: 1!important;
        background: #f9f9f9!important;
        padding: 9px 10px!important;
        font-size: 12px!important;
        line-height: 18px!important;

        font-weight: bolder;
    }
    .form-material .radio-material {
        padding-right: 0;
    }
    .form-material .radio-material .outer {
        margin: 0 auto;
    }
    .invoice .invoice-address h3 {
        font-weight: 700;
        font-size: 18px;
        line-height: 20px;
        margin-bottom: 20px;
    }
    .invoice .table-invoice {
        margin: 0 0 50px;

    }
    label {
        cursor: pointer;
    }

 </style>
@endsection

@section('content')
<!-- START WIDGETS -->

<div class="card-header text-center">
    <h2>REQUEST <strong>ENCASHMENT</strong>

    </h2>
</div>
<div class="card-body">
    <div class="row">
        @php
        $t = date("h")+8;
        $date = date("Y-m-d");
        $new = date("F d, Y", strtotime($date));

        @endphp
        <div class="col-md-12">
            <div class="panel-success">

                <div class="panel-body">

                    <form id="claiming" action="{{ route('submit') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="text-center">
                            @php
                                $acc_status = DB::table('accodes')->where('activation_code', auth()->user()->code)->value('notice');
                                $t = date("h")+8;
                                $date = date("Y-m-d");
                            @endphp

                        </div>
                            <!-- INVOICE -->
                        <div class="invoice">

                            <div class="">

                                <div class="col-md-12">

                                    <div class="invoice-address">
                                        <h3>Account Code: {{auth()->user()->code}}</h3>
                                        <div class="row">
                                                <div class="col-sm-4">
                                                        Account Name: <input type="text" class="form-control pull-right" id="fullName" name="fullName" placeholder="" value="{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}" required ></span>
                                                </div>

                                                <div class="col-sm-4">
                                                        Payout Address: <input type="text" class="form-control pull-right" id="Adress" name="Address" placeholder="Address" required>
                                                </div>
                                                <div class="col-sm-4">
                                                        Contact Number: <input type="number" class="form-control pull-right" id="number" name="number" placeholder="Contact Number" required>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <h3>Request</h3>
                                            <div class="invoice-address">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>Request Date:</td><td class="text-right">{{$new}}</td>
                                                    </tr>
                                                    <tr class="bg-primary">
                                                        <td colspan="2" class="text-center">
                                                            <strong>Navigate the Number to view the calculation</strong>

                                                        </td>
                                                    </tr>
                                                    <tr>


                                                            @php
                                                                $source = "";

                                                            @endphp
                                                            @if(request()->get('source') == "Captcha Earnings" || request()->get('source') == "Table of Exit Earnings")
                                                                <td style="vertical-align: middle;">
                                                                    <strong>Request Amount:</strong>
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                        <input type='number' class='form-control' id='request' min='1' max='{{ request()->get('encashments') }}' value='0' required> of {{request()->get('encashments')}}
                                                                </td>


                                                            @elseif (request()->get('source') == "Captcha and Table of Exit Earnings")
                                                                <td  colspan="2" style="vertical-align: middle;">
                                                                    <table style="border: none;">
                                                                        <tr>
                                                                            <td style="border: none;background:none">
                                                                                <strong>Captcha Eanings:</strong>
                                                                            </td>
                                                                            <td style='border: none;background:none'>
                                                                                <input type='number' class='form-control' id='captcha' name="captcha" min='1' max='{{$UserCaptcha->Earnings }}' value='0' required> of {{$UserCaptcha->Earnings}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong>Table of Exit Eanings:</strong>
                                                                            </td>
                                                                            <td>
                                                                                <input type='number' class='form-control' id='table' name="table" min='500' max='{{$table->current_table_earning}}' value='0' required> of {{$table->current_table_earning}}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td  colspan="2" style="vertical-align: middle;"><input id="confirm" type="button" class="btn btn-success" value="Confirm Value"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>

                                                            @else
                                                                <td style="vertical-align: middle;">
                                                                    <strong>Request Amount:</strong>
                                                                </td>
                                                                <td style="vertical-align: middle;">
                                                                        <input type='number' class='form-control' id='request' min='1' max='{{ request()->get('encashments') }}' value='0' required> of {{request()->get('encashments')}}
                                                                </td>
                                                            @endif

                                                    </tr>
                                                </table>

                                            </div>

                                        </div>
                                        <div class="col-md-6" style="display:none;" type="hidden">

                                            <h3>Details</h3>
                                            <div class="table-invoice table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Source</th>
                                                        <th class="text-center">Amount</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                {{ request()->get('source') }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">₱  <span id="encashment"></span></td>

                                                        <td class="text-center">
                                                                ₱ <span id="total"></span>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <h3>Amount Due</h3>

                                            <table class="table table-striped">
                                                <tr>
                                                    <td width="200"><strong>Sub Total:</strong></td>

                                                    <td class="text-right">
                                                        ₱ <span id="sub_total">0</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tax 10%:</strong></td>
                                                    <td class="text-right">
                                                        ₱ <span id="sub_tax">0</span>
                                                    </td>
                                                </tr>
                                                <tr class="total">
                                                    <td>Total Amount:</td><td class="text-right">


                                                        <span id="net_total">0</span>

                                                    </td>
                                                </tr>
                                            </table>


                                        </div>

                                        <div class="clearfix col-sm-12" style="border-bottom:1px solid #000; margin:20px auto;"></div>




                                            <div class="col-md-12">

                                                <h4>Choose Payment Method</h4>
                                                <!-- Collapse buttons -->
                                                    <div style="margin-bottom:50px;">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <a class="btn btn-primary" style="width:100%;margin: 0;" data-toggle="collapse" href="#bank" aria-expanded="false" aria-controls="bank">
                                                                    BANKS
                                                                </a>
                                                                <!-- / Collapse buttons -->

                                                                <!-- Collapsible element -->
                                                                <div class="collapse" id="bank">
                                                                    <div class="mt-3">
                                                                        <div class="form-group form-material">
                                                                            <table class="table table-striped table-bordered text-center" style="table-layout:fixed">
                                                                                <tr>
                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="BPI" type="radio" value="BPI" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>
                                                                                            <img class="img-responsive" src="{{ asset('img/mop/bpi.png') }}" height="50px"/>
                                                                                            <h5 >BPI</h5>
                                                                                        </label>

                                                                                    </td>
                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="PNB" type="radio" value="PNB" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>
                                                                                            <img class="img-responsive" src="{{ asset('img/mop/pnb.png') }}" height="50px"/>

                                                                                        <h5 class="text-center">PNB</h5>
                                                                                        </label>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="METRO_BANK" type="radio" value="METRO BANK" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>
                                                                                            <img class="img-responsive" src="{{ asset('img/mop/metrobank.png') }}" height="50px"/>
                                                                                                <h5 class="text-center">METRO BANK</h5>
                                                                                        </label>

                                                                                    </td>
                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="EAST_WEST" type="radio" value="EAST WEST" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>
                                                                                            <img class="img-responsive" src="{{ asset('img/mop/ew.png') }}" height="40px"/>
                                                                                            <h5 class="text-center">EAST WEST</h5>
                                                                                        </label>


                                                                                    </td>
                                                                                </tr>

                                                                                <tr>

                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="PAYMAYA" type="radio" value="PAYMAYA" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>
                                                                                            <img class="img-responsive" src="{{ asset('img/mop/paymaya.png') }}" height="50px"/>
                                                                                        <h5 class="text-center">PAYMAYA</h5>
                                                                                        </label>


                                                                                    </td>
                                                                                    <td>
                                                                                        <label class="radio-material">
                                                                                            <input id="BDO" type="radio" value="BDO" name="mode" required>
                                                                                            <span class="outer"><span class="inner"></span></span>

                                                                                            <img class="img-responsive" src="{{ asset('img/mop/bdo.png') }}" height="50px"/>
                                                                                        <h5 class="text-center">BDO</h5>
                                                                                        </label>

                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                    <a class="btn btn-primary" style="width:100%;margin: 0;" data-toggle="collapse" href="#remitance" aria-expanded="false" aria-controls="remitance">
                                                                            E-Wallet and Remitance Center
                                                                    </a>
                                                                    <div class="collapse" id="remitance">
                                                                        <div class="mt-3">
                                                                            <div class="form-group form-material">
                                                                                <table class="table table-striped table-bordered text-center" style="table-layout:fixed">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="PALAWAN" type="radio" value="PALAWAN" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/palawan.png') }}" height="50px"/>
                                                                                                <h5 >PALAWAN</h5>
                                                                                            </label>

                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="MLUILLER" type="radio" value="MLUILLER" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/mlhuillier.png') }}" height="50px"/>

                                                                                                <h5 class="text-center">MLUILLER</h5>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="COINS.PH" type="radio" value="COINS.PH" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/coinph.png') }}" height="50px"/>
                                                                                                <h5 class="text-center">COINS.PH</h5>
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="GCASH" type="radio" value="GCASH" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/gcash.png') }}" height="40px"/>
                                                                                                <h5 class="text-center">GCASH</h5>
                                                                                            </label>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>

                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="CEBUANA" type="radio" value="CEBUANA" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/cebuana.png') }}" height="50px"/>
                                                                                                <h5 class="text-center">CEBUANA</h5>
                                                                                            </label>

                                                                                        </td>
                                                                                        <td>
                                                                                            <label class="radio-material">
                                                                                                <input id="WESTERN_UNION" type="radio" value="WESTERN UNION" name="mode" required>
                                                                                                <span class="outer"><span class="inner"></span></span>
                                                                                                <img class="img-responsive" src="{{ asset('img/mop/western.png') }}" height="50px"/>
                                                                                                <h5 class="text-center">WESTERN UNION</h5>
                                                                                            </label>


                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h4 class="text-center">
                                                        Account Number:
                                                        <input type="text" name="sending_number" id="sending_number" placeholder="Account Number" class="text-center form-control account" style="border-radius: 5px!important;margin:0!important;"></h4>


                                            </div>

                                            <div class="col-md-6" style="display:none">


                                                <div class="row">
                                                    <div class="row form-group">
                                                        <div class="col-lg-12">
                                                            <div class="form-group text-center">
                                                                <label class="col-form-label" for="user_id">User ID</label>
                                                                <input type="text" readonly class="form-control text-center" value="{{auth()->user()->id}}" id="user_id"  name="user_id" placeholder="" width="50%" style="font-size: 13.6px;font-size: 3.85rem;">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="user_code">user code</label>
                                                                <input readonly  type="text" class="form-control" id="user_code" name="user_code" value="{{auth()->user()->code}}" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="Username">Username</label>
                                                                <input readonly  type="text" class="form-control" id="Username" name="Username" value="{{auth()->user()->username}}" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="acc_status">Account Status</label>
                                                                <input readonly  type="text" class="form-control" id="acc_status" name="acc_status" value="Paid" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="source">Payout Source</label>
                                                                <input readonly  type="text" class="form-control" id="source" name="source" value="@if(request()->get('source') == null)Invite @else{{ request()->get('source') }} @endif" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="sub_value">sub value</label>
                                                                <input readonly  type="number" class="form-control" id="sub_value" name="sub_value" value="" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="encashment_value">Encashment value</label>
                                                                <input readonly  type="number" class="form-control" id="encashment_value" name="encashment_value"  placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="reward_limit">Reward Limit</label>
                                                                <input readonly  type="number" class="form-control" id="reward_limit" name="reward_limit"  value="{{ request()->get('encashments') }}" placeholder="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                    <div class="checkbox-custom chekbox-info">

                                                        <h3 class="bg-danger text-justify" style="padding:10px;">Note: Please double check the details before confirming the button. Emerald Green is not responsible for any mistake data that are stated above,
                                                            Thank you</h3> <br><br>
                                                        <input id="confirm1" value="I had confirm that all details stated above is correct." type="checkbox" name="confirm" required="">
                                                        <label for="confirm1"><h3>Yes I understand</h3></label> <br>
                                                        <input id="confirm2" value="I had confirm that all details stated above is correct." type="checkbox" name="confirm" required="">
                                                        <label for="confirm2"><h3>Yes I Already double Checked all the data</h3></label> <br>
                                                        </div>
                                                </div>
                                                <div class="col-sm-12 text-right">
                                                    <button type="submit" class="btn btn-success form-control">{{ __('Proceed') }}</button>
                                                </div>


                                    </div>
                                </div>
                            </div>


                        </div>


                            <!-- END INVOICE -->
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection



@section('scripts')

<script>
    $(document).on("keypress", "input", function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
    });
</script>

@if (request()->get('source') == "Captcha Earnings" || request()->get('source') == "Table of Exit Earnings" || request()->get('source') == "Invite")
    <script>
        jQuery(function($) {
            $('#encashment').text($('#request').val());

                $('#request').on('input', function() {
                    $('#encashment').text($('#request').val());

                    var subtotal = 0;
                    var tax = 0;
                    var total = 0
                    var encashment = $('#encashment').text();


                    subtotal = encashment;
                    tax = subtotal * .10;
                    total = subtotal - tax;


                    document.getElementById("total").innerHTML =  subtotal;
                    document.getElementById("sub_total").innerHTML =  subtotal;
                    document.getElementById("sub_tax").innerHTML =  tax;
                    document.getElementById("net_total").innerHTML =  total;
                    document.getElementById('sub_value').value = subtotal;
                    document.getElementById('encashment_value').value = total;

                });
        });
    </script>
@else
    <script>
        $( "#confirm" ).on( "click", function() {
            var y = $('#table').val();
            var z = $('#captcha').val();
            var subtotal = +y + +z;

            var tax = 0;
            var total = 0

            tax = subtotal * .10;
            total = subtotal - tax;

            console.log( total );

            document.getElementById("total").innerHTML =  subtotal;
            document.getElementById("sub_total").innerHTML =  subtotal;
            document.getElementById("sub_tax").innerHTML =  tax;
            document.getElementById("net_total").innerHTML =  total;
            document.getElementById('sub_value').value = subtotal;
            document.getElementById('encashment_value').value = total;
        });
    </script>
@endif
<script>
// function myFunction() {
    // var x = document.getElementById("request").value;
    //     document.getElementById("encashment").innerHTML = "You selected: " + x;
    // }




    //function confirm() {
        //var subtotal = 0;
        //var tax = 0;
        //var total = 0
        // var subtotal = encashment;



        //subtotal = total;
        //tax = subtotal * .10;
        //total = subtotal - tax;


        //document.getElementById("total").innerHTML =  subtotal;
        //document.getElementById("sub_total").innerHTML =  subtotal;
        //document.getElementById("sub_tax").innerHTML =  tax;
        //document.getElementById("net_total").innerHTML =  total;
        //document.getElementById('sub_value').value = subtotal;
        //document.getElementById('encashment_value').value = total;

    //}

</script>



@endsection
