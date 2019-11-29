@extends('layouts.user')

@section('content')
<!-- START WIDGETS -->
<div class="row">

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-title">
                <div class="col-sm-8">
                        My Request Payouts
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="invite_list" class="table datatable table-bordered">
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

    var table = document.getElementById("invite_list"), sumVal = 0;

            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
            }

            document.getElementById("invite_earnings").innerHTML = "₱ " + sumVal;

            console.log(sumVal);
            console.log(gross);


            var gross =  {{$UserCaptcha->Earnings}} ;
            var all = sumVal + gross;

            document.getElementById("total_gross").innerHTML = "₱ " + all;

            document.getElementById('encashments').value = all;

    </script>

    <script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>


    <script type="text/javascript">


        (function($) {

            'use strict';

            var datatableInit = function() {
                var $table = $('#datatable-details');

                // format function for row details
                var fnFormatDetails = function( datatable, tr ) {
                    var data = datatable.fnGetData( tr );

                    return [
                        '<table class="table mb-0">',
                            '<tr class="b-top-0">',
                                '<td><label class="mb-0">Invites by this:</label></td>',
                                '<td>' + data[1]+ ' ' + data[2] + '</td>',
                            '</tr>',
                            '<tr>',
                                '<td><label class="mb-0">Direct Invite By this User:</label></td>',
                                '<td>Comming soon</td>',
                            '</tr>',
                        '</table>'
                    ].join('');
                };

                // insert the expand/collapse column
                var th = document.createElement( 'th' );
                var td = document.createElement( 'td' );
                td.innerHTML = '<i data-toggle class="far fa-plus-square text-primary h5 m-0" style="cursor: pointer;"></i>';
                td.className = "text-center";

                $table
                    .find( 'thead tr' ).each(function() {
                        this.insertBefore( th, this.childNodes[0] );
                    });

                $table
                    .find( 'tbody tr' ).each(function() {
                        this.insertBefore(  td.cloneNode( true ), this.childNodes[0] );
                    });

                // initialize
                var datatable = $table.dataTable({
                    dom: '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [ 0 ]
                    }],
                    aaSorting: [
                        [3, 'desc']
                    ]
                });

                // add a listener
                $table.on('click', 'i[data-toggle]', function() {
                    var $this = $(this),
                        tr = $(this).closest( 'tr' ).get(0);

                    if ( datatable.fnIsOpen(tr) ) {
                        $this.removeClass( 'fa-minus-square' ).addClass( 'fa-plus-square' );
                        datatable.fnClose( tr );
                    } else {
                        $this.removeClass( 'fa-plus-square' ).addClass( 'fa-minus-square' );
                        datatable.fnOpen( tr, fnFormatDetails( datatable, tr), 'details' );
                    }
                });
            };

            $(function() {
                datatableInit();
            });

            }).apply(this, [jQuery]);

    </script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topRight.js'></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/themes/default.js'></script>

@endsection
