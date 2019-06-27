@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employees
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($employees) > 0)
                    <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new Employee
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($employees) > 0)
                            <div class="table-responsive table-bordered">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Employee No.</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Supervisor</th>
                                        <th scope="col">Join Date</th>
<!--                                         <th scope="col">Employment Status</th> -->
                                        <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $loop->iteration}} </td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->employee_number}} </td>
                                            <td>{{ $employee->department->name}}</td> 
                                            <td>{{ $employee->job_title->title}} </td>
                                            <td>
                                                @if($employee->supervisor)
                                                    {{ $employee->supervisor->name }}
                                                @endif
                                            </td>
                                            <td>{{ $employee->joined_date}} </td>
                                         <!--    <td>{{ $employee->employee_status->title}}</td> -->
                                            <td> 
                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('userProfile' ,$employee->id) }}" role="button" style=" margin-right: 5px; "> </a>
                                                <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-employeeId="{{ $employee->id }}"></a>
                                                <!-- <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('employee.show' ,$employee->id) }}" role="button" style=" margin-right: 5px; "> </a>
                                                <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-employeeId="{{ $employee->id }}"></a> -->
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
                                    No Employees yet!
                                </p>
                                <a href="{{ route("employee.create") }}">
                                    Add Employee
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
                                        <input type="hidden" class="form-control" id="employee_id" name="_method" value="DELETE" >
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
                var employee_id = button.data('employeeid') // Extract info from data-* attributes
                console.log(employee_id);
                var modal = $(this)
                $('#delete-form').attr('action', "employee/"+employee_id);
            })
        });
    </script>
@endsection