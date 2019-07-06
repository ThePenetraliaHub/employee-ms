@extends('layouts.auth_layout')

@section("title")
    {{ config('app.name') }} | Login
@endsection

@section("form-body")
    <div class="login-content col-md-10 col-md-offset-1">
        <form novalidate="novalidate" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input value="{{ old('email') }}" type="email" id="email" autofocus class="input-field mb-0" name="email" placeholder="Email" required="" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="input-field mb-0" name="password" placeholder="Password" required="" autocomplete="off">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Login<i class="fa fa-lock"></i></button>
        </form>

        <div class="login-bottom-links">
            <a href="{{ route('password.request') }}" class="link">
                Forgot Your Password ?
            </a>
        </div>
    </div>
@endsection
