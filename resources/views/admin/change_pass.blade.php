@extends('layouts.admin')

@section('styles')
<style>
    th {
        text-transform: uppercase;
        text-align: left;
        background: #111;
        color: #fff;
    }
    th, td {
        padding: 10px 5px;
    }
    .form-control {
        color: #000!important;
        text-align: center;
    }
</style>

@endsection
@section('content')
<div class="card-header text-center">
    <h2>User Change Password</h2>
</div>
<div class="card-body" style="background:transparent;">
    <div class="registration-box animated fadeInDown" style="padding-top: 50px;">

        <div class="registration-body text-center">
            <div class="registration-title"><strong>{{$user->firstname}} {{$user->lastname}} </strong> forgot its Password?</div>
            <div class="registration-subtitle">Ask them what will be the new password!</div>

            <form action="{{route('admin.update_password')}}" class="form-horizontal" method="post">
            <h3 class="registration-title">Please Confirm the following account details:</h3>
            {{csrf_field()}}

            <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <table class="table-bordered">
                            <tr>
                                <th><strong>Owner Name:</strong></th>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
                            </tr>
                            <tr>
                                <th><strong>account username:</strong></th>
                                <td>{{ $user->username}}</td>
                            </tr>
                            <tr>
                                <th><strong>account email:</strong></th>
                                <td>{{ $user->email}}</td>
                            </tr>
                            <tr>
                                <th><strong>account code:</strong></th>
                                <td>{{ $user->code}}</td>
                            </tr>
                        </table>
                    </div>

            </div>
            <div class="col-sm-12">

                    <br><br>


                    <div class="form-group">

                        <label for="password" class="" style="padding-top: 10px;">{{ __('New Password') }}</label>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                {{-- <input type="password" placeholder="Password" id="password" class="masked" name="password" /> --}}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <div class="hidden" style="display:none;">
                                    <input type="text" name="code" value="{{ $user->code}}">
                                </div>
                                <br>
                                <br>
                                <div class="form-group push-up-20">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-warning btn-block">UPDATE</button>
                                        <a href="{{ route('admin.user_password') }}" class="btn btn-danger btn-block">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection


@section('scripts')
@endsection



