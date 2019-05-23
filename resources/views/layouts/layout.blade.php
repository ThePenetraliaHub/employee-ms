<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PenTax</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('partials.style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ route("home") }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>EMS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Penetralia Hub EMS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        @include("partials.navbar")
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ auth()->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Tax Payer</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{-- {{ route("user.individual.create") }} --}}"><i class="fa fa-circle-o"></i> Add Tax Payer</a></li>
                <li><a href="{{-- {{ route("user.individual.search") }} --}}"><i class="fa fa-circle-o"></i> Search Tax Payer</a></li>
                <li><a href="{{-- {{ route("user.individual") }} --}}"><i class="fa fa-circle-o"></i> View Tax Payers</a></li>
              </ul>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li>
                <a 
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <i class="fa fa-circle-o"></i> <span>Logout</span>
                </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->
      @include("partials.footer")
    </div>
    <!-- ./wrapper -->

    @include('partials.scripts')
    @yield('script')
</body>
</html>
