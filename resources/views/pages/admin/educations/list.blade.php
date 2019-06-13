@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Educations
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($educations) > 0)
                    <a href="{{ route('education.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add Employee Education
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($educations) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Employee Details</th>
                                            <th scope="col">Qualification</th>
                                            <th scope="col">Award Institution/Body</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($educations as $education)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="inline-block"><strong> {{ $education->employee->name }} </strong></span><br>
                                                    <span class="inline-block text-muted">{{ $education->employee->employee_number }}</span><br>
                                                    <span class="inline-block text-muted">{{ $education->employee->job_title->title }}</span>
                                                </td>
                                                <td>{{ $education->qualification}}</td>
                                                <td>{{ $education->institution}}</td>
                                                <td>{{ $education->start_date}}</td>
                                                <td>{{ $education->end_date}}</td>
                                                <td>
                                                    <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download.education', $education)  }}" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('education.edit' , $education->id) }}" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="{{ $education->id}}"></a>
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
                                    Employees do not have educations yet!
                                </p>
                                <a href="{{ route("education.create") }}">
                                    Add educations
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
                                        <input type="hidden" class="form-control" id="certId" name="_method" value="delete" >
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
                var certId = button.data('certid') // Extract info from data-* attributes

                var modal = $(this)
                $('#delete-form').attr('action', "education/"+certId);
            })
        });
    </script>
@endsection