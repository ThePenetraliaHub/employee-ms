@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Projects
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($projects) > 0)
                    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create project
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($projects) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Timeline</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> 
                                                    <a href="{{ route('project.details',$project->id) }}">
                                                        {{ $project->name}}
                                                    </a>
                                                    <br>
                                                    @if($project->status == "Completed")
                                                        <span class='label label-success label-sm'>
                                                            {{ $project->status }}
                                                        </span>
                                                    @else
                                                        <span class='label label-warning label-sm'>
                                                            {{ $project->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="inline-block"><strong> <a href="{{ route('client.details',$project->client->id) }}"> {{ $project->client->name }} </a></strong></span><br>
                                                    <span class="inline-block text-muted">
                                                        {{ $project->client->contact_number }}
                                                    </span><br>
                                                    <span class="inline-block text-muted">
                                                        {{ $project->client->contact_email }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="inline-block text-muted">
                                                        Start{{ $project->start_date > date_create() ? "s": "ed" }} {{ $project->start_date->diffForHumans() }}
                                                    </span>
                                                    <br>
                                                    <span class="inline-block text-muted">
                                                        End{{ $project->end_date > date_create() ? "s": "ed" }} {{ $project->end_date->diffForHumans() }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('project.details', $project->id) }}" role="button" ></a>

                                                        <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('projects.show' , $project->id) }}" role="button"></a>

                                                        <a class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-projectId="{{ $project->id }}"></a>
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
                                    No projects yet!
                                </p>
                                <a href="{{ route("projects.create") }}">
                                    Create project
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
                console.log("employee_status id: "+projectId);

                var modal = $(this)
                $('#delete-form').attr('action', "projects/"+projectId);
            })
        
        });
    </script>
@endsection