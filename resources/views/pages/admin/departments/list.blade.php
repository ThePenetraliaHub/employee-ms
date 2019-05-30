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
                @if(count($departments) > 0)
                    <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new Department
                    </a>
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($departments) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($departments as $department)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $department->name}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="{{ route('department.show' , $department->id) }}" role="button" style=" margin-right: 5px; ">Edit </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-deptId="{{ $department->id }}">Delete</a>
                                                    </div> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col text-center"> 
                                <h3 class="text-muted">No departments yet!</h3>
                                <a href="{{ route("department.create") }}">
                                    <button class="btn btn-primary ">Add Department</button>
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
                                        <input type="hidden" class="form-control" id="deptId" name="_method" value="DELETE" >
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
                var dept_id = button.data('deptid') // Extract info from data-* attributes
                console.log("Dept Id: "+dept_id);

                var modal = $(this)
                $('#delete-form').attr('action', "department/"+dept_id);
            })
            // Delete script
           // $('.delete-btn').on('click', function(){
           //      $('deleteModal').modal('show');
           //      $tr = $(this).closest('tr');

           //      var data = $tr.children('td').map(function(){
           //          return $(this).text();
           //      }).get();

           //      console.log(data);
           //      $('#id').val(data[0]);
           //      $('#deleteFormId').attr('action','/department/'+data[0]);
           //  });
        });
    </script>
@endsection