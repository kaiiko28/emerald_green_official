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

            <div class="col-sm-12">
                    <table id="table_list" class="table datatable table-bordered">
                            <thead>
                                <tr>
                                    <th>Table</th>
                                    <th>Table ID</th>
                                    <th>User Count</th>
                                    <th>Users Username</th>
                                    <th>Connectio ID</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(count($tables) > 0)
                                    @foreach($tables as $tables)
                                        <tr>
                                            <td>
                                                @php
                                                $table_users = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->first();
                                                @endphp
                                                {{-- {{ $tables->username }} --}}

                                                {{-- @foreach ($table_users as $user) --}}
                                                    {{$table_users->current_table}}
                                                {{-- @endforeach --}}
                                            </td>
                                            <td>
                                                {{ $tables->current_table_id }}
                                            </td>
                                            <td>
                                                {{ $tables->table_count }}
                                            </td>
                                            <td>
                                                @php
                                                   $table_users = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->get();
                                                @endphp
                                                {{-- {{ $tables->username }} --}}

                                                @foreach ($table_users as $user)
                                                    {{$user->username}},
                                                @endforeach
                                            </td>
                                            <td>
                                                @php
                                                    $table_users = DB::table('tableofexit')->where('current_table_id', $tables->current_table_id)->first();
                                                 @endphp
                                                 {{-- {{ $tables->username }} --}}

                                                 {{-- @foreach ($table_users as $user) --}}
                                                     {{$user->connection_id}}
                                                 {{-- @endforeach --}}
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <h3>No Users Yet</h3>
                                @endif

                            </tbody>
                        </table>
            </div>



@stop



@section('scripts')
    <script>
        $(document).ready( function () {
            $('#table_list').DataTable();
        } );
    </script>
@endsection


