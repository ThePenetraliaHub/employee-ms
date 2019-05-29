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

    <!--Start of Edit modal  -->
   <!--  <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Edit Client Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>

              <div class="modal-body">
                <form  method="post" action="/client" id="editFormId" data-parsley-validate="">
                  {{csrf_field()}}  
                  {{method_field('PUT')}}  
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="id" name="id" >
                        </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Details:</label>
                            <input type="text" class="form-control" id="details" name="details" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Contact Number:</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Contact Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Company URL:</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">Status:</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                          </div>
                          <div class="form-group ">
                            <label for="name" class="col-form-label">First Contacted Date:</label>
                            <input type="date" class="form-control" id="contactdate" name="contactdate" required>
                          </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                 </form>
              </div>
          </div>
      </div>
    </div> -->
<!--Edit modal end -->
<!--Delete modal start -->
                <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                </div>

                <div class="modal-body">
                <form method="post" action="/client" id="deleteFormId">
                {{csrf_field()}} 
                {{method_field('DELETE')}} 
                <div class="form-group">
                <input type="hidden" class="form-control" id="clientId" name="_method" value="DELETE" >
                </div>
                <p class="text-center">Are you sure you want to delete this data?</p>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success" >Yes</button>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                <!--Delete modal end -->

              </div>
            </div>
      </div>
    </section>
@endsection

@section('script')
<script>
  $(document).ready(function () {
    $('#dataTable').DataTable();

// edit script
    // $('.edit-btn').on('click', function(){

    // $('editModal').modal('show');

    // $tr = $(this).closest('tr');

    // var data = $tr.children('td').map(function(){

    //   return $(this).text();

    // }).get();

    // console.log(data);

    // $('#id').val(data[0]);
    // $('#name').val(data[1]);
    // $('#details').val(data[2]);
    // $('#address').val(data[3]);
    // $('#contact').val(data[4]);
    // $('#email').val(data[5]);
    // $('#url').val(data[6]);
    // $('#status').val(data[7]);
    // $('#contactdate').val(data[8]);

    // $('#editFormId').attr('action','/client/'+data[0]);
    // });

//Delete script

  $('.delete-btn').on('click', function(){
                $('deleteModal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[0]);
                $('#deleteFormId').attr('action','/client/'+data[0]);
            });
        });

</script>
@endsection