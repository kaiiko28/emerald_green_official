@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('subtitle', __("Parang feelings nia para sayo... Hindi makita"))

@section('action')
    <div class="col-md-12">
    <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
