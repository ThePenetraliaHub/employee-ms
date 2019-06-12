<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penetralia Hub EMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('partials.style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ route("home") }}" class="logo">
                <span class="logo-mini"><b>EMS</span>
                <span class="logo-lg"><b>Penetralia Hub EMS</b></span>
            </a>
            @include("partials.navbar")
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i> Online
                        </a>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Admin</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="{{ route("home") }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>

                            <li class="treeview">
                                <li><a href="#"><i class="glyphicon glyphicon-user"></i> Administrators</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('department.index') }}"><i class="glyphicon glyphicon-th-list"></i> Departments</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('client.index') }}"><i class="fa fa-handshake-o"></i> Clients</a></li>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-suitcase"></i> Job Setup
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('job-title.index') }}"><i class="fa fa-circle-o"></i> Job Titles</a></li>

                                    <li><a href="{{ route('pay-grade.index') }}"><i class="fa fa-circle-o"></i> Pay Grades</a></li>

                                    <li><a href="{{ route('employee-status.index') }}"><i class="fa fa-circle-o"></i> Employment Statuses</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('employee.index') }}"><i class="fa fa-users"></i> Employees</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('skills.index') }}"><i class="fa fa-users"></i> Manage Skills</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('certification.index') }}"><i class="fa fa-users"></i> Manage Certifications</a></li>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-tasks"></i> Project Setup
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> Projects</a></li>
                                    <li><a href="{{ route('employee-project.create') }}"><i class="fa fa-circle-o"></i> Employee Project</a></li>
                                </ul>
                            </li>
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
                            <i class="glyphicon glyphicon-log-out"></i><span> Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include("partials.footer")
    </div>

    @include('partials.scripts')
    @include('vendor.lara-izitoast.toast')
    @yield('script')
</body>
</html>
