@extends('layouts.admin')

@section('styles')
    <style>
        select {
            width: 100%;
        }
    </style>
@endsection

{{-- @section('content')

    <div class="row">

            <div class="col-sm-12">
                    <div class="card card-info mb-4">
                        <section class="card">

                            <form action="{{route('admin.assign')}}" method="POST">



                                {{csrf_field()}}
                                <header class="card-header">
                                    <h2 class="card-title">ASSIGN OFFICER</h2>
                                </header>

                                <div class="card-body" style="padding:10px 0;">
                                        <div class="form-inline">
                                        <label class="mb-2 mr-sm-2 mb-sm-0" for="requests">Quantity</label>
                                        @if ($max == 0)
                                            all user has a Payout officer
                                        @else
                                            <input id="requests" name="requests" type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Quantity" min="1" max="{{$max}}" value="0" required="true">
                                        @endif


                                        <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="officer">To Officer:</label>
                                        <select name="officer" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Seller name" required="true">
                                            <option value="" disabled selected>Choose Seller</option>
                                            @if(count($officer) > 0)

                                                @foreach($officer as $officer)
                                                    <option class="form-control" value="{{$officer->username}}"> {{$officer->name}} | {{$officer->username}}</option>
                                                @endforeach
                                            @else
                                                <option value="" disabled>NO officer FOUND</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">

                                            <button class="btn btn-info modal-confirm" type="submit">submit</button>
                                        </div>
                                    </div>

                            </footer>

                            </form>


                        </section>
                    </div>

                    @include('inc.messeges')
            </div>


            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        <div class="col-sm-8">
                            Payouts Master List
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="invite_list" class="table datatable table-bordered">
                                <thead>
                                    <tr>
                                        <th class=>USER ID</th>
                                        <th class=>NAME</th>
                                        <th class=>ENCASHMENT</th>
                                        <th class=>NUMBER</th>
                                        <th class=>ADDRESS</th>
                                        <th class=>MODE</th>
                                        <th class=>USER DATA</th>
                                        <th class=>STATUS</th>
                                        <th class=>OFFICER</th>
                                        <th class=>ACTION</th>
                                    </tr>
                                    </thead>


                        <tbody>
                                @if(count($requestpayout) > 0)
                                 @foreach($requestpayout as $requestpayout)

                                    <tr>

                                        <td id="user_id">
                                            {{$user = $requestpayout->user_id}} <br>
					    {{$requestpayout->source}}
                                        </td>
                                        <td>
                                            {{$user_name = $requestpayout->name}}
                                        </td>
                                        <td>
                                            {{$user_encashment = $requestpayout->engcashment}}
                                        </td>
                                        <td>
                                            {{$user_number = $requestpayout->number}}
                                        </td>
                                        <td>
                                            {{$user_address = $requestpayout->address}}
                                        </td>
                                        <td class="text-center">
                                            {{$user_mop = $requestpayout->mop}}  <br>
                                            <strong>{{$requestpayout->acc_number}}</strong>
                                        </td>
                                        <td>
                                            <b>Username:</b> {{$requestpayout->username}} <br>
                                            <b>Code:</b> {{$requestpayout->user_code}} <br>
                                        </td>
                                        <td>
                                            {{$user_mop = $requestpayout->status}}
                                        </td>
                                        <td>
                                            {{$user_mop = $requestpayout->officer}}
                                        </td>
                                        <td>
                                                <a href="{{ route('admin_view_request') . '?id=' . $requestpayout->id . '?' . bin2hex($requestpayout->user_code) . '?' . bin2hex($requestpayout->name)  }}" class="btn btn-success">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <h3>No Users Yet</h3>
                                @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@stop --}}

@section('content')
    <div class="card-header text-center">
        <h2>Assign Payout To officer</h2>
    </div>
    <div class="card-body">

        <form action="{{route('admin.assign')}}" method="POST">



                    {{csrf_field()}}

                    <div class="card-body" style="padding:10px 0;">
                            @if ($max == 0)
                                <div class="col-sm-12">
                                        <h3 class="text-center">All user has a Payout officer</h3>
                                </div>
                            @else

                            <div class="form-inline">
                                <div class="col-sm-2 form-inline">
                                        <label class="mb-2 mr-sm-2 mb-sm-0" for="requests">Quantity</label>
                                        <input id="requests" name="requests" type="number" class="form-control" style="color:#000!important;width: 100%;" placeholder="Quantity" min="1" max="{{$max}}" value="0" required="true">

                                </div>
                                <div class="col-sm-5 form-inline">
                                    <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="officer"> To Officer:</label>
                                    <select name="officer" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0"  style="color:#000!important;" placeholder="Seller name" required="true">
                                        <option value="" disabled selected>Choose Seller</option>
                                        @if(count($officer) > 0)

                                            @foreach($officer as $officer)
                                                <option  value="{{$officer->username}}"> {{$officer->name}} | {{$officer->username}}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled>NO officer FOUND</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="col-sm-5 form-inline">

                                    <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="officer">Mode:</label>
                                    <select name="mode" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0"  style="color:#000!important; width: 100%;"  placeholder="Select Mode of Payment" required="true">
                                        <option value="" disabled selected>Select Mode of Payment</option>
                                        @if(count($requestpayout) > 0)
                                            @foreach($requestpayout as $request)
                                                <option value="{{$request->mop}}">{{$request->mop}}</option>

                                            @endforeach
                                        @else
                                            <option value="" disabled>Nothing to assigned</option>
                                        @endif

                                    </select>
                                </div>


                        </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">

                                        <button class="btn btn-info" type="submit">submit</button>
                                    </div>
                                </div>

                            @endif




                    </div>

            </form>
        <hr>
        <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-title">
                            <div class="col-sm-12">
                                <h1 class="text-center">
                                        Not yet assigned Master List
                                </h1>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @if(count($requestpayout) > 0)
                                    @foreach($requestpayout as $request)
                                        <div class="col-sm-4">
                                            <div class="card text-center bg-success">
                                                <div class="card-body">
                                                    @php
                                                        $remaining =  DB::table('Requestpayouts')->where('mop',$request->mop)->where('status','Pending')->get();
                                                        $accepted =  DB::table('Requestpayouts')->where('mop',$request->mop)->where('status','Accepted')->get();
                                                    @endphp
                                                    <h6>{{$request->mop}}</h6>
                                                    <h1>{{ count($remaining) }} / {{ count($accepted) }}</h1>
                                                    <h6>Not assigned yet</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>



@stop

