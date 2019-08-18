<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('partials.style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ route("home") }}" class="logo">
                <span class="logo-mini"><b>EMS</span>
                <span class="logo-lg"><b>HOME</b></span>
            </a>
            @include("partials.navbar")
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ auth()->user()->user_avatar }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="#">
                            {{-- Display when the staff is on leave here --}}
                            @if(auth()->user()->owner instanceof \App\Employee)
                                @if(auth()->user()->owner->is_on_leave())
                                    <i class="fa fa-circle text-warning"></i> On leave
                                @else
                                    <i class="fa fa-circle text-success"></i> Active
                                @endif
                            @else
                                <i class="fa fa-circle text-success"></i> Active
                            @endif
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
                                <li><a href="{{ route('skills.index') }}"><i class="glyphicon glyphicon-flag"></i> Manage Skills</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('certification.index') }}"><i class="glyphicon glyphicon-certificate"></i> Manage Certifications</a></li>
                            </li>

                            <li class="treeview">
                                <li><a href="{{ route('education.index') }}"><i class="glyphicon glyphicon-education"></i> Manage Educations</a></li>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-tasks"></i> Project Setup
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> Projects
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('employee-project.index') }}"><i class="fa fa-circle-o"></i> Employee Tasks
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('task.index') }}">
                            <i class="fa fa-tasks"></i><span> Tasks</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-tasks"></i><span> My Profile</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>System</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-suitcase"></i> Employee
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> Employee Users</a></li>

                                    <li><a href="{{ route('role.employee') }}"><i class="fa fa-circle-o"></i> Employee Roles</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#"><i class="fa fa-suitcase"></i> Administrator
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route("admin.index") }}"><i class="fa fa-circle-o"></i> Admin Users</a></li>

                                    <li><a href="{{ route('role.admin') }}"><i class="fa fa-circle-o"></i> Admin Roles</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-time"></i> <span>Attendance</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('work-day.index') }}"><i class="fa fa-user"></i> Working Days</a>
                                </li>
                            </li>

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('attendance.index') }}"><i class="fa fa-user"></i> Sign In | Sign Out</a>
                                </li>
                            </li>

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('attendance.general_report') }}"><i class="fa fa-user"></i> General Report</a>
                                </li>
                            </li>

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('attendance.self_attendance') }}"><i class="fa fa-user"></i> My Attendance</a>
                                </li>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bed"></i> <span>Leave</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-type.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Leave Profile</a>
                                </li>
                            </li>

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-request.index') }}"><i class="glyphicon glyphicon-send"></i> Leave Request</a>
                                </li>
                            </li>

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-approval.index') }}"><i class="glyphicon glyphicon-send"></i> Leave Approval</a>
                                </li>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('message.inbox') }}">
                            <i class="fa fa-tasks"></i><span> Messages</span>
                        </a>
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
