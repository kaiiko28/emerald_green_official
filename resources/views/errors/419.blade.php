@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('subtitle', __("Hayy, d to kagaya ng marrage contract... Kelangan mo renew.. refresh mo lang naman o kaya balik sa login"))

@section('action')
    <div class="col-md-12">
    <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
