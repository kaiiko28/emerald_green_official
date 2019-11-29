@extends('layouts.admin')

@section('content')


            <div class="card-header text-center">
                <h2>
                    Approved P.O Request Master List</h2>
            </div>

            <div class="card-body">
                <div class="row">
                        <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="po_list" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        {{-- <th class=>ID & SOURCE</th> --}}
                                                        <th class=>NAME</th>
                                                        {{-- <th class=>MODE</th> --}}
                                                        {{-- <th class=>TRANSACTION</th> --}}
                                                        {{-- <th class=>OFFICER</th> --}}
                                                        <th class=>DETAILS</th>
                                                        {{-- <th class=>ACCOUNT</th> --}}
                                                        <th class=>ACTION</th>
                                                    </tr>
                                                    </thead>


                                        <tbody>
                                                @if(count($requestpayout) > 0)
                                                    @foreach($requestpayout as $requestpayout)

                                                    <tr>

                                                        {{-- <td id="user_id">
                                                            <strong>ID: </strong> {{$requestpayout->user_id}} <br><br>
                                        <strong>Source: </strong> {{$requestpayout->source}}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{$requestpayout->name}}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{$requestpayout->mop}}  <br>
                                                            {{$requestpayout->acc_number}}

                                                        </td> --}}
                                                        {{-- <td>
                                                            {{$requestpayout->transaction}}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{$requestpayout->officer}}
                                                        </td> --}}
                                                        {{-- <td>
                                                            <b>Amount:</b> {{$requestpayout->engcashment}} <br>
                                                            <b>Contact:</b> {{$requestpayout->number}} <br>
                                                            <b>Address:</b> {{$requestpayout->address}} <br>
                                                        </td> --}}
                                                        <td>
                                                            {{-- <b>Username:</b> {{$requestpayout->username}} <br>
                                                            <b>Code:</b> {{$requestpayout->user_code}} <br> --}}

                                                            {{$requestpayout->username}}

                                                        </td>

                                                        <td>
                                                            @php
                                                                $receiver = DB::table('users')->where('username',$requestpayout->username)->first();
                                                            @endphp

                                                            {{-- {{$receiver->name}} --}}
                                                            <b>Name:</b> {{$receiver->name}} <br>
                                                            <b>Code:</b> {{$receiver->code}} <br>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $total_encashed = DB::table('requestpayouts')->where('username',$requestpayout->username)->where('source','Invite Earnings')->sum('engcashment');
                                                            @endphp

                                                            {{$total_encashed}}
                                                        </td>
                                                        {{-- <td>
                                                                <a href="{{ route('admin_view_request') . '?id=' . $requestpayout->id . '?' . bin2hex($requestpayout->user_code) . '?' . bin2hex($requestpayout->name)  }}" class="btn btn-success">View</a>
                                                        </td> --}}
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
            </div>


@stop


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#po_list').DataTable();
        } );
    </script>
@endsection
