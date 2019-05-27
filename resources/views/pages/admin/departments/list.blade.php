@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
      <h1>
        Departments
        <small>View</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body">

                    @if(count($departments) > 0)
                        <div class="table-responsive table-bordered">
                           <table id="example" class="table table-striped table-responsive">
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
                                        <td>{{ $department->id }} </td>
                                        <td>{{ $department->name}}</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#edit{{ $department->id }}">
                                                 <a data-toggle="tooltip" data-placement="top" title="Edit Department Information" class="fa fa-edit fa-2x pointer ml-3">
                                                 </a>
                                            </span>   
                                            <span data-toggle="modal" data-target="#edit{{ $department->id }}">
                                                 <a data-toggle="tooltip" data-placement="top" title="Edit Department Information" class="fa fa-remove fa-2x pointer ml-3">
                                                 </a>
                                            </span>   
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
                                <button class="btn btn-success">Add Department</button>
                            </a>
                        </div>
                    @endif
                </div>
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