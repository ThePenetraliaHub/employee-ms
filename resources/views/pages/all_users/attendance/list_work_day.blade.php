@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Work Days
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(count($work_days) > 0)
                    @if(auth()->user()->can('add_working_days'))
                    <a href="{{ route('work-day.create') }}" class="btn btn-primary btn-sm my-2">
                        <span class="fa fa-plus-circle mr-2"></span>
                        Create new work day
                    </a> 
                   <div class="box-body">
                            <div class="row">
                                <form action="{{ route('import.workday') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="file" name="file" >

                                    <br>

                                    <button class="btn btn-success" type="submit">Import Work Days</button>

                                    <!-- <a class="btn btn-warning" href="">Export User Data</a> -->

                                </form>
               
                            </div>
                    </div> 
                    @endif
                @endif
                <div class="box">
                    <div class="box-body">
                        @if(count($work_days) > 0)
                            <div class="table-responsive table-bordered">
                                <table id="dataTable" class="table table-striped table-responsive">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Date</th>
                                            <th scope="col"  class="text-center">Official Hours</th>
                                            <th scope="col">Day Type</th>
                                            @if(auth()->user()->hasAnyPermission(['read_working_days','edit_working_days','delete_working_days']))
                                            <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($work_days as $work_day)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $work_day->date->format("F jS, Y")}}</td>
                                                <td class="text-center">
                                                    {{ $work_day->start_time }} - {{ $work_day->end_time }}
                                                </td>
                                                <td>{{ $work_day->day_type}}</td>
                                                @if(auth()->user()->hasAnyPermission(['read_working_days','edit_working_days','delete_working_days']))
                                                <td class="text-center">
                                                     @if(auth()->user()->can('read_working_days'))
                                                     <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('work-day.show' , $work_day->id) }}" role="button" >
                                                     </a>
                                                     @endif

                                                     @if(auth()->user()->can('edit_working_days'))
                                                     <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-edit" href="{{ route('work-day.edit' , $work_day->id) }}" role="button">
                                                    </a>
                                                    @endif

                                                     @if(auth()->user()->can('delete_working_days'))
                                                     <a class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-work_day="{{ $work_day->id }}"></a>
                                                     @endif
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
                                    No work days yet!
                                </p>
                                @if(auth()->user()->can('add_working_days'))
                                <a href="{{ route("work-day.create") }}">
                                    Create work day
                                </a>
                                @endif
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
                                <form id="delete-form" method="post">
                                    {{csrf_field()}} 
                                    {{method_field('DELETE')}} 
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="workDay" name="_method" value="DELETE" >
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
                var workDay = button.data('work_day') // Extract info from data-* attributes
                console.log(workDay);
                var modal = $(this)
                $('#delete-form').attr('action', "work-day/"+workDay);
            })
        });
    </script>
@endsection