<!DOCTYPE html>
<html class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths gr__lexcare_ng">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penetralia Hub EMS | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include("partials.style")
</head>
<body class="hold-transition login-page">

<div class="main-content-wrapper">
    <div class="login-area" style="background:#fff; height:100vh; overflow:hidden;">
        <div class="login-header">
            <a href="" class="logo">
                <img src="{{ asset("img/logo.png") }}" height="60" alt="">
            </a>
        </div>

        <div class="login-content col-md-10 col-md-offset-1">
            <form novalidate="novalidate" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input value="{{ old('email') }}" type="email" id="email" autofocus class="input-field" name="email" placeholder="Email" required="" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="input-field" name="password" placeholder="Password" required="" autocomplete="off">
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
                <a href="" class="link">
                    Forgot Your Password ?
                </a>
            </div>
        </div>
    </div>

    <div class="image-area"></div>
</div>

@include("partials.scripts")
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
