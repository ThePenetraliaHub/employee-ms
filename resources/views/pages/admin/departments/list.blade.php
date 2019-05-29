@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Departments
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    @include('partials._actionMessage')

                    <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm ml-3 mt-4">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create New
                    </a>

                    <div class="box-body">
                        @if(count($departments) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
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
                                                    <div class="btn-group">
                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('department.show' ,$department->id) }}" role="button" style=" margin-right: 5px; ">Edit </a>

                                                        <a class=" delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-deptId= {{ $department->id}}>Delete</a>
                                                    </div> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col text-center"> 
                                <p>No departments yet</p>
                                <a href="#">
                                    <button class="btn btn-success ">Add Department</button>
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
                <h5 class="modal-title text-center" id="exampleModalLabel">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                </div>

                <div class="modal-body">
                <form  method="post" action="/department" id="editFormId" data-parsley-validate="">
                {{csrf_field()}}  
                {{method_field('PUT')}}  
                <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" >
                </div>
                <div class="form-group ">
                <label for="name" class="col-form-label">Department:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @if($errors->has('name'))
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
                <form method="post" action="/department" id="deleteFormId">
                {{csrf_field()}} 
                {{method_field('DELETE')}} 
                <div class="form-group">
                <input type="hidden" class="form-control" id="deptId" name="_method" value="DELETE" >
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
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            // edit script
            // $('.edit-btn').on('click', function(){
            //     $('editModal').modal('show');
            //     $tr = $(this).closest('tr');

            //     var data = $tr.children('td').map(function(){
            //         return $(this).text();
            //     }).get();

            //     console.log(data);
            //     $('#id').val(data[0]);
            //     $('#name').val(data[1]);
            //     $('#editFormId').attr('action','/department/'+data[0]);
            // });

            // Delete script
           $('.delete-btn').on('click', function(){
                $('deleteModal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[0]);
                $('#deleteFormId').attr('action','/department/'+data[0]);
            });
        });
    </script>
@endsection