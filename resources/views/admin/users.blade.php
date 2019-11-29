@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @include('inc.messeges')

        <div class="panel panel-default">
            <div class="panel-title">
                <div class="col-sm-8">
                    User Captcha Status


                    <div>
                        <a href="{{route('admin.force_reset')}}">
                            <button class="btn btn-success">
                                force reset
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="invite_list" class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th>USER</th>
                                <th>NAME</th>
                                {{-- <th>SOLVED</th>
                                <th>EARNED</th> --}}
                                <th>Incashment</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $user = DB::table('requestpayouts')->get();
                            @endphp
                            @if(count($User_Captchas) > 0)
                                @foreach($User_Captchas as $usercaptcha)

                                    <tr>
                                        <td>
                                            {{ $usercaptcha->username }}
                                        </td>
                                        <td>
                                            {{-- @php
                                                $userdata = DB::table('users')->where('username',$usercaptcha->username)->first();
                                            @endphp
                                            @if($userdata == null)

                                            @else
                                                {{ $userdata->name }}
                                            @endif --}}
                                            {{ $usercaptcha->name }}
                                        </td>
                                        {{-- <td>
                                            {{ number_format($usercaptcha->Solved) }}
                                        </td>
                                        <td>
                                            {{ number_format($usercaptcha->Earnings, 2) }}
                                        </td> --}}
                                        <td>
                                            {{ $usercaptcha->source }}
                                        </td>
                                        {{-- <th>
                                            @if($usercaptcha->encashments == 1500)
                                                Account reached the limit
                                            @else
                                                Active
                                            @endif
                                        </th> --}}
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


@stop


@section('scripts')

    <script type="text/javascript" src="{{asset('/dashboard')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>


    {{-- <script type="text/javascript">


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

    </script> --}}

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topCenter.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topLeft.js'></script>
        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/layouts/topRight.js'></script>

        <script type='text/javascript' src='{{asset('/dashboard')}}/js/plugins/noty/themes/default.js'></script>

@stop
