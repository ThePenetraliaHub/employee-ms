<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset("img/penetralia_logo2.png") }}" type="image" sizes="">
    @include('partials.gen-style')
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-group"></i> <span>EMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
            @if(auth()->user()->owner instanceof \App\SuperAdmin)
                <img src="{{ auth()->user()->user_avatar }}" class="img-circle profile_img" alt="User Image">
            @elseif(auth()->user()->owner instanceof \App\Employee)
                <img src="{{ asset('storage/'.auth()->user()->owner->avatar) }}" class="img-circle profile_img" alt="User Image">
            @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ auth()->user()->name }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                        <h3> 
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
                        </h3>
                        <ul class="nav side-menu">
                            <li>
                                <a href="{{ route('home') }}" >
                                <i class="fa fa-dashboard"></i><span> Dashboard</span>
                                </a>
                              </li>
                            <li>
                              <a>
                              @if(auth()->user()->typeable_type == "App\SuperAdmin")
                              <i class="fa fa-home"></i> {{ auth()->user()->user_type() }} <span class="fa fa-chevron-down"></span>
                              @else
                              <i class="fa fa-home"></i> {{-- auth()->user()->user_type() --}}{{ auth()->user()->owner->job_title->title }} <span class="fa fa-chevron-down"></span>
                              @endif
                              </a>
                                <ul class="nav child_menu">
                                    @if(auth()->user()->hasAnyPermission(['browse_departments','add_departments','edit_departments',
                                                                                  'delete_departments']))
                                    <li><a href="{{ route('department.index') }}"><i class="fa fa-university"></i>Departments</a></li>
                                    @endif

                                    @if(auth()->user()->hasAnyPermission(['browse_clients','add_clients',
                                                                              'edit_clients','delete_clients']))
                                    <li><a href="{{ route('client.index') }}"><i class="fa fa-briefcase"></i>Clients</a></li>
                                    @endif

                                    @if(auth()->user()->hasAnyPermission(['browse_job_titles','add_job_titles','edit_job_titles',
                                                                          'delete_job_titles','browse_pay_grades','add_pay_grades',
                                                                          'edit_pay_grades','delete_pay_grades','browse_employee_statuses',
                                                                          'add_employee_statuses','edit_employee_statuses',
                                                                          'delete_employee_statuses']))
                                    <li><a><i class="fa fa-reorder"></i>Job Setup<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          @if(auth()->user()->hasAnyPermission(['browse_job_titles','add_job_titles','edit_job_titles',
                                                                          'delete_job_titles']))
                                          <li class="sub_menu"><a href="{{ route('job-title.index') }}"><i class="fa fa-keyboard-o"></i>Job Titles</a></li>
                                          @endif

                                          @if(auth()->user()->hasAnyPermission(['browse_pay_grades','add_pay_grades',
                                                                          'edit_pay_grades','delete_pay_grades']))
                                          <li><a href="{{ route('pay-grade.index') }}"><i class="fa fa-pencil-square"></i>Pay Grades</a></li>
                                          @endif

                                          @if(auth()->user()->hasAnyPermission(['browse_employee_statuses',
                                                                          'add_employee_statuses','edit_employee_statuses',
                                                                          'delete_employee_statuses']))
                                          <li><a href="{{ route('employee-status.index') }}"><i class="fa fa-puzzle-piece"></i>Empt. Statuses</a></li>
                                          @endif

                                        </ul>
                                    </li>
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['browse_employee','add_employee',
                                                                              'edit_employee','delete_employee']))

                                    <li><a href="{{ route('employee.index') }}"><i class="fa fa-users"></i> Employees</a></li>
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['browse_employee_skills','add_employee_skills','edit_employee_skills',
                                                                              'delete_employee_skills']))
                                    <li><a href="{{ route('skills.index') }}"><i class=""></i><i class="fa fa-gears"></i> Manage Skills</a></li>
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['browse_employee_certifications','add_employee_certifications','edit_employee_certifications',
                                                                              'delete_employee_certifications','download_employee_certifications']))                           
                                    <li><a href="{{ route('certification.index') }}"><i class="fa fa-certificate"></i> Manage Certifications</a></li>                          
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['browse_employee_educations','add_employee_educations','edit_employee_educations',
                                                                              'delete_employee_educations','download_employee_educations']))
                                    <li><a href="{{ route('education.index') }}"><i class="fa fa-graduation-cap"></i> Manage Educations</a></li>
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['browse_projects','add_projects',
                                                                          'edit_projects','delete_projects','browse_employee_tasks',
                                                                          'add_employee_tasks','edit_employee_tasks',
                                                                          'delete_employee_tasks','download_employee_tasks']))

                                    <li><a><i class="fa fa-file-text-o"></i>Project Setup<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                          @if(auth()->user()->hasAnyPermission(['browse_projects','add_projects',
                                                                  'edit_projects','delete_projects']))
                                          <li>
                                              <a href="{{ route('projects.index') }}"><i class="fa fa-book"></i> Projects
                                              </a>
                                          </li>
                                          @endif
                                          @if(auth()->user()->hasAnyPermission(['browse_employee_tasks',
                                                                  'add_employee_tasks','edit_employee_tasks',
                                                                  'delete_employee_tasks','download_employee_tasks']))
                                          <li>
                                              <a href="{{ route('employee-project.index') }}"><i class="fa fa-external-link"></i> Employee Tasks
                                              </a>
                                          </li>
                                          @endif
                                        </ul>
                                    </li>
                                  @endif
                    
                                </ul>
                            </li>

                            @if(auth()->user()->typeable_type <> 'App\SuperAdmin')
                            <li>
                              <a href="{{ route('task.index') }}">
                                  <i class="fa fa-tasks"></i>Tasks
                              </a>
                          </li>
                            @endif

                            <li>
                                  <a href="{{ route('profile') }}">
                                      <i class="fa fa-tasks"></i>My Profile
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
                            <li><a><i class="fa fa-laptop"></i> System <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  <li><a><i class="fa fa-user"></i>Employee<span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                      @if(auth()->user()->hasAnyPermission(['browse_employee_user','add_employee_user','read_employee_user',
                                                                      'edit_employee_user','delete_employee_user',
                                                                      'activate_deactivate_employee_user']))
                                              <li><a href="{{ route('user.index') }}"><i class="fa fa-users"></i> Employee Users</a></li>
                                      @endif
                                      @if(auth()->user()->hasAnyPermission(['browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                                  'delete_employee_roles','download_employee_roles']))
                                              <li><a href="{{ route('role.employee') }}"><i class="fa fa-magic"></i> Employee Roles</a></li>
                                      @endif 
                                      </ul>
                                  </li>
                                  <li><a><i class="fa fa-male"></i>Administrator<span class="fa fa-chevron-down"></span></a>
                                      <ul class="nav child_menu">
                                      @if(auth()->user()->hasAnyPermission(['browse_admin_user','add_admin_user','read_admin_user',
                                                                  'edit_admin_user','delete_admin_user','activate_deactivate_admin_user']))
                                              <li><a href="{{ route("admin.index") }}"><i class="fa fa-users"></i> Admin Users</a></li>
                                      @endif
                                      @if(auth()->user()->hasAnyPermission(['browse_administrator_roles','add_administrator_roles','edit_administrator_roles',
                                                                  'delete_administrator_roles','download_administrator_roles']))
                                              <li><a href="{{ route('role.admin') }}"><i class="fa fa-magic"></i> Admin Roles</a></li>
                                      @endif
                                      </ul>
                                  </li>
                              </ul>
                            </li>
                            @endif

                            <li><a><i class="fa fa-edit"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                  @if(auth()->user()->hasAnyPermission(['browse_working_days','read_working_days',
                                                                        'add_working_days', 'edit_working_days',
                                                                        'delete_working_days','download_working_days']))
                                  <li>
                                    <a href="{{ route('work-day.index') }}"><i class="fa fa-calendar"></i> Working Days</a>
                                  </li>
                                  @endif

                                  @if(auth()->user()->hasAnyPermission(['sign_in_employee','sign_out_employee']) )
                                  <li>
                                    <a href="{{ route('attendance.index') }}"><i class="fa fa-toggle-on"></i> Sign In | Sign Out</a>
                                  </li>
                                  @endif

                                  @if(auth()->user()->can('browse_attendance_general_report') )
                                  <li>
                                    <a href="{{ route('attendance.general_report') }}"><i class="fa fa-file-text"></i> General Report</a>
                                  </li>
                                  @endif

                                  <li>
                                    <a href="{{ route('attendance.self_attendance') }}"><i class="fa fa-folder-o"></i> My Attendance</a>
                                  </li>
                              </ul>
                            </li>


                            <li><a><i class="fa fa-desktop"></i> File Management<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                @if(auth()->user()->hasAnyPermission(['browse_leave_profiles','read_leave',
                                                                'add_leave','edit_leave','delete_leave']))
                                <li>
                                  <a href="{{ route('files.index') }}"><i class="fa fa-file-text-o"></i>Add Files</a>
                                </li>
                                @endif

                                @if(auth()->user()->hasAnyPermission(['request_leave','read_leave',
                                                                  'add_leave','edit_leave','delete_leave',
                                                                  'browse_leave_profiles','approve_unapprove_leave']))

                                <li>
                                  <a href="{{ route('histories.create') }}"><i class="fa fa-mail-forward"></i> Issue File</a>
                                </li>
                                @endif

                                @if(auth()->user()->can('approve_unapprove_leave') )

                                <li>
                                  <a href="{{ route('histories.index') }}"><i class="fa fa-mail-reply"></i> Pending Files</a>
                                </li>
                                @endif

                                @if(auth()->user()->hasAnyPermission(['request_leave','read_leave',
                                                                  'add_leave','edit_leave','delete_leave',
                                                                  'browse_leave_profiles','approve_unapprove_leave']))

                                <li>
                                  <a href="{{ route('returnedfiles') }}"><i class="fa fa-mail-forward"></i> Returned Files</a>
                                </li>
                                @endif

                                @if(auth()->user()->can('approve_unapprove_leave') )

                                <li>
                                  <a href="{{ route('duefiles') }}"><i class="fa fa-mail-reply"></i> Due Files</a>
                                </li>
                                @endif
                              </ul>
                            </li>

                            <li><a><i class="fa fa-desktop"></i> Leave<span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                              @if(auth()->user()->hasAnyPermission(['browse_leave_profiles','read_leave',
                                                              'add_leave','edit_leave','delete_leave']))
                              <li>
                                <a href="{{ route('leave-type.index') }}"><i class="fa fa-file-text-o"></i> Leave Profile</a>
                              </li>
                              @endif

                              @if(auth()->user()->hasAnyPermission(['request_leave','read_leave',
                                                                'add_leave','edit_leave','delete_leave',
                                                                'browse_leave_profiles','approve_unapprove_leave']))

                              <li>
                                <a href="{{ route('leave-request.index') }}"><i class="fa fa-mail-forward"></i> Leave Request</a>
                              </li>
                              @endif

                              @if(auth()->user()->can('approve_unapprove_leave') )

                              <li>
                                <a href="{{ route('leave-approval.index') }}"><i class="fa fa-mail-reply"></i> Leave Approval</a>
                              </li>
                              @endif
                            </ul>
                          </li>

                              @if(auth()->user()->hasAnyPermission(['receive_messages','send_messages']))
                            <li> <a href="{{ route('message.inbox') }}">
                              <i class="fa fa-envelope-o"></i><span> Messages</span></a>
                            </li>
                              @endif

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                              </form>
                            <li>
                              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out"></i><span> Logout</span>
                              </a>
                            </li>
                        </ul>
                  </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        @include("partials.gen-navbar")
        <!-- /top navigation -->

        <!-- page content -->
          @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @include("partials.gen-footer")
        <!-- /footer content -->
      </div>
    </div>

    @include('partials.gen-scripts')
    @include('vendor.lara-izitoast.toast')
    @yield('script')
  </body>
</html>