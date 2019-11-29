@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('plugin/editor/editor.css')}}">
@endsection

@section('content')

                @php
                    $Total_income = DB::table('accodes')->sum('prices');
                    $Total_used = DB::table('accodes')->where('status', 'Used')->sum('prices');
                    $user = DB::table('users')->count();
                    $total_payout = DB::table('requestpayouts')->where('status', 'Accepted')->sum('engcashment');
                    $requesting = DB::table('requestpayouts')->where('status', 'Pending')->count();
                    $all_request = DB::table('requestpayouts')->count();
                    $done = DB::table('requestpayouts')->where('status', 'Accepted')->count();
                    $total_pending = DB::table('requestpayouts')->where('status', 'Pending')->sum('engcashment');
                    $total = DB::table('requestpayouts')->sum('engcashment');
                @endphp
                <div class="card-header">
                    <h2>Hi, This is the emerald's Statistic </h2>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="tile tile-success" style="min-height:25px;font-size: 25px;font-weight: bolder;">Users</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h6>REGISTERED USER</h6>
                                    <h1>{{number_format($user)}}</h1>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h6>Used Code Income</h6>
                                    <h1>₱ {{number_format($Total_used)}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="tile tile-success" style="min-height:25px;font-size: 25px;font-weight: bolder;">Payouts</div>
                    </div>



                    <div class="row">
                            <div class="col-lg-6">

                                    <div class="card text-center bg-success">
                                            <div class="card-body">
                                                <h6>Pending Request</h6>
                                                <h1>{{$requesting}}</h1>
                                            </div>
                                        </div>

                            </div>

                            <div class="col-lg-6">

                                    <div class="card text-center bg-success">
                                        <div class="card-body">
                                            <h6>Total Amount of Payout Request</h6>
                                            <h1>₱ {{number_format($total_pending)}}</h1>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-sm-12">
                        <div class="tile tile-success" style="min-height:25px;font-size: 25px;font-weight: bolder;">Success Transaction</div>
                    </div>

                    <div class="row">

                            <div class="col-lg-6">
                                <div class="card text-center bg-success">
                                    <div class="card-body">
                                        <h6>All Transactions</h6>
                                        <h1>{{$done}} / {{$all_request}}</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card text-center bg-success">
                                    <div class="card-body">
                                        <h6>All Payouts</h6>
                                        <h1>{{$total_payout}}</h1>
                                    </div>
                                </div>
                            </div>
                    </div>



                    <div class="col-sm-12">
                        <div class="tile tile-success" style="min-height:25px;font-size: 25px;font-weight: bolder;">Income</div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h6>Created Code Income</h6>
                                    <h1>₱ {{number_format($Total_income)}}</h1>
                                </div>
                            </div>
                        </div>


                            <div class="col-lg-6">
                                <div class="card text-center bg-success">
                                    <div class="card-body">
                                        <h6>Tax on Successful Payouts</h6>
                                        <h1>₱ {{number_format($total_payout * .10)}}</h1>
                                    </div>
                                </div>
                            </div>
                    </div>



                    <div class="col-sm-12">
                            <div class="tile tile-success" style="min-height:25px;font-size: 25px;font-weight: bolder;">Remaining</div>
                        </div>


                    <div class="justify-content-md-center">

                    <div class="col-lg-6 offset-3">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h6>Remaining Fund (if all Payout is done)</h6>
                                    <h1>₱ {{number_format($Total_income - $total)}}</h1>
                                </div>
                            </div>
                    </div>


                    </div>
                </div>

@endsection


@section('scripts')
<script src="{{asset('plugin/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugin/ckeditor/adapters/jquery.js')}}"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
@endsection



