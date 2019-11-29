@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('subtitle', __("Ang dami mong gusto! Isa isa lang!"))

@section('action')
    <div class="col-md-12">
    <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
