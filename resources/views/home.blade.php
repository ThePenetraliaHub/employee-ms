@extends('layouts.layout')

@section('content')
	<section class="content-header">

    </section>

    <section class="content">
    	<!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
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
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
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
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Admins<sup style="font-size: 20px"></sup></h3>

                        <h3>{{ \App\User::where("typeable_type", "App\SuperAdmin")->count() }}</h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('user.index')}}" class="small-box-footer">Manage users 
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
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
            <!-- ./col -->
        </div>

    	<!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Projects</h3>
                        <p>43</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('projects.index')}}" class="small-box-footer">Manage projects<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Attendance<sup style="font-size: 20px"></sup></h3>

                        <p>85%</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="#" class="small-box-footer">Monitor Attendance <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Reports</h3>

                        <p>View / Download Reports</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                    <a href="#" class="small-box-footer">Generate Reports <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Clients</h3>
                        <p>477</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-contacts"></i>
                    </div>
                    <a href="{{route('client.index')}}" class="small-box-footer">Manage Clients <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Settings</h3>

                        <p>Configure System</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-settings"></i>
                    </div>
                    <a href="#" class="small-box-footer">Update settings <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
@endsection