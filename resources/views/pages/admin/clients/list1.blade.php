@extends('layouts.layout')
 @section('title', '|Clients') 

@section('content')
    <section class="content-header">
      <h1>
        Clients
        <small>View</small>   
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">View all Clients</h3>
                    </div>  
                    @include('partials._actionMessage')
                    <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm ml-3 mt-4">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create New
                    </a> 
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
                                <p>No Client yet</p>
                                <a href="{{ route('client.create') }}">
                                    <button class="btn btn-success">Add Clients</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

    </script>
@endsection