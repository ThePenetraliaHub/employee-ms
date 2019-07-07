@extends('layouts.layout')

@section('content')
<section class="content-header panel">

    <h1>Task
        <small>information</small>
    </h1>
</section>

<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="tab-content basic-tab" id="myTabContent">

                    <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        <div class="panel panel-default card-body">
                            <div class="panel-heading " style="text-align: center;"></div>

                            <div class="panel-body">
                                <div class="col-md-6"> 
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Task</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2"><b>{{$project->name}}</b></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Client</label></div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2">{{$project->client->name}}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Assigned on</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2">{{$project->start_date}}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Deadline</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2">{{$project->end_date}}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Days Left</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2">5 days</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Task Status</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <label class="control-label viewLabel2">{{$project->status}}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Team Members</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        @foreach($employee_projects as $employee_project )
                                        <li class="control-label viewLabel2"><a href="{{ route('employee.profile' ,$employee_project->employee->id) }}" >{{$employee_project->employee->name}} </a></li>
                                        @endforeach
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="control-label viewLabel3">Team Leader</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <b><a class="control-label viewLabel2" href="{{ route('employee.profile' ,$employee_project->employee->id) }}" >{{$employee_projects[0]->employee->name}} </a></b>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="control-label viewLabel3">Task Details</label>
                                    <div class="mailbox-read-message">
                                        {{ $project->details }} {{ $employee_project->details }}
                                    </div>
                                       <div class="box-footer">
                                    <div class="pull-left">
                                      <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                                      @if($employee_project->document_url)
                                      <a type="button" class="btn btn-default " href="{{route('download.employee_project', $employee_project)  }}"><i class="fa fa-cloud-download "></i> Download Attachment</a>
                                      @endif
                                    </div>
                                    
                                  </div>
                                   
                                </div>

                                @if($employee_projects[0]->employee->id == auth()->user()->owner->id)
                                    <div class="col-md-12 ">
                                        @include('pages.employee.tasks.forms.update_task')
                                    </div>
                               @endif   

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>

</section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#status').select2();
        });
    </script>
@endsection



