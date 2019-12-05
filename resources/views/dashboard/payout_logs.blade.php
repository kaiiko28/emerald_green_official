@extends('layouts.user')

@section('content')
<!-- START WIDGETS -->
<div class="card-header text-center">
        <h2>My Request Payouts</strong>

        </h2>
    </div>
<div class="card-body">

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="po_list" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Address</th>
                                <th>Mop</th>
                                <th>Account Number</th>
                                <th>Account Status</th>
                                <th>Payout Status</th>
                                <th>Total Incashment</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>


                            @if(count($mypayouts) > 0)
                                @foreach($mypayouts as $mypayouts)

                                    <tr>
                                        <td>
                                            {{$mypayouts->name}}
                                        </td>
                                        <td>
                                            {{$mypayouts->number}}
                                        </td>
                                        <td>
                                            {{$mypayouts->address}}
                                        </td>
                                        <td>
                                            {{$mypayouts->mop}}
                                        </td>
                                        <td>
                                            {{$mypayouts->acc_number}}
                                        </td>
                                        <td>
                                            {{$mypayouts->acc_status}}
                                        </td>
                                        <td>
                                            {{$mypayouts->status}}
                                        </td>
                                        <td>
                                            {{$mypayouts->engcashment}}
                                        </td>
                                        <td>
                                            <a href="{{ route('view_request') . '?id=' . $mypayouts->id . '?' . bin2hex($mypayouts->user_code) . '?' . bin2hex($mypayouts->name)  }}" class="btn btn-success">View</a>
                                        </td>
                                    </tr>
                                @endforeach
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
            $('#po_list').DataTable();
        } );
    </script>
@endsection
