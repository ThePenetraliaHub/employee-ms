@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employees <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($employees) > 0)
                    @if(auth()->user()->can('add_employee'))
                    <a href="{{ route('employee.create') }}" class="btn btn-success btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new employee
                    </a>
                    <div class="box-body">
                            <div class="row">
                                <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="file" name="file" class="form-control">

                                    <br>

                                    <button class="btn btn-success" type="submit">Import User Data</button>

                                    <a class="btn btn-warning" href="{{ route('export.excel') }}">Export User Data</a>

                                </form>
               
                            </div>
                    </div>
                    @endif
                @endif
                  @if(count($employees) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                    <thead>
                        <tr class="table-heading-bg">
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Supervisor</th>
                            <th>Contact</th>
                            <th>Joined</th>
<!--                                         <th scope="col">Employment Status</th> --> 
                            @if(auth()->user()->hasAnyPermission(['read_employee','edit_employee','delete_employee']))
                            <th>Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration}} </td>
                                <td>
                                    <a href="{{ route('employee.profile' ,$employee->id) }}">
                                    <img class="img-rounded" style="width: 40px; height: 40px:" src="{{ asset('storage/'.$employee->avatar) }}">
                                        {{ $employee->name }}
                                    </a>
                                </td>
                                <td>{{ $employee->job_title->title}} </td>
                                <td>
                                    @if($employee->supervisor)
                                        {{ $employee->supervisor->name }}
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted">
                                        {{ $employee->office_email}} 
                                    </span>
                                    <br>
                                    <span class="text-muted">
                                        {{ $employee->office_phone}}
                                    </span>
                                </td>
                                <td>{{ $employee->joined_date->diffForHumans() }} </td>
                                <!--    <td>{{ $employee->employee_status->title}}</td> --> 
                                @if(auth()->user()->hasAnyPermission(['read_employee','edit_employee','delete_employee']))
                                 <td class="text-center" style="min-width: 120px;">
                                     <div class="btn-group">
                                    @if(auth()->user()->can('read_employee')) 
                                    <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('employee.profile' ,$employee->id) }}" role="button" > </a>
                                        @endif

                                        @if(auth()->user()->can('edit_employee'))
                                    <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('employee.show' , $employee->id) }}" role="button" > </a>
                                    @endif

                                    @if(auth()->user()->can('delete_employee'))
                                    <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-employeeId="{{ $employee->id }}"></a>
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
                            No employees yet!
                          </p>
                        @if(auth()->user()->can('add_employee'))
                        <a href="{{ route("employee.create") }}">
                            Create Employee
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