@extends('layouts.gen-layout')

@section('content')
 <div class="right_col role="main">
      <div class="row content">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee User <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($users) > 0)
                    @if(auth()->user()->can('add_employee_user'))
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add employee user
                    </a>
                    @endif
                @endif
                  @if(count($users) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Employee Details</th>
                        <th>Contact Info</th>
                        <th>Role</th>
                        <th>Joined</th>
                        @if(auth()->user()->hasAnyPermission(['edit_employee_user','delete_employee_user','activate_deactivate_employee_user']))
                        <th class="text-center">Action</th>
                        @endif
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration}} </td>
                            <td>
                                <a href="{{ route("employee.profile", $user->owner->id) }}">
                                    <span class="inline-block">
                                        <strong> {{ $user->owner->name }} </strong>
                                    </span>    
                                </a>
                                <br>
                                <span class="inline-block text-muted">{{ $user->owner->employee_number }}</span><br>
                                <span class="inline-block text-muted">{{ $user->owner->job_title->title }}</span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    {{ $user->email}} 
                                </span>
                                <br>
                                <span class="text-muted">
                                    {{ $user->owner->home_phone}}
                                </span>
                            </td>

                            <td>
                                {{ \App\Role::where('name', $user->getRoleNames()->first())->get()->first()->display_name }}
                            </td>


                            <td>{{ $user->owner->joined_date->diffForHumans() }} </td>
                            
                            @if(auth()->user()->hasAnyPermission(['edit_employee_user','delete_employee_user','activate_deactivate_employee_user']))
                            <td class="text-center">
                                <div class="btn-group">
                                    @if(auth()->user()->can('edit_employee_user'))
                                    <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('user.show' , $user->id) }}" role="button"></a>
                                    @endif

                                
                                    @if($user->id != auth()->user()->id && auth()->user()->can('delete_employee_user'))
                                    <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-userId="{{ $user->id }}"></a>
                                    @endif
                                
                                    @if($user->is_active == 1 && $user->id != auth()->user()->id && auth()->user()->can('activate_deactivate_employee_user'))
                                    <a data-toggle="tooltip" data-placement="top" title="Deactivate Employee Account" class="activate btn-sm btn btn-warning fa fa-lock text-danger pointer"  role="button" data-user-Id="{{ $user->id }}">
                                    </a>
                                    @endif
                                
                                    @if($user->is_active == 0 && $user->id != auth()->user()->id && auth()->user()->can('activate_deactivate_employee_user'))
                                    <a data-toggle="tooltip" data-placement="top" title="Activate Employee Account" class="activate btn-sm btn btn-success fa fa-unlock text-success pointer"  role="button" data-user-Id="{{ $user->id }}">
                                    </a>
                                    @endif
                                <div>
                                
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
                            No employee users yet!
                        </p>
                        @if(auth()->user()->can('add_employee_user'))
                        <a href="{{ route("user.create") }}">
                            Add employee user
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
                        <input type="hidden" class="form-control" id="user_id" name="_method" value="DELETE" >
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
                var user_id = button.data('userid') // Extract info from data-* attributes
                
                var modal = $(this)
                $('#delete-form').attr('action', "user/"+user_id);
            })

            //Code that handles the activation and deactivation of administrator account
            $(".activate").on('click',(function(e) {
                e.preventDefault()
                var users_id = $(this).attr("data-user-Id");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "user/"+users_id+"/active",
                    type: "GET",
                    traditional: true,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(res){
                        location.reload();
                    },
                    error: function(jqXhr){
                        if( jqXhr.status === 401 ) //redirect if not authenticated user.
                            $( location ).prop( 'pathname', 'login' );
                         else {
                            Swal.fire("Admin update failed, please try again.", "", "error")
                        }
                    }
                });  
            }));
        });
    </script>
@endsection