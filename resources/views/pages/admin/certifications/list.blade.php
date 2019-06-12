@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Certifications
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($certifications) > 0)
                    <a href="{{ route('certification.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add Employee Certification
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($certifications) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Employee Details</th>
                                            <th scope="col">Certification Title</th>
                                            <th scope="col">Award Institution/Body</th>
                                            <th scope="col">Awarded On</th>
                                            <th scope="col">Valid Through</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($certifications as $certification)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="inline-block"><strong> {{ $certification->employee->name }} </strong></span><br>
                                                    <span class="inline-block text-muted">{{ $certification->employee->employee_number }}</span><br>
                                                    <span class="inline-block text-muted">{{ $certification->employee->job_title->title }}</span>
                                                </td>
                                                <td>{{ $certification->certification}}</td>
                                                <td>{{ $certification->institution}}</td>
                                                <td>{{ $certification->granted_on}}</td>
                                                <td>{{ $certification->valid_on}}</td>
                                                <td>
                                                    <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="{{route('download', $certification->document_url)  }}" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('certification.edit' , $certification->id) }}" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="{{ $certification->id}}"></a>
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
                                    Employees do not have certifications yet!
                                </p>
                                <a href="{{ route("certification.create") }}">
                                    Add Certifications
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
                console.log("employee_status id: "+certId);

                var modal = $(this)
                $('#delete-form').attr('action',certId);
            })
        
        });
    </script>
@endsection