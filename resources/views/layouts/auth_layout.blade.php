<!DOCTYPE html>
<html class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths gr__lexcare_ng">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield("title")</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include("partials.style")
</head>
<body class="hold-transition login-page">

<div class="main-content-wrapper">
    <div class="login-area" style="background:#fff; height:100vh; overflow:hidden;">
        <div class="login-header">
            <a href="{{ route("home") }}" class="logo">
                <img src="{{ asset("img/penetralia.png") }}" height="60" alt="">
            </a>
        </div>

        @yield("form-body")
    </div>

    <div class="image-area"></div>
</div>

@include("partials.scripts")
@include('vendor.lara-izitoast.toast')
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
