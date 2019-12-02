@extends('layouts.admin')

@section('styles')


@endsection
@section('content')
<div class="card-header text-center">
    <h2>User Change Password</h2>
</div>
<div class="registration-container" style="background:transparent;">
    <div class="registration-box animated fadeInDown" style="padding-top: 50px;">

        <div class="registration-body bg-success">
            <div class="registration-title"><strong>{{$user->name}} </strong> forgot its Password?</div>
            <div class="registration-subtitle">Ask them what will be the new password!</div>

            <form action="{{route('admin.update_password')}}" class="form-horizontal" method="post">
            <h3 class="registration-title">Please Confirm the following account details:</h3>
            {{csrf_field()}}

            <ul>
                <li><strong>Owner Name:</strong>
                    <ul>
                        <li>{{ $user->name}}</li>
                    </ul>
                </li>
                <li><strong>account username:</strong>
                    <ul>
                        <li>{{ $user->username}}</li>
                    </ul>
                </li>
                <li><strong>account email:</strong>
                    <ul>
                        <li>{{ $user->username}}</li>
                    </ul>
                </li>
                <li><strong>account code:</strong>
                    <ul>
                        <li>{{ $user->code}}</li>
                    </ul>
                </li>
            </ul>

            <br><br>


            <div class="form-group row">

                <label for="password" class="col-md-4 col-form-label text-md-right " style="padding-top: 10px;">{{ __('New Password') }}</label>

                <div class="col-md-8">
                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    {{-- <input type="password" placeholder="Password" id="password" class="masked" name="password" /> --}}

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="hidden">
                <input type="text" name="code" value="{{ $user->code}}">
            </div>
            <div class="form-group push-up-20">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning btn-block">UPDATE</button>
                    <a href="{{ route('admin.user_password') }}" class="btn btn-danger btn-block">Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection


@section('scripts')
@endsection



