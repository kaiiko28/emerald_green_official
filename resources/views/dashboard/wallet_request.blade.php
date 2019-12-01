@extends('layouts.user')

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

 </style>
@endsection

@section('content')
<!-- START WIDGETS -->
<div class="row">
    @php
    $t = date("h")+8;
    $date = date("Y-m-d");
    $new = date("F d, Y", strtotime($date));

    @endphp
    <div class="col-md-12">
        <div class="panel-success bg-default">

            <div class="panel-body">
                <form id="claiming" action="{{ route('submit') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="text-center">
                        @php
                            $acc_status = DB::table('accodes')->where('activation_code', auth()->user()->code)->value('notice');
                            $t = date("h")+8;
                            $date = date("Y-m-d");
                        @endphp
                        <h2>REQUEST <strong>INVITE ENCASHMENT</strong>

                        </h2>
                    </div>
                        <!-- INVOICE -->
                    <div class="invoice">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="invoice-address">
                                    <h3>Account Details</h3>
                                    <h4>Account Type: <span class="pull-right">{{$acc_status}}</span></h4>

                                    <h4>
                                        <div class="form-group form-inline">
                                                <label class="col-form-label" for="fullName" style="padding-top:10px;">Account Name:</label>
                                                <input type="text" class="form-control pull-right" id="fullName" name="fullName" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" required  style="margin:0; width: 70%;">
                                        </div>

                                    </h4>
                                    <h4>Account Code: <span class="pull-right">{{auth()->user()->code}}</span></h4>

                                    <h4>
                                        <div class="form-group form-inline">
                                            <label class="col-form-label" for="Address" style="padding-top:10px;">Payout Address:</label>
                                            <input type="text" class="form-control pull-right" id="Adress" name="Address" placeholder="Address" required style="margin:0; width: 70%;">
                                        </div>
                                    </h4>
                                    <h4>
                                        <div class="form-group form-inline">
                                            <label class="col-form-label" for="Address" style="padding-top:10px;">Contact Number:</label>
                                            <input type="number" class="form-control pull-right" id="number" name="number" placeholder="Contact Number" required style="margin:0; width: 70%;">
                                        </div>
                                    </h4>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="invoice-address">
                                    <h3>Request</h3>
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Request Date:</td><td class="text-right">{{$new}}</td>
                                        </tr>
                                        <tr class="bg-primary">
                                            <td colspan="2" class="text-center">
                                                <strong>Navigate the Number to view the calculation</strong>
                                                <table style="table-layout:fixed;width:100%">
                                                    <tr>
                                                        <td style="border: 1px solid #ddd;padding:2px;"><strong>Min Incashment: 500</strong></td>
                                                        <td style="border: 1px solid #ddd;padding:2px;"><strong>Max Incashment: 3500</strong></td>
                                                    </tr>
                                                </table>

                                                @if ($acc_status == 'credit')
                                                    Your account will be deducted 200. View calculation for your own risk.
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <strong>Request Amount:</strong>
                                            </td>
                                            <td class="text-right">
                                                    {{-- <strong>₱ {{ request()->get('encashments') }}</strong> --}}
                                                <input type="number" class="form-control" id="request"
                                                @if (request()->get('encashments') < 3500)
                                                    max="{{ request()->get('encashments')}}"
                                                @else
                                                    max="3500"
                                                @endif

                                                    min="500" value="0">
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>

                        <div class="table-invoice table-responsive">
                            <table class="table">
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
                                            {{ request()->get('source') }}
                                        </strong>
                                    </td>
                                    <td class="text-center">₱  <span id="encashment"></span></td>
                                    <td class="text-center">
                                        {{$acc_status}}
                                    </td>
                                    <td class="text-center">
                                        @if ($acc_status == 'Paid')
                                            0
                                        @else
                                            ₱ 200
                                        @endif
                                    </td>
                                    <td class="text-center">
                                            ₱ <span id="total"></span>

                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <h4>Choose Payment Method</h4>
                                <!-- Collapse buttons -->
                                    <div style="margin-bottom:50px;">
                                        <a class="btn btn-primary" style="width:100%" data-toggle="collapse" href="#bank" aria-expanded="false" aria-controls="bank">
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
                                                                                    <input id="BPI" type="radio" value="BPI" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>

                                                                                </label>
                                                                                <br> <br>
                                                                                    <img class="img-responsive" src="{{ asset('img/mop/bpi.png') }}" height="50px"/>
                                                                                <h3 >BPI</h3>
                                                                            </td>
                                                                            <td>
                                                                                <label class="radio-material">
                                                                                    <input id="PNB" type="radio" value="PNB" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>
                                                                                </label>
                                                                                <br> <br>
                                                                                <img class="img-responsive" src="{{ asset('img/mop/pnb.png') }}" height="50px"/>

                                                                                <h3 class="text-center">PNB</h3>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="radio-material">
                                                                                    <input id="METRO_BANK" type="radio" value="METRO BANK" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>
                                                                                </label>
                                                                                <br> <br>
                                                                                <img class="img-responsive" src="{{ asset('img/mop/metrobank.png') }}" height="50px"/>
                                                                                <h3 class="text-center">METRO BANK</h3>
                                                                            </td>
                                                                            <td>
                                                                                <label class="radio-material">
                                                                                    <input id="EAST_WEST" type="radio" value="EAST WEST" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>
                                                                                </label>
                                                                                <br> <br>
                                                                                <img class="img-responsive" src="{{ asset('img/mop/ew.png') }}" height="40px"/>
                                                                                <h3 class="text-center">EAST WEST</h3>

                                                                            </td>
                                                                        </tr>

                                                                        <tr>

                                                                            <td>
                                                                                <label class="radio-material">
                                                                                    <input id="PAYMAYA" type="radio" value="PAYMAYA" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>
                                                                                </label>
                                                                                <br> <br>
                                                                                    <img class="img-responsive" src="{{ asset('img/mop/paymaya.png') }}" height="50px"/>
                                                                                <h3 class="text-center">PAYMAYA</h3>

                                                                            </td>
                                                                            <td>
                                                                                <label class="radio-material">
                                                                                    <input id="BDO" type="radio" value="BDO" name="mode">
                                                                                    <span class="outer"><span class="inner"></span></span>
                                                                                </label>
                                                                                <br> <br>
                                                                                    <img class="img-responsive" src="{{ asset('img/mop/bdo.png') }}" height="50px"/>
                                                                                <h3 class="text-center">BDO</h3>

                                                                            </td>
                                                                        </tr>

                                                                    </table>

                                                                    <h4><input type="text" name="sending_number" id="sending_number" placeholder="Account Number" class="text-center form-control account" style="border-radius: 5px!important;margin:0!important;"></h4>

                                                                </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <a class="btn btn-primary" style="width:100%" data-toggle="collapse" href="#remitance" aria-expanded="false" aria-controls="remitance">
                                                        E-Wallet and Remitance Center
                                                </a>
                                                <div class="collapse" id="remitance">
                                                    <div class="mt-3">
                                                        <div class="form-group form-material">
                                                            <table class="table table-striped table-bordered text-center" style="table-layout:fixed">
                                                                <tr>
                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="PALAWAN" type="radio" value="PALAWAN" name="mode" checked="">
                                                                            <span class="outer"><span class="inner"></span></span>

                                                                        </label>
                                                                        <br> <br>
                                                                            <img class="img-responsive" src="{{ asset('img/mop/palawan.png') }}" height="50px"/>
                                                                        <h3 >PALAWAN</h3>
                                                                    </td>
                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="MLUILLER" type="radio" value="MLUILLER" name="mode">
                                                                            <span class="outer"><span class="inner"></span></span>
                                                                        </label>
                                                                        <br> <br>
                                                                        <img class="img-responsive" src="{{ asset('img/mop/mlhuillier.png') }}" height="50px"/>

                                                                        <h3 class="text-center">MLUILLER</h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="COINS.PH" type="radio" value="COINS.PH" name="mode">
                                                                            <span class="outer"><span class="inner"></span></span>
                                                                        </label>
                                                                        <br> <br>
                                                                        <img class="img-responsive" src="{{ asset('img/mop/coinph.png') }}" height="50px"/>
                                                                        <h3 class="text-center">COINS.PH</h3>
                                                                    </td>
                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="GCASH" type="radio" value="GCASH" name="mode">
                                                                            <span class="outer"><span class="inner"></span></span>
                                                                        </label>
                                                                        <br> <br>
                                                                        <img class="img-responsive" src="{{ asset('img/mop/gcash.png') }}" height="40px"/>
                                                                        <h3 class="text-center">GCASH</h3>

                                                                    </td>
                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="CEBUANA" type="radio" value="CEBUANA" name="mode">
                                                                            <span class="outer"><span class="inner"></span></span>
                                                                        </label>
                                                                        <br> <br>
                                                                            <img class="img-responsive" src="{{ asset('img/mop/cebuana.png') }}" height="50px"/>
                                                                        <h3 class="text-center">CEBUANA</h3>

                                                                    </td>
                                                                    <td>
                                                                        <label class="radio-material">
                                                                            <input id="WESTERN_UNION" type="radio" value="WESTERN UNION" name="mode">
                                                                            <span class="outer"><span class="inner"></span></span>
                                                                        </label>
                                                                        <br> <br>
                                                                            <img class="img-responsive" src="{{ asset('img/mop/western.png') }}" height="50px"/>
                                                                        <h3 class="text-center">WESTERN UNION</h3>

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- / Collapsible element -->
                                    </div>


                            </div>

                            <div class="col-md-6">
                                <h4>Amount Due</h4>

                                <table class="table table-striped">
                                    <tr>
                                        <td width="200"><strong>Sub Total:</strong></td>

                                        <td class="text-right">
                                            ₱ <span id="sub_total"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tax 10%:</strong></td>
                                        <td class="text-right">
                                            ₱ <span id="sub_tax"></span>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total Amount:</td><td class="text-right">


                                            <span id="net_total"></span>

                                        </td>
                                    </tr>
                                </table>

                                <div class="row">
                                        <div class="row form-group hidden">
                                                <div class="col-lg-12">
                                                    <div class="form-group text-center">
                                                        <label class="col-form-label" for="user_id">User ID</label>
                                                        <input type="text" readonly class="form-control text-center" value="{{ request()->get('user_id') }}" id="user_id"  name="user_id" placeholder="" width="50%" style="font-size: 13.6px;font-size: 3.85rem;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="user_code">user code</label>
                                                        <input readonly  type="text" class="form-control" id="user_code" name="user_code" value="{{ request()->get('user_code') }}" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="Username">Username</label>
                                                        <input readonly  type="text" class="form-control" id="Username" name="Username" value="{{ request()->get('username') }}" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="acc_status">Account Status</label>
                                                        <input readonly  type="text" class="form-control" id="acc_status" name="acc_status" value="{{$acc_status}}" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="source">Account Status</label>
                                                        <input readonly  type="text" class="form-control" id="source" name="source" value="{{ request()->get('source') }}" placeholder="" required>
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
                                                        <label class="col-form-label" for="source">Source</label>
                                                        <input readonly  type="text" class="form-control" id="source" name="source" value="{{ request()->get('source') }}" placeholder="" required>
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
                                            <button type="submit" class="btn btn-warning">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
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
                </form>
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
<script>
// function myFunction() {
    // var x = document.getElementById("request").value;
    //     document.getElementById("encashment").innerHTML = "You selected: " + x;
    // }

    jQuery(function($) {
    $('#encashment').text($('#request').val());

        $('#request').on('input', function() {
            $('#encashment').text($('#request').val());

            var subtotal = 0;
            var tax = 0;
            var total = 0
            var encashment = $('#encashment').text();


            if ('{{$acc_status}}' == 'Paid'){
                subtotal = encashment;
                tax = subtotal * .10;
                total = subtotal - tax;
            }

            else {
                subtotal = encashment - 200;
                tax = subtotal * .10;
                total = subtotal - tax;
            }

            document.getElementById("total").innerHTML =  subtotal;
            document.getElementById("sub_total").innerHTML =  subtotal;
            document.getElementById("sub_tax").innerHTML =  tax;
            document.getElementById("net_total").innerHTML =  total;
            document.getElementById('sub_value').value = subtotal;
            document.getElementById('encashment_value').value = total;

        });
    });
</script>



@endsection
