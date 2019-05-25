@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
      <h1>
        Departments
        <small>View</small>
      </h1>
       <div  style="margin-top: 10px;">
       <a class="btn btn-primary btn-lg " href="{{ route('department.create') }}" role="button">Create New </a> </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border text-center">
                  <h3 class="box-title">View all Departments</h3>
                </div>

                @include('partials._actionMessage')

                <div class="box-body">

                    @if(count($departments) > 0)
                        <div class="table-responsive table-bordered">
                           <table id="example" class="table table-striped table-responsive">
                              <thead>
                                <tr class="table-heading-bg">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $department->id}} </td>
                                        <td>{{ $department->name}}</td>
                                        <td>
                                          <div class="btn-group"><a class="edit-btn btn btn-info btn-sm fa fa-edit" data-toggle="modal" data-target="#editModal"
                                            href="#" role="button" style=" margin-right: 5px; "></a>
                                          <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button"></a>
                                          </div> </td>
                                    </tr>
                                   @endforeach
                               </tbody>
                           </table>
                        </div>
                    @else
                        <div class="col text-center"> 
                            <p>No departments yet</p>
                            <a href="#">
                                <button class="btn btn-success">Add Department</button>
                            </a>
                        </div>
                    @endif
                </div>
              </div>

<!--Start of Edit modal  -->
<div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body">
        <form  method="post" id="editFormId" data-parsley-validate="">
          {{csrf_field()}}
         <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" required>
          </div>
          <div class="form-group ">
            <label for="name" class="col-form-label">Department:</label>
            <input type="text" class="form-control" id="name" name="name" required>
             @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit modal end -->

<!--Delete modal start -->

<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body">
        <form method="delete" id="deleteFormId">

        <p class="text-center">Are you sure you want to delete this data?</p>
          <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="id" required>
          </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
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
    $('.edit-btn').on('click', function(){

    $('editModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children('td').map(function(){

      return $(this).text();

    }).get();

    console.log(data);

    $('#id').val(data[0]);
    $('#name').val(data[1]);
    });


  $('#editFormId').on('submit',function(e){
    e.preventDefault();
    var id = $('#id').val();

 console.log(id);

    $.ajax({
      type: "PUT",
      url: '/department/'+id,
      data: $('#editFormId').serialize(),
      success: function(response){
        console.log(response);
        $('#editModal').modal('hide');
        //alert('Data Updated');
        window.location.reload();

      },
      error: function(error){
        console.log(error);
      }
        });
    });

// Delete js code
  $('.delete-btn').on('click', function(){

    $('deleteModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children('td').map(function(){

      return $(this).text();

    }).get();

    console.log(data);

    $('#id').val(data[0]);
    });


  $('#deleteFormId').on('submit',function(e){
    e.preventDefault();
    var id = $('#id').val();

 console.log(id);

    $.ajax({
      type: "delete",
      url: '/department/delete/'+id,
      data: $('#deleteFormId').serialize(),
      success: function(response){
        console.log(response);
        $('#deleteModal').modal('hide');
        //alert('Data Updated');
        window.location.reload();

      },
      error: function(error){
        console.log(error);
      }
        });
    });



  });
</script>
<!-- <script>
  $('#editModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var department = button.data('department')
    var modal = $(this)
    // modal.find('.modal-title').text('new message to ' + recipient)
    modal.find('.modal-body #name').val(department)})
</script>  -->
@endsection