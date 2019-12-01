@extends('layouts.admin')

@section('styles')
    <style>
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #fff;
        }
    </style>
@endsection

@section('content')

<div class="card-header text-center">
    <h2>ACCOUNTS</h2>
</div>


<div class="card-body">

        <div class="row">
                <div class="col-sm-12">



                    <div class="panel panel-success tabs bg-dark">


                        <div class="panel-body tab-content">
                                <ul class="nav nav-tabs  nav-justified" id="myTabMD" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#tab8" role="tab" aria-controls="tab8"
                                            aria-selected="true">Users</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#tab9" role="tab" aria-controls="tab9"
                                            aria-selected="false">Code Sellers</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#tab10" role="tab" aria-controls="tab10"
                                            aria-selected="false">Payout Officers</a>
                                        </li>
                                    </ul>
                            {{-- <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#tab8" data-toggle="tab">Users</a></li>
                                <li><a href="#tab9" data-toggle="tab">Code Sellers</a></li>
                                <li><a href="#tab10" data-toggle="tab">Payout Officers</a></li>
                            </ul> --}}


                            <div class="tab-pane active" id="tab8">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="officer_list" class="table table-bordered">
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
                                                @if(count($users) > 0)
                                                    @foreach($users as $users)
                                                        <tr>
                                                            <td>
                                                                {{ $users->firstname }} {{ $users->lastname }}
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

                                                                <a href="{{ route('admin.role_Code-seller') . '?id=' . $users->id }}" class="btn btn-success form-control btn-sm">Code Seller</a><br><br>
                                                                <a href="{{ route('admin.role_officer') . '?id=' . $users->id }}" class="btn btn-warning bg-warning form-control text-dark btn-sm">Payout Officer</a>
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
                            <div class="tab-pane" id="tab9">
                                <div class="table-responsive">
                                    <table id="officer_list" class="table table-bordered">
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
                                            @if(count($codeseller) > 0)
                                                @foreach($codeseller as $codeseller)
                                                    <tr>
                                                        <td>
                                                            {{ $codeseller->firstname }} {{ $codeseller->lastname }}
                                                        </td>
                                                        <td>
                                                            {{ $codeseller->username }}
                                                        </td>
                                                        <td>
                                                            {{ $codeseller->code }}
                                                        </td>
                                                        <td>
                                                            {{ $codeseller->role }}
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="{{ route('admin.role_user') . '?id=' . $codeseller->id }}" class="btn btn-primary bg-primary form-control btn-sm">User</a><br><br>
                                                            <a href="{{ route('admin.role_officer') . '?id=' . $codeseller->id }}" class="btn btn-warning bg-warning form-control text-dark btn-sm">Payout Officer</a>
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
                            <div class="tab-pane" id="tab10">
                                <div class="table-responsive">
                                    <table id="officer_list" class="table table-bordered">
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
                                            @if(count($officer) > 0)
                                                @foreach($officer as $officer)
                                                    <tr>
                                                        <td>
                                                            {{ $officer->firstname }} {{ $officer->lastname }}
                                                        </td>
                                                        <td>
                                                            {{ $officer->username }}
                                                        </td>
                                                        <td>
                                                            {{ $officer->code }}
                                                        </td>
                                                        <td>
                                                            {{ $officer->role }}
                                                        </td>
                                                        <td class="text-center">
                                                                <a href="{{ route('admin.role_user') . '?id=' . $officer->id }}" class="btn btn-primary bg-primary form-control btn-sm">User</a><br><br>
                                                                <a href="{{ route('admin.role_Code-seller') . '?id=' . $officer->id }}" class="btn btn-success form-control btn-sm">Code Seller</a><br><br>

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

            </div>
</div>


@stop



@section('scripts')
    <script>
        $(document).ready( function () {
            $('#officer_list').DataTable();
        } );
    </script>
@endsection
