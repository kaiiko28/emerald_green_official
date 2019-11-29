@extends('layouts.admin')

@section('styles')
    <style>
        select {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="card-header text-center">
        <h2>GU to be assign a table</h2>
    </div>
    <div class="card-body">

        <form action="{{route('admin.update_table')}}" method="POST">



                    {{csrf_field()}}

                    <div class="card-body" style="padding:10px 0;">

                            <div class="form-inline">
                                <div class="col-sm-5 form-inline">
                                    <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="officer"> Assign Grand Upline Table:</label>
                                    <select name="GU" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0"  style="color:#000!important;" placeholder="GU Username" required="true">
                                        <option value="" disabled selected>GU Account</option>
                                        @if(count($GU) > 0)

                                            @foreach($GU as $GU)
                                                <option  value="{{$GU->userid}}"> {{$GU->user_code}} | {{$GU->username}}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled>NO user FOUND</option>
                                        @endif

                                    </select>
                                </div>


                                </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">

                                <button class="btn btn-info" type="submit">Generate Table</button>
                            </div>
                        </div>





                    </div>

            </form>

            {{-- <table id="invite_list" class="table datatable table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Code</th>
                        <th>Current Role</th>
                        <th>Modify Role</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($user) > 0)
                        @foreach($user as $users)
                            <tr>
                                <td>
                                    {{ $users->name }}
                                </td>
                                <td>
                                    {{ $users->username }}
                                </td>
                                <td>
                                    {{ $users->code }}
                                </td>
                                <td>
                                    {{ $users->role }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.role_user') . '?id=' . $users->id }}" class="btn btn-primary bg-primary form-control">User</a><br>
                                    <a href="{{ route('admin.role_Code-seller') . '?id=' . $users->id }}" class="btn btn-success form-control">Code Seller</a><br>
                                    <a href="{{ route('admin.role_officer') . '?id=' . $users->id }}" class="btn btn-warning bg-warning form-control">Payout Officer</a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <h3>No Users Yet</h3>
                    @endif

                </tbody>
            </table> --}}



@stop



@section('scripts')
    <script>
        $(document).ready( function () {
            $('#user_list').DataTable();
        } );
    </script>
@endsection


