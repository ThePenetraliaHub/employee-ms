@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projects <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($projects) > 0)
                    @if(auth()->user()->can('add_projects'))
                    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create project
                    </a>
                     @endif
                @endif
                  @if(count($projects) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Client</th>
                        <th>Timeline</th>
                        @if(auth()->user()->hasAnyPermission(['read_projects','edit_projects','delete_projects']))
                        <th class="text-center">Action</th>
                        @endif
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
                                @if(auth()->user()->hasAnyPermission(['read_projects','edit_projects','delete_projects']))
                                <td class="text-center">
                                    <div class="btn-group">
                                            @if(auth()->user()->can('read_projects'))
                                            <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('project.details', $project->id) }}" role="button" ></a>
                                            @endif

                                            @if(auth()->user()->can('edit_projects'))
                                            <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('projects.show' , $project->id) }}" role="button"></a>
                                            @endif

                                            @if(auth()->user()->can('delete_projects'))
                                            <a class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-projectId="{{ $project->id }}"></a>
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
                                No projects yet!
                        </p>
                        @if(auth()->user()->can('add_projects'))
                        <a href="{{ route("projects.create") }}">
                            Create project
                        </a> 
                        @endif
                      </div>
                  @endif
              </div>
              
              </div>
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