@extends('layouts.auth_layout')

@section("title")
    Penetralia Hub EMS | Forget Password
@endsection

@section("form-body")
    <div class="login-content col-md-10 col-md-offset-1">
        <form novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input value="{{ old('email') }}" type="email" id="email" autofocus class="input-field mb-0" name="email" placeholder="Email" required="" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Send Password Reset Link<i class="fa fa-lock"></i></button>
        </form>
    </div>
@endsection

@section('content')
                <div class="card">
                    <div class="card-header text-center text-primary">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                </div>
@endsection
