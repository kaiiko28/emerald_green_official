@extends('layouts.admin')

@section('styles')


@endsection
@section('content')
<div class="card-header text-center">
    <h2>User Change Password</h2>
</div>
<div class="card-body">
        {{-- @include('inc.messeges') --}}
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="">
                    <table id="user_list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>USERNAME</th>
                                <th>FULL NAME</th>
                                <th>CODE</th>
                                <th>EMAIL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($user) > 0)
                                @foreach($user as $user)
                                    <tr>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ $user->firstname }} {{ $user->lastname }}
                                        </td>
                                        <td>
                                            {{ $user->code }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <th>
                                            <a class="form-control btn btn-warning bg-primary" href="{{ route('admin.edit_password')  . '?id=' . $user->id }}">Change Password</a>
                                        </th>
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


@endsection



@section('scripts')
    <script>
        $(document).ready( function () {
            $('#user_list').DataTable();
        } );
    </script>
@endsection




