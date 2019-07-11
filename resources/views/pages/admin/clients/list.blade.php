@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Clients
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($clients) > 0)
                    <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create client
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($clients) > 0)
                            <div class="table-responsive table-bordered">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                      @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $client->id}} </td>
                                            <td><a href="{{ route('client.details' ,$client->id) }}">{{ $client->name}}</a></td>
                                            <td>{{ $client->address}}</td>
                                            <td>
                                                <span class="text-muted">{{ $client->contact_number}} </span><br>
                                                <span class="text-muted">{{ $client->contact_email}}</span>
                                            </td>
                                            <td>{{ $client->company_url}} </td>
                                            <td>
                                                {!!($client->status == 1? "<span class='label label-success'>Active</span>" : "<span class='label label-warning'>Inactive</span>")!!}
                                            </td>
                                            <td style="min-width: 80px;" class="text-center">
                                                <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('client.show' ,$client->id) }}" role="button" style=" margin-right: 5px; "></a>
                                                <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId="{{ $client->id }}"></a>
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
                                    No clients yet!
                                </p>
                                <a href="{{ route("client.create") }}">
                                    Create Client
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
                var client_id = button.data('clientid') // Extract info from data-* attributes
                console.log(client_id);
                var modal = $(this)
                $('#delete-form').attr('action', "client/"+client_id);
            })
        });
    </script>
@endsection