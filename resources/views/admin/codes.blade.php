@extends('layouts.admin')
@section('styles')
    <style>
        option.form-control {
            margin: 5px 0;
            padding: 5px;
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <div class="card-header text-center">
        <h2>Create New Code</h2>
    </div>
    <div class="card-body">

        <form action="{{route('admin.store')}}" method="POST">

            {{csrf_field()}}

                <div class="form-inline justify-content-md-center">
                <label class="mb-2 mr-sm-2 mb-sm-0" for="Quantity">Quantity</label>
                <input id="qyt" type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="Quantity" placeholder="Quantity" name="qyt" min="1" required="true">

                <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="email">To Seller:</label>

                <select name="reseller" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Seller Email" required="true">
                    <option value="" disabled selected>Choose Seller</option>
                    @if(count($codeseller) > 0 || count($officer) > 0)
                        @foreach($codeseller as $codeseller)
                            <option class="form-control" value="{{$codeseller->email}}">{{$codeseller->username}} | {{$codeseller->firstname}} {{$codeseller->lastname}}</option>
                        @endforeach
                        @foreach ($officer as $codeseller)
                            <option class="form-control"  value="{{$codeseller->email}}">{{$codeseller->username}} | {{$codeseller->firstname}} {{$codeseller->lastname}}</option>
                        @endforeach
                    @else
                        <option value="" disabled>NO codeseller FOUND</option>
                    @endif
                </select>


            </div>
            <div class="row">
                    <div class="col-md-12 text-right">

                        <button class="btn btn-info modal-confirm" type="submit">submit</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>

        </form>
        <hr>
        <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-title">
                            <div class="col-sm-12">
                                <h1 class="text-center">
                                        Code Master List
                                </h1>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <table id="code_list" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Reseller</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if(count($accodes) > 0)
                                            @foreach($accodes as $accode)
                                                <tr>
                                                    <td>

                                                        @php
                                                            $reseller_name = DB::table('users')->where('email',$accode->reseller)->first();
                                                        @endphp
                                                        @if ($reseller_name == NULL)
                                                            this user doesn't exist
                                                        @else
                                                            {{$reseller_name->firstname}} {{$reseller_name->lastname}}
                                                            {{-- {{$reseller_name->name}} --}}
                                                        @endif


                                                    </td>
                                                    <td>
                                                        {{-- @php
                                                            $sum_of_code = DB::table('accodes')->where('reseller',$accode->reseller)->sum('prices');
                                                        @endphp

                                                        {{$sum_of_code}} --}}


                                                        {{$accode->activation_code}}</td>
                                                    <td>
                                                        {{-- @php
                                                            $count_of_code = DB::table('accodes')->where('reseller',$accode->reseller)->count();
                                                        @endphp --}}

                                                        {{-- {{$count_of_code}} --}}
                                                        {{$accode->prices}}
                                                    </td>
                                                    <td>

                                                            {{$accode->status}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>




@stop


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#code_list').DataTable();
        } );
    </script>
@endsection

