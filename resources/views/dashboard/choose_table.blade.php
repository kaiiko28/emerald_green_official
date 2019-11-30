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
    <h2>Spill Table</h2>
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

                    <form id="claiming" action="{{ route('update_table') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="invoice">

                            <div class="">

                                <div class="col-md-12">

                                    <div class="invoice-address">
                                        @if (! $upline)
                                            <div class="text-center">
                                                <h3>Upline ID Not Found</h3>
                                                <p>Contact Your upline</p>
                                            </div>
                                        @elseif($user->current_table == 'Table 6')
                                            <div class="text-center">
                                                <h1>Congratulation!</h1>
                                                <h3>You've finish the table of exits! Thank you for trusting Emerald Green.</h3>
                                            </div>
                                        @else
                                            <h3>Please ask {{$upline->firstname}} {{$upline->lastname}}</h3>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                        Table Connection Code: <input type="text" class="form-control pull-right" id="connection_code" name="connection_code" placeholder="connection_code" value="" required ></span>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                                </div>
                                            </div>


                                        @endif
                                    </div>

                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection



@section('scripts')



@endsection

