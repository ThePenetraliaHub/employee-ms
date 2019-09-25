@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Roles<small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($roles) > 0)
                     @if(auth()->user()->can('add_employee_roles'))
                    <a href="{{ route('role.employee.create') }}" class="btn btn-success btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new employee role
                    </a>
                    @endif
                @endif
                @if(count($roles) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                        <th >S/N</th>
                        <th >Name</th>
                        <th >Display Name</th>
                        @if(auth()->user()->hasAnyPermission(['edit_employee_roles','delete_employee_roles']))
                        <th  class="text-center">Action</th>
                        @endif
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $role->name}}</td>
                                    <td>{{ $role->display_name}}</td>
                                    
                                        @if(auth()->user()->hasAnyPermission(['edit_employee_roles','delete_employee_roles']))
                                        <td class="text-center">
                                            <div class ="btn-group"> 
                                                @if(auth()->user()->can('edit_employee_roles'))
                                                <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('role.employee.edit' , $role->id) }}" role="button"></a>
                                                @endif

                                            @if(auth()->user()->can('delete_employee_roles')) 
                                            <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-roleId="{{ $role->id }}"></a>
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
                            No employee roles yet!
                        </p>
                        @if(auth()->user()->can('add_employee_roles'))
                        <a href="{{ route("role.employee.create") }}">
                            Create employee role
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
                        <input type="hidden" class="form-control" id="roleId" name="_method" value="DELETE" >
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
                var role_id = button.data('roleid') // Extract info from data-* attributes

                var modal = $(this)

                $('#delete-form').attr('action', "{{ route('base') }}/role/"+role_id);
            })
        });
    </script>
@endsection