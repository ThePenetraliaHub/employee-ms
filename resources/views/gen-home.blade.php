@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
    <div class=" col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row top_tiles">

            @if(auth()->user()->hasAnyPermission(['browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user']))
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <a href="{{route('employee.index')}}" class="small-box-footer">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="count">{{ \App\Employee::all()->count() }}</div>
                        <h3>Employees</h3>
                        <p>
                            Manage employees <i class="fa fa-arrow-circle-right"></i>  
                        </p>
                   </a>
                </div>
              </div>
            @endif

            @if(auth()->user()->hasAnyPermission(['browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                        'delete_employee_roles','download_employee_roles']))
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <a href="{{route('user.index')}}" class="small-box-footer">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{\App\User::where("typeable_type", "App\Employee")->count() }}</div>
                    <h3>Users</h3>
                        <p>
                            Manage users <i class="fa fa-arrow-circle-right"></i>
                        </p>
                  </a>
                </div>
              </div>
            @endif

            @if(auth()->user()->hasAnyPermission(['browse_admin_user','add_admin_user','read_admin_user',
                                                            'edit_admin_user','delete_admin_user','activate_deactivate_admin_user',
                                                            'browse_employee_user','add_employee_user','read_employee_user',
                                                            'edit_employee_user','delete_employee_user',
                                                            'activate_deactivate_employee_user',
                                                            'browse_employee_roles','add_employee_roles','edit_employee_roles',
                                                            'delete_employee_roles','download_employee_roles',
                                                            'browse_administrator_roles','add_administrator_roles','edit_administrator_roles',
                                                            'delete_administrator_roles','download_administrator_roles']))
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <a href="{{route('admin.index')}}" class="small-box-footer">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">{{\App\User::where("typeable_type", "App\SuperAdmin")->count()  }}</div>
                    <h3>Administrators</h3>
                        <p>
                            Manage Administratores <i class="fa fa-arrow-circle-right"></i>
                        </p>
                  </a>
                </div>
              </div>
            @endif

            @if(auth()->user()->hasAnyPermission(['request_leave','read_leave','add_leave','edit_leave','delete_leave',
                                                'browse_leave_profiles','approve_unapprove_leave']))
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    @if(auth()->user()->can('request_leave'))
                    <a href="{{route('leave-request.index')}}" class="small-box-footer">
                        <div class="icon"><i class="fa fa-bus"></i></div>
                        <div class="count">{{\App\LeaveRequest::where("approval_status", 1)->count()  }}</div>
                        <h3>Leave</h3>
                            <p>
                                Request Leave <i class="fa fa-arrow-circle-right"></i>
                            </p>
                    </a>
                    @else
                    <a href="{{route('leave-approval.index')}}" class="small-box-footer">
                        <div class="icon"><i class="fa fa-bus"></i></div>
                        <div class="count">{{\App\LeaveRequest::where("approval_status", 0)->count()  }}</div>
                        <h3>Leave</h3>
                            <p>
                                Approve Leaves <i class="fa fa-arrow-circle-right"></i>
                            </p>
                    </a>
                    @endif
                </div>
              </div>
            @endif

            @if(auth()->user()->hasAnyPermission(['browse_clients','add_clients','read_clients',
                                                                'edit_clients','delete_clients']))

            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <a href="{{route('client.index')}}" class="small-box-footer">
                    <div class="icon"><i class="fa fa-briefcase"></i></div>
                    <div class="count">{{\App\Client::all()->count() }}</div>
                    <h3>Clients </h3>
                        <p>
                            Manage Clients <i class="fa fa-arrow-circle-right"></i>
                        </p>
                  </a>
                </div>
              </div>
            @endif

            @if(auth()->user()->hasAnyPermission(['receive_messages','send_messages']))
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <a href="{{route('message.inbox')}}" class="small-box-footer">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="count">{{auth()->user()->unread_inbox_message()->count()}}</div>
                    <h3>Messages </h3>
                        <p>
                            My Messages <i class="fa fa-arrow-circle-right"></i>
                        </p>
                  </a>
                </div>
              </div>
            @endif

            </div>
    </div>

 
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div id="echart_pie" style=" width:100%; height:420px;"></div>
    </div>

    @if(auth()->user()->hasAnyPermission(['browse_projects','add_projects',
                                                            'edit_projects','delete_projects']))
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="">Projects Status</div>
         <canvas id="mybarChart" style="width:100%; height:600px;"></canvas>
    </div> 
    @endif

<!-- <div class="col-md-12">
    <canvas id="mybarChart"></canvas>
</div> -->

   

</div>


@endsection

@section('script')
<script>

    var completed = [];
    var initiated = [];
    var pending = [];
    var terminated = [];

    <?php for($i=0; $i<=11; $i++){  ?>
        <?php 
            $completed = \App\Project::where('status' ,'Completed')->whereBetween('updated_at', [ "2019-".($i + 1)."-01",  "2019-".($i + 1)."-31" ])->get()->count();
            $initiated = \App\Project::where('status' ,'Initiated')->whereBetween('created_at', [ "2019-".($i + 1)."-01",  "2019-".($i + 1)."-31" ])->get()->count();
            $pending = \App\Project::where('status' ,'Pending')->whereBetween('updated_at', [ "2019-".($i + 1)."-01",  "2019-".($i + 1)."-31" ])->get()->count();
            $terminated = \App\Project::where('status' ,'Terminated')->whereBetween('updated_at', [ "2019-".($i + 1)."-01",  "2019-".($i + 1)."-31" ])->get()->count();
        ?>

        completed[<?php echo $i ?>] = '<?php echo $completed ?>';
        initiated[<?php echo $i ?>] = '<?php echo $initiated ?>';
        pending[<?php echo $i ?>] = '<?php echo $pending ?>';
        terminated[<?php echo $i ?>] = '<?php echo $terminated ?>';
    <?php } ?>

    console.log(completed);
    console.log(initiated);
    console.log(pending);
    console.log(terminated);

if ($('#mybarChart').length )
{ 
			  
			  var ctx = document.getElementById("mybarChart");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				  datasets: [{
					label: 'Numbers of Projects Completed',
					backgroundColor: "#228B22",
					data: completed
				  }, {
					label: 'Numbers of Projects Initiated',
					backgroundColor: "#ADD8E6",
					data: initiated
                  },
                  {
					label: 'Numbers of Projects Pending',
					backgroundColor: "#FFFF66",
					data: pending
                  },
                  {
					label: 'Numbers of Projects Terminated',
					backgroundColor: "#FF0000",
					data: terminated
                  },

                  
                  
                ]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
                    }],
                    xAxes: [{
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        gridLines: {
                            offsetGridLines: true
                        }
                    }]
                  }
                  
				}
			  });
			  
};


if ($('#echart_pie').length )
{  
    [
                
                {
                    
                }, 
            ]

        var departments = [];
        var data_value = [];

        var i = 0;
        var j = 0;

        <?php foreach(\App\Department::all() as $department){ ?>
            dname = "<?php echo $department->name; ?>";
            emp_count = "<?php echo $department->employees->count() ?>";

            departments[i++] = dname;

            particular_dep = {
                                value: emp_count,
                                name: dname,
                            };
            
            data_value[j++] = particular_dep;
        <?php } ?>

        console.log(departments);
        console.log(data_value);

        var echartPie = echarts.init(document.getElementById('echart_pie'), );

        echartPie.setOption({
        tooltip: {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        title: {
                // text: 'Departments',
                // subtext: 'Chart',
                // x:'center'
            },
        legend: {
            x: 'center',
            y: 'top',
            data: departments,
        },
        toolbox: {
            show: true,
            feature: {
            magicType: {
                show: true,
                type: ['pie', 'funnel'],
                option: {
                funnel: {
                    x: '25%',
                    width: '50%',
                    funnelAlign: 'left',
                    max: 1548
                }
                }
            },
            }
        },
        calculable: true,
        series: [{
            name: 'Numbers of',
            type: 'pie',
            radius: '55%',
            center: ['50%', '48%'],
            data: data_value
        }]
        });

        var dataStyle = {
        normal: {
            label: {
            show: false
            },
            labelLine: {
            show: false
            }
        }
        };

        var placeHolderStyle = {
        normal: {
            color: 'rgba(0,0,0,0)',
            label: {
            show: false
            },
            labelLine: {
            show: false
            }
        },
        emphasis: {
            color: 'rgba(0,0,0,0)'
        }
        };

} 

</script>
<script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
<!-- <script src="{{ asset('vendors/echarts/dist/echarts.min.js') }}"></script> -->

@endsection

