@extends('layouts.admin')

@section('styles')


@endsection
@section('content')
<div class="row">
        @include('inc.messeges')
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-title">
                <div class="col-sm-8">
                    USER CHANGE PASSWORD
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="invite_list" class="table datatable table-bordered">
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
                                            {{ $user->name }}
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
<script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>
@endsection




