@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('subtitle', __("Kinalimutan kana. Kaya mag Move on kana din."))

@section('action')
    <div class="col-md-12">
    <button class="btn btn-info btn-block btn-lg" onclick="document.location.href = '{{ route('user.dashboard')}}';">Back to dashboard</button>
    </div>
@endsection
