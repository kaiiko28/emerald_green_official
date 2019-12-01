@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
@section('subtitle', __("Seems like you have problem with your account. Try to return to your dashboard. If problem persist consult our customer service"))

@section('action')
    <div class="col-md-12">
        <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
