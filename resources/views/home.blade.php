@extends('layouts.layout')

@section('content')
	<section class="content-header">

    </section>

    <section class="content">
    	<!-- Small boxes (Stat box) -->
        <div class="row" class="col-md-12">
        <!-- <div class="row" class="col-md-12"> -->
        @if(auth()->user()->hasAnyPermission(['browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Employees</h3>
                        <h3>{{ \App\Employee::all()->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="{{route('employee.index')}}" class="small-box-footer">Manage employees
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            @if(auth()->user()->hasAnyPermission(['browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                        'delete_employee_roles','download_employee_roles']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Users<sup style="font-size: 20px"></sup></h3>

                        <h3>{{ \App\User::where("typeable_type", "App\Employee")->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('user.index')}}" class="small-box-footer">Manage users 
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            @if(auth()->user()->hasAnyPermission(['browse_admin_user','add_admin_user','read_admin_user',
                                                            'edit_admin_user','delete_admin_user','activate_deactivate_admin_user',
                                                            'browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user',
                                                            'browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                            'delete_employee_roles','download_employee_roles',
                                                            'browse_administrator_roles','add_administrator_roles','edit_administrator_roles',
                                                            'delete_administrator_roles','download_administrator_roles']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Admins<sup style="font-size: 20px"></sup></h3>

                        <h3>{{ \App\User::where("typeable_type", "App\SuperAdmin")->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.index')}}" class="small-box-footer">Manage administrators 
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            @if(auth()->user()->hasAnyPermission(['browse_departments','add_departments','edit_departments',
                                                                    'delete_departments']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Departments</h3>
                        <p><h3>{{ \App\Department::all()->count() }}</h3></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-home"></i>
                    </div>
                    <a href="{{route('department.index')}}" class="small-box-footer">Manage departments <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif
            <!-- ./col -->
        <!-- </div> -->

    	<!-- Small boxes (Stat box) -->
        <!-- <div class="row"> -->
        @if(auth()->user()->hasAnyPermission(['browse_projects','read_projects','add_projects',
                                                            'edit_projects','delete_projects','browse_employee_tasks',
                                                            'read_employee_tasks','add_employee_tasks','edit_employee_tasks',
                                                            'delete_employee_tasks','download_employee_tasks']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Projects</h3>
                        <h3>{{ \App\Project::all()->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('projects.index')}}" class="small-box-footer">Manage projects <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            @if(auth()->user()->hasAnyPermission(['browse_clients','add_clients','read_clients',
                                                                'edit_clients','delete_clients']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Clients</h3>
                        <h3>{{ \App\Client::all()->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion-android-contacts"></i>
                    </div>
                    <a href="{{route('client.index')}}" class="small-box-footer">Manage Clients <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Attendance<sup style="font-size: 20px"></sup></h3>

                        <h3 class="invisible">x</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    @if(auth()->user()->hasAnyPermission(['sign_in_employee','sign_out_employee']) )
                    <a href="{{route('attendance.index')}}" class="small-box-footer">Monitor Attendance <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{route('attendance.self_attendance')}}" class="small-box-footer">Monitor Attendance <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            <!-- ./col -->
            @if(auth()->user()->hasAnyPermission(['request_leave','read_leave','add_leave','edit_leave','delete_leave',
                                                'browse_leave_profiles','approve_unapprove_leave']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Leave</h3>

                        <h3 class="invisible">x</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                    @if(auth()->user()->can('request_leave'))
                    <a href="{{route('leave-request.index')}}" class="small-box-footer">Request Leave <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                    <a href="{{route('leave-approval.index')}}" class="small-box-footer">Manage Leaves <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>
            @endif
            <!-- ./col -->
        <!-- </div> -->

        <!-- <div class="row"> -->
        @if(auth()->user()->hasAnyPermission(['receive_messages','send_messages']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Messages</h3>
                        <p><h3>{{ auth()->user()->unread_inbox_message()->count() }}</h3></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-settings"></i>
                    </div>
                    <a href="{{ route("message.inbox") }}" class="small-box-footer">My Messages <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif
            <!-- ./col -->
            <!-- <div class="col-md-4 col-lg-3 col-xs-6"> -->
                <!-- small box -->
                <!-- <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Reports</h3>

                        <h4 style="margin-bottom: 33px;">View / Download Reports</h4>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                    <a href="#" class="small-box-footer">Generate Reports <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
            <!-- ./col -->
            <!-- ./col -->
            @if(!auth()->user()->hasAnyPermission(['read_employee_tasks','edit_employee_tasks','delete_employee_tasks','download_employee_tasks']))
            <div class="col-md-4 col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Task<sup style="font-size: 20px"></sup></h3>
                        <p><h3>{{ auth()->user()->owner->tasks()->count()}}</h3></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                     <a href="{{ route("task.index") }}" class="small-box-footer">My Tasks <i class="fa fa-arrow-circle-right"></i></a> 
                </div>
            </div>
            @endif
        <!-- </div> -->
        </div>
    </section>
@endsection