@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employee Statuses
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($employee_statuses) > 0)
                    @if(auth()->user()->can('add_employee_statuses'))
                    <a href="{{ route('employee-status.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create employee status
                    </a>
                    @endif
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($employee_statuses) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            @if(auth()->user()->hasAnyPermission(['edit_employee_statuses','delete_employee_statuses']))
                                            <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($employee_statuses as $employee_status)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $employee_status->title}}</td>
                                                <td>{{ $employee_status->description}}</td>

                                                @if(auth()->user()->hasAnyPermission(['edit_employee_statuses','delete_employee_statuses']))
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                         @if(auth()->user()->can('edit_employee_statuses'))
                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('employee-status.show' , $employee_status->id) }}" role="button" style=" margin-right: 5px; "></a>
                                                         @endif

                                                        @if(auth()->user()->can('delete_employee_statuses'))
                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-employeeStatusId="{{ $employee_status->id }}"></a>
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
                                    No employee statuses yet!
                                </p>
                               @if(auth()->user()->can('add_employee_statuses')) 
                               <a href="{{ route("employee-status.create") }}">
                                    Create employee status
                                </a
                                >@endif
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
                                        <input type="hidden" class="form-control" id="employee_statusId" name="_method" value="DELETE" >
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
                var employeeStatusId = button.data('employeestatusid') // Extract info from data-* attributes

                var modal = $(this)
                $('#delete-form').attr('action', "employee-status/"+employeeStatusId);
            })
        
        });
    </script>
@endsection