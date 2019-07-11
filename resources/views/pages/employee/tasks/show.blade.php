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
                            <div class="col-md-6 left-column"> 
                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Task</label>
                                </div>
                                <div class="col-md-8"> 
                                    <label class="control-label viewLabel2"><b><a href="{{ route('project.details',$employee_project->project->id) }}">{{$employee_project->project->name}}</a></b></label>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Client</label>
                                </div>
                                <div class="col-md-8"> 
                                    <label class="control-label viewLabel2"><a href="{{ route('client.details',$employee_project->project->client->id) }}">{{$employee_project->project->client->name}}</a></label>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Assigned on</label>
                                </div>
                                <div class="col-md-8"> 
                                    <label class="control-label viewLabel2">{{$employee_project->start_date}}</label>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Deadline</label>
                                </div>
                                <div class="col-md-8"> 
                                    <label class="control-label viewLabel2">{{$employee_project->end_date}}</label>
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
                                    <label class="control-label viewLabel2">{{$employee_project->status}}</label>
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Team Members</label>
                                </div>
                           {{-- <div class="col-md-8"> 
                                    @foreach($employee_project as $employee_project )
                                    <li class="control-label viewLabel2"><a href="{{ route('employee.profile' ,$employee_project->employee->id) }}" >{{$employee_project->employee->name}} </a></li>
                                    @endforeach
                                </div> --}}

                                <div class="col-md-4">
                                    <label class="control-label viewLabel3">Team Leader</label>
                                </div>
                                {{-- <div class="col-md-8"> 
                                    <b><a class="control-label viewLabel2" href="{{ route('employee.profile' ,$employee_project->employee->id) }}" >{{$employee_projects[0]->employee->name}} </a></b>
                                </div> --}}

                                </div>
                                <!--end of div left-column  --> 


                                <div class="col-md-6 right-column">

                                    <div class="panel panel-default ">
                                        <div class="panel-body  viewLabel3">
                                           Task Details
                                        </div>
                                        <div class="panel-footer">
                                            {{ $employee_project->project->details }} {{ $employee_project->details }}

                                            <div >
                                              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print Details</button>
                                              @if($employee_project->document_url)
                                              <a type="button" class="btn btn-default " href="{{route('download.employee_project', $employee_project)  }}"><i class="fa fa-cloud-download "></i> Download Attachment</a>
                                              @endif
                                            </div>
                                        </div>
                                    </div>

                                  <div class="panel panel-default ">
                                        <div class="panel-body viewLabel3">
                                           Supervisor's Remark
                                        </div>
                                        <div class="panel-footer">
                                             Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        </div>
                                    </div>
                                
                                    @include('pages.employee.tasks.forms.update_task')
                                

                              </div>
                              <!--end of div right-column  -->

                                                 
                                </div>
                                <!--end of div panel-body --> 
                                
                            </div>
                            <!--end of div panel panel-default card-body  -->     
                </div>
                <!--end of div tab-pane fade in active  --> 
            </div>
            <!--end of div tab-content basic-tab  -->
        </div>
        <!--end of div col-md-12  -->

    </div>
    <!--end of div content  -->

    </section>
    @endsection
    @section('script')
    <script>
        $(document).ready(function () {
            $('#status').select2();
        });
    </script>
    @endsection



