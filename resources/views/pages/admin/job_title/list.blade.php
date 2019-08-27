@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Job titles
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($job_titles) > 0)
                     @if(auth()->user()->can('add_job_titles'))
                    <a href="{{ route('job-title.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create job title
                    </a>
                    <div class="box-body">
                            <div class="row">
                                <form action="{{ route('import.jobtitle') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="file" name="file" class="form-control">

                                    <br>

                                    <button class="btn btn-success" type="submit">Import Job Title</button>

                                    <a class="btn btn-warning" href="{{ route('export.jobtitle') }}">Export Job Title</a>

                                </form>
               
                            </div>
                    </div>
                    @endif
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($job_titles) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            @if(auth()->user()->hasAnyPermission(['edit_job_titles','delete_job_titles']))
                                            <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($job_titles as $job_title)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $job_title->code}}</td>
                                                <td>{{ $job_title->title}}</td>
                                                <td>{{ $job_title->description}}</td>
                                                @if(auth()->user()->hasAnyPermission(['edit_job_titles','delete_job_titles']))
                                                <td class="text-center">
                                                    <div class="btn-group">

                                                        @if(auth()->user()->can('edit_job_titles'))
                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('job-title.show' , $job_title->id) }}" role="button" style=" margin-right: 5px; "></a>
                                                        @endif
                                                        @if(auth()->user()->can('delete_job_titles'))
                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-jobTitleId="{{ $job_title->id }}"></a>                                                     
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
                                    No job titles yet!
                                </p>
                                @if(auth()->user()->can('add_job_titles'))
                                <a href="{{ route("job-title.create") }}">
                                    Create job title
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
                                        <input type="hidden" class="form-control" id="jobTitleId" name="_method" value="DELETE" >
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
                var job_title_id = button.data('jobtitleid') // Extract info from data-* attributes
                console.log("Job id: "+job_title_id);

                var modal = $(this)
                $('#delete-form').attr('action', "job-title/"+job_title_id);
            })
            
        });
    </script>
@endsection