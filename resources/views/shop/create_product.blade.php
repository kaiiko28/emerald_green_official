@extends('layouts.admin')

@section('styles')
 <style>

    .form-control[disabled], .form-control[readonly] {
        color: #000000;
    }
    .form-control {
        margin: 10px;
        padding: 9px 10px;
        font-size: 18px;
        line-height: 18px;
    }
    .bg-default {
        color: #fff!important;
        background: #ccccccba;
    }
    .form-control {
        margin: 10px;
        padding: 9px 10px;
        font-size: 12px;
        line-height: 18px;
    }
    .panel-title{
        padding: 10px;
    }
    .btn-group.bootstrap-select.form-control.select {
        margin-top: 0;
    }
    .note-editable {
        color: #000;
    }


 </style>
@endsection

@section('content')

    <div class="row">

            <div class="col-sm-12">

                    @include('inc.messeges')

            </div>


    </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-mail-forward"></span> Add new product</h3>
                        <form action="{{ route('shop.product_store') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" style="margin:0" id="officer" name="p_name" required="">
                                    <label class="float-label" for="officer">Product Name</label>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="form-group col-sm-6">
                                            <span class="h1" style="color:#fff;">₱</span> <input type="number" class="form-control text-right" style="margin:0;width:80%; float:right;" id="officer" name="p_price" required>
                                        <label class="float-label" for="officer">Product Price</label>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <span class="h1" style="color:#fff;">₱</span> <input type="number" class="form-control text-right" style="margin:0;width:80%; float:right;" id="officer" name="p_discount">
                                        <label class="float-label" for="officer">Product Discount (optional)</label>
                                    </div>
                                    <div class="form-group col-sm-6 hidden">
                                        <span class="h1" style="color:#fff;">₱</span> <input type="text" class="form-control text-right" style="margin:0;width:80%; float:right;" id="officer" name="preview_image">
                                        <label class="float-label" for="officer">Product preview (optional)</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="block">
                                        <h4>Product Description</h4>
                                        <textarea class="summernote form-control" name="p_disc" style="color:#000!important;" files='true'>

                                        </textarea>
                                    </div>


                                </div>
                                <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            <label class="col-md-3 col-xs-12 control-label" style="margin-right:10px;">Image</label>
                                            <input type="file" class="fileinput btn-primary" name="p_image" id="p_image" accept="image/*" title="Browse Image"/>

                                            </div>

                                            <div class="col-sm-4">
                                                <label class="col-md-3 col-xs-12 control-label">Categories</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <select class="form-control select" name="p_category" style="margin-top:0;">
                                                        <option value="Perfume" selected>Perfume</option>
                                                        <option value="Food">Food</option>
                                                        <option value="Beverage">Beverage</option>
                                                        <option value="Watch">Watch</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">

                                                    <label class="" style="margin-bottom:10px;">view to homepage?</label>
                                                    <label class="check">
                                                        <input type="radio" class="iradio" name="p_feature" value="No" checked="checked"/> NO
                                                    </label>
                                                    <label class="check">
                                                        <input type="radio" class="iradio" name="p_feature" value="Yes"/> YES
                                                    </label>
                                            </div>
                                        </div>
                                </div>

                            </div>

                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>
@stop


@section('scripts')


    <script type="text/javascript" src="{{ asset('dashboard') }}/js/plugins/codemirror/codemirror.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/xml/xml.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/javascript/javascript.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/css/css.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/clike/clike.js"></script>
    <script type='text/javascript' src="{{ asset('dashboard') }}/js/plugins/codemirror/mode/php/php.js"></script>

    <script type="text/javascript" src="{{ asset('dashboard') }}/js/plugins/summernote/summernote.js"></script>


    <script type="text/javascript" src="{{ asset('dashboard') }}/js/plugins/bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="{{ asset('dashboard') }}/js/plugins/bootstrap/bootstrap-select.js"></script>
@stop


