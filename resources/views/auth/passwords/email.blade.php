@extends('layouts.auth_layout')

@section("title")
    Penetralia Hub EMS | Forget Password
@endsection

@section("form-body")
    <div class="login-content col-md-10 col-md-offset-1">
        <form novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
            @csrf
            @if (session('status'))
                <div class="alert alert-success" id="success-alert" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input value="{{ old('email') }}" type="email" id="email" autofocus class="input-field mb-0" name="email" placeholder="Email" required="" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Send Password Reset Link<i class="fa fa-"></i></button>
        </form>
    </div>
@endsection
