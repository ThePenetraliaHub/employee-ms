@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Task <small>information</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        <div class="panel panel-default col-md-4">
                            <div class="panel-body">
                                Task/Project Details
                            </div>
                            <div class="panel-footer">
                                        <table class="table table-striped  success">
                                        <thead>
                                            <tr class="info">
                                                <td colspan="2" class="text-center">
                                                    <h2 align="center" class="mb-0"><a href="{{ route('project.details',$employee_project->project->id) }}">{{$employee_project->project->name}}</a></h2>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="info">Task</th>
                                                <td>
                                                <a href="{{ route('project.details',$employee_project->project->id) }}">{{$employee_project->project->name}}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="info">Client Company</th>
                                                <td><a href="{{ route('client.details',$employee_project->project->client->id) }}">{{$employee_project->project->client->name}}</a></td>
                                            </tr>
                                            <tr>
                                                <th class="info">Assigned on</th>
                                                <td>{{$employee_project->start_date}}</td>
                                            </tr>
                                            <tr>
                                                <th class="info">Ends on</th>
                                                <td>{{$employee_project->end_date}}</td>
                                            </tr>
                                            <tr>
                                                <th class="info">Days Left</th>
                                                <td> End{{ $employee_project->end_date > date_create() ? "s": "ed" }} {{ $employee_project->end_date->diffForHumans() }}</td>
                                            </tr>
                                            <tr>
                                                <th class="info">Task Status</th>
                                                <td>{{$employee_project->status}}</td>
                                            </tr>
                                            <tr>
                                                <th class="info">Project Leader</th>
                                                <td> 
                                                    @if($team_members[0]->employee->id === $employee_project->project->id)
                                                    <a href="{{ route('employee.profile' ,$team_members[0]->employee->id) }}" >{{$team_members[0]->employee->name}} </a>
                                                    @else <a href="{{ route('employee.profile' ,$employee_project->employee->id) }}" >{{"You"}}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="info">Team Members</th>
                                                <td>
                                                 @foreach($team_members as $team_member )
                                                    @if($team_member->project->id === $employee_project->project->id)
                                                    <li><a href="{{ route('employee.profile' ,$team_member->employee->id) }}" >{{$team_member->employee->name}} </a></li>
                                                    @endif
                                                @endforeach
                                                </td>
                                            </tr>
                                          
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="panel panel-default col-md-7 col-md-offset-1">
                            <div class="panel-body">
                                Task/Project Details
                            </div>
                            <div class="panel-footer">
                                        <table class="table table-striped  success">
                                        <thead>
                                            <tr class="info">
                                                <td colspan="2" class="text-center">
                                                <h2>Project Details</h2>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                {{ $employee_project->details }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left"> @if($employee_project->document_url)
                                                    <a type="button" class="btn btn-default " href="{{route('download.employee_project', $employee_project)  }}"><i class="fa fa-cloud-download "></i> Download Attachment</a>
                                                    @endif</td>
                                            </tr>
                                            <tr  class="info">
                                                <td colspan="2" class="text-center">Supervisor's Remark </th>
                                            </tr>
                                            <tr> 
                                                @if($employee_project->supervisor_remark)                                             
                                                <td>{{ $employee_project->supervisor_remark }}</td>
                                                @else
                                                <td>There are currently no remark</td>
                                                @endif
                                            </tr>
                                    </thead>
                                </table>
                                @include('pages.employee.tasks.forms.update_task')
                            </div>
                        </div>
                       
                    
                    
                    </div>
            
            </div>
     </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#status').select2();
    });
</script>
@endsection