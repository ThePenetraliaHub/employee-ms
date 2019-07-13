@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Administrators
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($users) > 0)
                    <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Add administrator
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($users) > 0)
                            <div class="table-responsive table-bordered">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact Info</th>
                                        <th scope="col">Created</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration}} 
                                                @if($user->is_active == 0)
                                                    <span class="inline-block text-muted">
                                                        <span class='label label-warning'>Inactive</span>
                                                    </span>
                                                @else
                                                    <span class="inline-block text-muted">
                                                        <span class='label label-success'>Active</span>
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <img class="img-rounded" style="width: 40px; height: 40px:" src="{{ $user->user_avatar }}">
                                                <a href="{{ route("admin.profile", $user->owner->id) }}">
                                                    <span class="inline-block"><strong> {{ $user->name }} </strong></span>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="inline-block text-muted">{{ $user->email }}</span><br>
                                                <span class="inline-block text-muted">{{ $user->owner->phone }}</span>
                                            </td>
                                            <td>{{ $user->created_at->diffForHumans() }} </td>
                                            <td class="text-center"> 

                                                <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('admin.profile', $user->owner->id) }}" role="button" ></a>

                                                @if($user->id != auth()->user()->id)
                                                    <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-userId="{{ $user->id }}"></a>
                                                @else
                                                    <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('admin.show' , $user->id) }}" role="button"></a>
                                                @endif

                                                {{-- Use the user active/inactive status to detect which icon to show --}}
                                                @if($user->is_active == 1 && $user->id != auth()->user()->id)
                                                    <a data-toggle="tooltip" data-placement="top" title="Deactivate Employee Account" class="active btn-sm btn btn-warning glyphicon glyphicon-lock text-danger pointer" data-userId="{{ $user->id }}">
                                                    </a>
                                                @elseif($user->is_active == 0 && $user->id != auth()->user()->id)
                                                    <a data-toggle="tooltip" data-placement="top" title="Activate Employee Account" class="active btn-sm btn btn-success glyphicon glyphicon-unlock text-success pointer" data-userId="{{ $user->id }}">
                                                    </a>
                                                @endif
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
                                    No admins yet!
                                </p>
                                <a href="{{ route("admin.create") }}">
                                    Add administrator
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
                var user_id = button.data('userid') // Extract info from data-* attributes

                var modal = $(this)
                $('#delete-form').attr('action', "admin/"+user_id);
            })

            //Code that handles the activation and deactivation of administrator account
            $(".active").on('click',(function(e) {
                e.preventDefault()

                var user_id = $(this).attr("data-userId");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "admin/"+user_id+"/active",
                    type: "GET",
                    traditional: true,
                    contentType: false,
                    cache: false,
                    processData:false,
                    // data: new FormData(this),
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