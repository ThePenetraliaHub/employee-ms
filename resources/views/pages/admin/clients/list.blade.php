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
                        Create new Client
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
                                        <th scope="col">Details</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date of Contact </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                      @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $client->id}} </td>
                                            <td>{{ $client->name}}</td>
                                            <td>{{ $client->details}} </td>
                                            <td>{{ $client->address}}</td>
                                            <td>{{ $client->contact_number}} </td>
                                            <td>{{ $client->contact_email}}</td>
                                            <td>{{ $client->company_url}} </td>
                                            <td>{{ $client->status}}</td>
                                            <td>{{ $client->first_contact_date}} </td>
                                            <td> <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('client.show' ,$client->id) }}" role="button" style=" margin-right: 5px; ">Edit </a>
                                            <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId= {{ $client->id}}>Delete</a></td>
                                            
                                        </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                            </div>
                        @else
                            <div class="col text-center"> 
                                <h3 class="text-muted">No clients yet!</h3>
                                <a href="{{ route("client.create") }}">
                                    <button class="btn btn-primary ">Add Client</button>
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
                var client_id = button.data('client_id') // Extract info from data-* attributes

                var modal = $(this)
                $('#delete-form').attr('action', "client/"+client_id);
            })
        });
    </script>
@endsection