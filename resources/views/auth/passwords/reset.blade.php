@extends('layouts.auth_layout')

@section("title")
    Penetralia Hub EMS | Forget Password
@endsection

@section("form-body")
    <div class="login-content col-md-10 col-md-offset-1">
        <form novalidate="novalidate" autocomplete="new-password" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input autocomplete="new-password" value="{{ $email ?? old('email') }}" type="email" id="email" autofocus class="input-field mb-0" name="email" placeholder="Email Address" required="" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input autocomplete="new-password" id="password" type="password" autofocus class="input-field mb-0" name="password" placeholder="Password" required="" autocomplete="off">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input autocomplete="new-password" id="password-confirm" class="input-field mb-0" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Reset Password<i class="fa fa-"></i></button>
        </form>
    </div>
@endsection