@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
@section('subtitle', __("Walang ganyan ngayon try mo ulit mamaya"))

@section('action')
    <div class="col-md-12">
    <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
