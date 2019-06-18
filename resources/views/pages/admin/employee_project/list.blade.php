@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employee Project/Task
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($employee_projects) > 0)
                    <a href="{{ route('employee-project.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Attach Employee to Project
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($employee_projects) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Assigned</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Project</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($employee_projects as $employee_project)
                                            <tr {{ $employee_project->project->end_date < date_create() ? "class=text-danger" : "" }}>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $employee_project->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <span class="inline-block"><strong> {{ $employee_project->employee->name }} </strong></span><br>
                                                    <span class="inline-block text-muted">{{ $employee_project->employee->employee_number }}</span><br>
                                                    <span class="inline-block text-muted">{{ $employee_project->employee->job_title->title }}</span>
                                                </td>
                                                <td>
                                                    <span class="inline-block"><strong> {{ $employee_project->project->client->name }} </strong></span><br>
                                                    <span class="inline-block text-muted">{{ $employee_project->project->client->contact_number }} ({{ $employee_project->project->client->contact_email }}) </span><br>
                                                    <span class="inline-block text-muted">
                                                        {{ $employee_project->project->client->status === 0 ? "Inactive Client" : "Active Client" }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="inline-block"><strong> {{ $employee_project->project->name }} </strong></span><br>
                                                    <span class="inline-block text-muted">{{ $employee_project->project->status }} </span><br>
                                                    <span class="inline-block text-muted">
                                                        {{ date("F jS, Y", strtotime($employee_project->project->start_date)) }} - {{ date("F jS, Y", strtotime($employee_project->project->end_date)) }}
                                                    </span>
                                                </td>
                                                <td>{{ $employee_project->details}}</td>

                                                <td style="min-width:120px;">
                                                    <div class="btn-group">
                                                        @if($employee_project->document_url)
                                                            <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download.employee_project', $employee_project)  }}" role="button" style=" margin-right: 5px; "> </a>
                                                        @endif

                                                        <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('employee-project.show' , $employee_project->id) }}" role="button" style=" margin-right: 5px; "></a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-projectId="{{ $employee_project->id }}"></a>
                                                    </div> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    No employee is attached to any project yet!
                                </p>
                                <a href="{{ route("employee-project.create") }}">
                                    Attach Employee to Project
                                </a>
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