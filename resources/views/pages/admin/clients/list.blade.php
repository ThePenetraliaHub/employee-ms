@extends('layouts.layout')
 @section('title', '|Clients') 

@section('content')
    <section class="content-header">
      <h1>
        Clients
        <small>View</small>
      <div align="right" style="margin-right: 10px;">
       <a class="btn btn-primary btn-sm " href="{{ route('client.create') }}" role="button">Create New </a> </div>
     
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">View all Clients</h3>
                </div>

                <div class="box-body">

                    @if(count($clients) > 0)
                        <div class="table-responsive table-bordered">
                           <table id="example" class="table table-striped table-responsive">
                              <thead>
                                <tr class="table-heading-bg">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Contact Email</th>
                                    <th scope="col">Company Website</th>
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
                                        <td><a class="btn btn-info btn-sm" href="#" role="button" style=" margin-right: 5px; margin-bottom: 5px;" data-toggle="modal" data-target="#exampleModal">Edit</a><a class="btn btn-danger btn-sm " href="#" role="button">Delete</a> </td>
                                        
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

<!-- modal start -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Client Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Upadte</button>
      </div>

    </div>
  </div>
</div>

<!-- modal end -->

              </div>
            </div>
      </div>
    </section>
@endsection


<!-- @section('scripts')
<script src="{{ asset('js/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }} "></script>
<script>
  $(document).ready(function () {
    $('#datatable').dataTable();
  });
</script>
@endsection -->