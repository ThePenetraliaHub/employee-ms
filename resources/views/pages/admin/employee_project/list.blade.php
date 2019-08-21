@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employee Tasks
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($employee_projects) > 0)
                    @if(auth()->user()->can('add_employee_tasks'))
                    <a href="{{ route('employee-project.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Assign task to employee
                    </a>
                    @endif
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($employee_projects) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Timeline</th>
                                            @if(auth()->user()->hasAnyPermission(['read_employee_tasks','edit_employee_tasks','delete_employee_tasks','download_employee_tasks']))
                                            <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($employee_projects as $employee_project)
                                            <tr {{ $employee_project->end_date < date_create() ? "class=text-danger" : "" }}>
                                                <td>
                                                    {{ $loop->iteration }}
                                                    @if($employee_project->status == "Completed")
                                                        <span class='label label-success label-sm'>
                                                            {{ $employee_project->status }}
                                                        </span>
                                                    @else
                                                        <span class='label label-warning label-sm'>
                                                            {{ $employee_project->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route("employee.profile", $employee_project->employee->id) }}">
                                                        <span class="inline-block">
                                                            <strong> {{ $employee_project->employee->name }} </strong>
                                                        </span>
                                                    </a>
                                                    <br>
                                                    <span class="inline-block text-muted">{{ $employee_project->employee->employee_number }}</span><br>
                                                    <span class="inline-block text-muted">{{ $employee_project->employee->job_title->title }}</span>
                                                </td>
                                                <td>
                                                    @if($employee_project->project)
                                                        <a href="{{ route("project.details", $employee_project->project->id) }}">
                                                            <span class="inline-block">
                                                                <strong> {{ $employee_project->project->name }} 
                                                                </strong>
                                                            </span>
                                                        </a>
                                                        <br>
                                                        <span class="inline-block text-muted">{{ $employee_project->project->status }} </span><br>
                                                        <span class="inline-block text-muted">
                                                            {{ date("F jS, Y", strtotime($employee_project->project->start_date)) }} - {{ date("F jS, Y", strtotime($employee_project->project->end_date)) }}
                                                        </span>
                                                    @else
                                                        <span class="inline-block text-muted text-danger">
                                                            Task not attached to project
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="inline-block text-muted">
                                                        Start{{ $employee_project->start_date > date_create() ? "s": "ed" }} {{ $employee_project->start_date->diffForHumans() }}
                                                    </span>
                                                    <br>
                                                    <span class="inline-block text-muted">
                                                        End{{ $employee_project->end_date > date_create() ? "s": "ed" }} {{ $employee_project->end_date->diffForHumans() }}
                                                    </span>
                                                </td>
                                                 @if(auth()->user()->hasAnyPermission(['read_employee_tasks','edit_employee_tasks','delete_employee_tasks','download_employee_tasks']))
                                                 <td style="min-width:120px;" class="text-center">
                                                    <div {{-- class="btn-group" --}}>
                                                        @if(auth()->user()->can('read_employee_tasks'))
                                                           <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('task.show', $employee_project->id) }}" role="button" ></a>
                                                        @endif

                                                        @if(auth()->user()->can('download_employee_tasks')) 
                                                           @if($employee_project->document_url)
                                                           <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-cloud-download " href="{{route('download.employee_project', $employee_project)  }}" role="button"></a>
                                                           @endif  
                                                        @endif

                                                        @if(auth()->user()->can('edit_employee_tasks'))
                                                          <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('employee-project.show' , $employee_project->id) }}" role="button"></a>
                                                        @endif

                                                        @if(auth()->user()->can('delete_employee_tasks'))
                                                          <a class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-projectid="{{ $employee_project->id }}"></a>
                                                        @endif
                                                    </div> 
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    No employee has been assigned a task yet!
                                </p>
                                @if(auth()->user()->can('add_employee_tasks'))
                                <a href="{{ route("employee-project.create") }}">
                                    Assign task to employee
                                </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <!--Delete modal start -->
                <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id="delete-form" method="post" id="deleteFormId">
                                    {{csrf_field()}} 
                                    {{method_field('DELETE')}} 
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="projectId" name="_method" value="DELETE" >
                                    </div>
                                    
                                    <h4 class="text-center">Are you sure you want to delete this data?</h4>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success px-5">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Delete modal end -->
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var projectId = button.data('projectid') // Extract info from data-* attributes

                console.log(projectId);

                var modal = $(this)
                $('#delete-form').attr('action', "employee-project/"+projectId);
            })
        });
    </script>
@endsection