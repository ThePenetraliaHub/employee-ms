@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clients <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  @if(count($clients) > 0)
                    @if(auth()->user()->can('add_clients'))
                    <a href="{{ route('client.create') }}" class="btn btn-success btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new client
                    </a>
                    @endif
                @endif
                  @if(count($clients) > 0)
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Website</th>
                        @if(auth()->user()->hasAnyPermission(['read_clients','edit_clients','delete_clients']))
                        <th scope="col" class="text-center">Actions</th>
                        @endif
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($clients as $client)
                        <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <a href="{{ route('client.details', $client->id) }}">
                                {{ $client->name}}
                            </a>
                            <br>
                            @if($client->status == 0)
                                <span class="inline-block text-muted">
                                    <span class='label label-warning'>Inactive</span>
                                </span>
                            @else
                                <span class="inline-block text-muted">
                                    <span class='label label-success'>Active</span>
                                </span>
                            @endif
                        </td>
                        <td>{{ $client->address}}</td>
                        <td>
                            <span class="text-muted">{{ $client->contact_number}} </span><br>
                            <span class="text-muted">{{ $client->contact_email}}</span>
                        </td>
                        <td>{{ $client->company_url}} </td>
                        @if(auth()->user()->hasAnyPermission(['read_clients','edit_clients','delete_clients']))
                        <td class="text-center" style="min-width: 120px;">
                        <div class="btn-group">
                        @if(auth()->user()->can('read_clients'))
                            <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('client.details', $client->id) }}" role="button" ></a>
                            @endif

                            @if(auth()->user()->can('edit_clients'))
                            <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('client.show' ,$client->id) }}" role="button"></a>
                            @endif

                            @if(auth()->user()->can('delete_clients'))
                            <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId="{{ $client->id }}"></a>
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
                          No clients yet!
                          </p>
                          @if(auth()->user()->can('add_clients'))
                          <a href="{{ route("client.create") }}">
                              Create Client
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
                                <input type="hidden" class="form-control" id="client_id" name="_method" value="DELETE" >
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
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var client_id = button.data('clientid') // Extract info from data-* attributes
                console.log(client_id);
                var modal = $(this)
                $('#delete-form').attr('action', "client/"+client_id);
            })
        });
    </script>
@endsection