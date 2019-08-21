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
                <span class="logo-lg"><b>HRM SYSTEM</b></span>
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
                        @if(auth()->user()->typeable_type == "App\SuperAdmin")
                            <i class="fa fa-dashboard"></i> <span>{{ auth()->user()->user_type() }}</span>
                            @else
                            <i class="fa fa-dashboard"></i> <span>{{-- auth()->user()->user_type() --}}{{ auth()->user()->owner->job_title->title }}</span>
                         @endif
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
                            <!-- <li><a href="{{ route("home") }}"><i class="fa fa-circle-o"></i> Dashboard</a></li> -->

                            @if(auth()->user()->hasAnyPermission(['browse_departments','add_departments','edit_departments',
                                                                    'delete_departments']))
                            <li class="treeview">
                                <li><a href="{{ route('department.index') }}"><i class="glyphicon glyphicon-th-list"></i> Departments</a></li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_clients','add_clients','read_clients',
                                                                'edit_clients','delete_clients']))
                            <li class="treeview">
                                <li><a href="{{ route('client.index') }}"><i class="fa fa-handshake-o"></i> Clients</a></li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_job_titles','add_job_titles','edit_job_titles',
                                                            'delete_job_titles','browse_pay_grades','add_pay_grades',
                                                            'edit_pay_grades','delete_pay_grades','browse_employee_statuses',
                                                            'add_employee_statuses','edit_employee_statuses',
                                                            'delete_employee_statuses']))

                            <li class="treeview">
                                <a href="#"><i class="fa fa-suitcase"></i> Job Setup
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                @if(auth()->user()->hasAnyPermission(['browse_job_titles','add_job_titles','edit_job_titles',
                                                            'delete_job_titles']))
                                    <li><a href="{{ route('job-title.index') }}"><i class="fa fa-circle-o"></i> Job Titles</a></li>
                                    @endif

                               @if(auth()->user()->hasAnyPermission(['browse_pay_grades','add_pay_grades',
                                                            'edit_pay_grades','delete_pay_grades']))

                                    <li><a href="{{ route('pay-grade.index') }}"><i class="fa fa-circle-o"></i> Pay Grades</a></li>
                                    @endif

                               @if(auth()->user()->hasAnyPermission(['browse_employee_statuses',
                                                            'add_employee_statuses','edit_employee_statuses',
                                                            'delete_employee_statuses']))

                                    <li><a href="{{ route('employee-status.index') }}"><i class="fa fa-circle-o"></i> Employment Statuses</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_employee','read_employee','add_employee',
                                                                'edit_employee','delete_employee']))

                            <li class="treeview">
                                <li><a href="{{ route('employee.index') }}"><i class="fa fa-users"></i> Employees</a></li>
                            </li>
                            @endif
                            
                            @if(auth()->user()->hasAnyPermission(['browse_employee_skills','add_employee_skills','edit_employee_skills',
                                                                'delete_employee_skills']))
                            <li class="treeview">
                                <li><a href="{{ route('skills.index') }}"><i class="glyphicon glyphicon-flag"></i> Manage Skills</a></li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_employee_certifications','add_employee_certifications','edit_employee_certifications',
                                                                'delete_employee_certifications','download_employee_certifications']))
                            <li class="treeview">
                                <li><a href="{{ route('certification.index') }}"><i class="glyphicon glyphicon-certificate"></i> Manage Certifications</a></li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_employee_educations','add_employee_educations','edit_employee_educations',
                                                                'delete_employee_educations','download_employee_educations']))
                            <li class="treeview">
                                <li><a href="{{ route('education.index') }}"><i class="glyphicon glyphicon-education"></i> Manage Educations</a></li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['browse_projects','read_projects','add_projects',
                                                            'edit_projects','delete_projects','browse_employee_tasks',
                                                            'read_employee_tasks','add_employee_tasks','edit_employee_tasks',
                                                            'delete_employee_tasks','download_employee_tasks']))

                            <li class="treeview">
                                <a href="#"><i class="fa fa-tasks"></i> Project Setup
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                @if(auth()->user()->hasAnyPermission(['browse_projects','read_projects','add_projects',
                                                            'edit_projects','delete_projects']))
                                    <li>
                                        <a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> Projects
                                        </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->hasAnyPermission(['browse_employee_tasks',
                                                            'read_employee_tasks','add_employee_tasks','edit_employee_tasks',
                                                            'delete_employee_tasks','download_employee_tasks']))
                                    <li>
                                        <a href="{{ route('employee-project.index') }}"><i class="fa fa-circle-o"></i> Employee Tasks
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            @endif

                        </ul>
                    </li>

                    @if(!auth()->user()->hasAnyPermission(['read_employee_tasks','edit_employee_tasks','delete_employee_tasks','download_employee_tasks']))<li>
                        <a href="{{ route('task.index') }}">
                            <i class="fa fa-tasks"></i><span> Tasks</span>
                        </a>
                     @endif</li>

                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="fa fa-tasks"></i><span> My Profile</span>
                        </a>
                    </li>
                    @if(auth()->user()->hasAnyPermission(['browse_admin_user','add_admin_user','read_admin_user',
                                                            'edit_admin_user','delete_admin_user','activate_deactivate_admin_user',
                                                            'browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user',
                                                            'browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                            'delete_employee_roles','download_employee_roles',
                                                            'browse_administrator_roles','add_administrator_roles','edit_administrator_roles',
                                                            'delete_administrator_roles','download_administrator_roles']))
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
                                @if(auth()->user()->hasAnyPermission(['browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user']))
                                    <li><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> Employee Users</a></li>
                                    @endif
                                @if(auth()->user()->hasAnyPermission(['browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                        'delete_employee_roles','download_employee_roles']))
                                    <li><a href="{{ route('role.employee') }}"><i class="fa fa-circle-o"></i> Employee Roles</a></li>
                                   @endif
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-suitcase"></i> Administrator
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                @if(auth()->user()->hasAnyPermission(['browse_admin_user','add_admin_user','read_admin_user',
                                                        'edit_admin_user','delete_admin_user','activate_deactivate_admin_user']))
                                    <li><a href="{{ route("admin.index") }}"><i class="fa fa-circle-o"></i> Admin Users</a></li>
                                    @endif
                                @if(auth()->user()->hasAnyPermission(['browse_administrator_roles','add_administrator_roles','edit_administrator_roles',
                                                        'delete_administrator_roles','download_administrator_roles']))
                                    <li><a href="{{ route('role.admin') }}"><i class="fa fa-circle-o"></i> Admin Roles</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    @endif

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-time"></i> <span>Attendance</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>

                        <ul class="treeview-menu">
            
                                @if(auth()->user()->hasAnyPermission(['browse_working_days','read_working_days',
                                                                        'add_working_days', 'edit_working_days',
                                                                        'delete_working_days','download_working_days']))
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('work-day.index') }}"><i class="fa fa-user"></i> Working Days</a>
                                </li>
                            </li>
                            @endif
                            @if(auth()->user()->hasAnyPermission(['sign_in_employee','sign_out_employee']) )
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('attendance.index') }}"><i class="fa fa-user"></i> Sign In | Sign Out</a>
                                </li>
                            </li>
                            @endif
                            @if(auth()->user()->can('browse_attendance_general_report') )
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('attendance.general_report') }}"><i class="fa fa-user"></i> General Report</a>
                                </li>
                            </li>
                            @endif
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
                            @if(auth()->user()->hasAnyPermission(['browse_leave_profiles','read_leave',
                                                                  'add_leave','edit_leave','delete_leave']))
                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-type.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Leave Profile</a>
                                </li>
                            </li>
                            @endif

                            @if(auth()->user()->hasAnyPermission(['request_leave','read_leave',
                                                                    'add_leave','edit_leave','delete_leave',
                                                                    'browse_leave_profiles','approve_unapprove_leave']))

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-request.index') }}"><i class="glyphicon glyphicon-send"></i> Leave Request</a>
                                </li>
                            </li>
                            @endif

                            @if(auth()->user()->can('approve_unapprove_leave') )

                            <li class="treeview">
                                <li>
                                    <a href="{{ route('leave-approval.index') }}"><i class="glyphicon glyphicon-send"></i> Leave Approval</a>
                                </li>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @if(auth()->user()->hasAnyPermission(['receive_messages','send_messages']))

                    <li>
                        <a href="{{ route('message.inbox') }}">
                            <i class="fa fa-tasks"></i><span> Messages</span>
                        </a>
                    </li>
                    @endif

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
