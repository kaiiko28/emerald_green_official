@extends('layouts.admin')

@section('content')

    <div class="row">

            <div class="col-sm-12">

                    @include('inc.messeges')

            </div>


            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        <div class="col-sm-8">
                            Product Master List

                            <a href="{{ route('shop.product_add')}}" class="btn btn-success">Add New</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="product_list" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class=>PRODUCT CODE</th>
                                        <th class=>NAME</th>
                                        <th class=>PRICE</th>
                                        <th class=>ACTION</th>
                                    </tr>
                                    </thead>


                        <tbody>
                                @if(count($products) > 0)
                                 @foreach($products as $products)

                                    <tr>

                                        <td id="user_id">
                                            {{$user = $products->product_code}}
                                        </td>
                                        <td>
                                            {{$user_name = $products->name}}
                                        </td>
                                        <td>
                                            {{$user_encashment = $products->price}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin_view_request') . '?id=' . $products->id }}" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                    <tr>
                                        <th class=>PRODUCT CODE</th>
                                        <th class=>NAME</th>
                                        <th class=>PRICE</th>
                                        <th class=>ACTION</th>
                                    </tr>
                            </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@stop


@section('scripts')
<script>
    $(document).ready( function () {
        $('#product_list').DataTable();
    } );
</script>


        <script src="{{asset('admin/vendor/select2/js/select2.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>

@stop


