@extends('layouts.user')

@section('content')
<!-- START WIDGETS -->
<div class="row">

        <div class="col-sm-12">

        @include('inc.messeges')
                <div class="panel panel-default">
                    <div class="panel-title">
                        <div class="col-sm-8">
                            My Payout Task
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="mytask" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class=>USER ID</th>
                                        <th class=>NAME</th>
                                        <th class=>ENCASHMENT</th>
                                        <th class=>NUMBER</th>
                                        <th class=>ADDRESS</th>
                                        <th class=>MODE</th>
                                        <th class=>USER CODE</th>
                                        <th class=>STATUS</th>
                                        <th class=>ACTION</th>
                                    </tr>
                                    </thead>


                        <tbody>
                                @if(count($requestpayout) > 0)
                                 @foreach($requestpayout as $requestpayout)

                                    <tr>

                                        <td id="user_id">
                                            {{$user = $requestpayout->user_id}}
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
                                        <td>
                                            {{$user_mop = $requestpayout->mop}}
                                        </td>
                                        <td>
                                            {{$user_mop = $requestpayout->user_code}}
                                        </td>
                                        <td>
                                            {{$user_mop = $requestpayout->status}}
                                        </td>
                                        <td>
                                            <a href="{{ route('officer_view_request') . '?id=' . $requestpayout->id . '?' . bin2hex($requestpayout->user_code) . '?' . bin2hex($requestpayout->name)  }}" class="btn btn-success">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <h3>No task Yet</h3>
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
    		$('#mytask').DataTable();
	} );
</script>

    <script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>


    

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topRight.js'></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/themes/default.js'></script>

@endsection
