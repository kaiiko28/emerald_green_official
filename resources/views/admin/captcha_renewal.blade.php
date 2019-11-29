@extends('layouts.admin')
@section('styles')
    <style>
        option.form-control {
            margin: 5px 0;
            padding: 5px;
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-2 col-11 offset-1">

                @include('inc.messeges')

                <div class="card card-bg">
                    <div class="card-header text-center">
                        <h2>Create New Renewal Code</h2>
                    </div>
                    <div class="card-body">

                            <form action="{{route('admin.store_code')}}" method="POST">

                                    {{csrf_field()}}

                                            <div class="form-inline justify-content-md-center">
                                            <label class="mb-2 mr-sm-2 mb-sm-0" for="Quantity">Quantity</label>
                                            <input id="qyt" type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="Quantity" placeholder="Quantity" name="qyt" min="1" required="true">

                                            <label class="mb-3 mr-sm-3 mb-sm-0 text-right" for="email">To Seller:</label>
                                            <select name="reseller" required="true" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Seller Email" required="true">
                                                <option value="" disabled selected>Choose Seller</option>
                                                @if(count($codeseller) > 0 || count($officer) > 0)
                                                    @foreach($codeseller as $codeseller)
                                                        <option class="form-control" value="{{$codeseller->email}}">{{$codeseller->username}} | {{$codeseller->name}}</option>
                                                    @endforeach
                                                    @foreach ($officer as $codeseller)
                                                        <option class="form-control"  value="{{$codeseller->email}}">{{$codeseller->username}} | {{$codeseller->name}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="" disabled>NO codeseller FOUND</option>
                                                @endif
                                            </select>


                                    </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">

                                                <button class="btn btn-info modal-confirm" type="submit">submit</button>
                                                <button class="btn btn-default modal-dismiss">Cancel</button>
                                            </div>
                                        </div>
                                </footer>

                            </form>
                        <hr>
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-title">
                                            <div class="col-sm-12">
                                                <h1 class="text-center">
                                                        Renewal Code Master List
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="">
                                                <table id="code_list" class="table table-bordered">
                                                    <thead>
                                                            <tr>
                                                                <th>code</th>
                                                                <th>Reseller</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if(count($renewalcode) > 0)
                                                                @foreach($renewalcode as $accode)
                                                                    <tr>
                                                                        <td>
                                                                            {{$accode->renewal_code}}
                                                                        </td>
                                                                        <td>
                                                                            {{$accode->reseller}}
                                                                        </td>
                                                                        <td>
                                                                            {{$accode->prices}}
                                                                        </td>
                                                                        <td>
                                                                            {{$accode->status}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        <tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="card-footer text-muted">
                        © @php echo date("Y"); @endphp Copyright. Created by <a href="https://melanieflores-resume.000webhostapp.com/" target="_blank">Melanie Flores</a>
                    </div>
                </div>
            </div>
        </div>


</div>




@stop


@section('scripts')
    <script>
        $(document).ready( function () {
            $('#code_list').DataTable();
        } );
    </script>
@endsection






