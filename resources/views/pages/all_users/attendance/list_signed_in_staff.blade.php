@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            Employees Attendance
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Filter by:</h3>
                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Report</button>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <select id="status" class="form-control" name="status">
                                            <option value="all" selected>All Status</option>
                                            <option value="prensent">Present</option>
                                            <option value="absent">Abscent</option>
                                        </select>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="radio">
                                            <label class="pr-5">
                                                <input  id="late" type="radio" name="choice">
                                                Late
                                            </label>
                                            <label class="pr-5">
                                                <input  id="early-leaving"  type="radio" name="choice" >
                                                Early Leaving
                                            </label>
                                            <label class="pr-5">
                                                <input  id="over-time"  type="radio" name="choice">
                                                Over Time
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        @if($work_day->present()->count() > 0)
                            <div class="table-responsive table-bordered" id="print">
                               <table id="dataTable" class="table table-striped table-responsive">
                                  <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Clock In</th>
                                        <th scope="col">Clock Out</th>
                                        <th scope="col">Late</th>
                                        <th scope="col">Early Leaving</th>
                                        <th scope="col">Over Time</th>
                                        <th scope="col">Work Hour</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                        {{-- {{dd($work_day->present_and_absent())}} --}}
                                        @foreach($work_day->present_and_absent() as $attendance)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td data-input="name">
                                                    <a href="{{ route("employee.profile", $attendance->employee_id) }}">
                                                        {{ $attendance->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($attendance->time_in != null)
                                                        {{ $attendance->time_in }}
                                                    @else
                                                        <p class="text-danger">-- : -- : --</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($attendance->time_out != null)
                                                        {{ $attendance->time_out }}
                                                    @else
                                                        <p class="text-danger">-- : -- : --</p>
                                                    @endif
                                                </td>
                                                <td>30 Min.</td>
                                                <td>30 Min</td>
                                                <td>-</td>
                                                <td>7Hrs</td>
                                                <td class="text-center">
                                                    @if($attendance->present == 0 || $attendance->work_day_id == null)
                                                        <span class='label label-warning label-sm'>
                                                            Abscent
                                                        </span>
                                                        @if($attendance->present == 0 && $attendance->absence_reason != "")
                                                            <br>
                                                            <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Absence Reason" data-content="{{ $attendance->absence_reason }}" data-placement="top"></button>
                                                        @endif
                                                    @else
                                                        <span class='label label-success label-sm'>
                                                            Present
                                                        </span>
                                                    @endif</td>
                                                <td style="min-width: 120px;" class="text-center">
                                                    <a class=" delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-clientId=""></a>
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
                                    Your attendance records for today will appear here
                                </p>
                                
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

            //Code to hide and show user selection field based on message type selection
            const status = document.getElementById('status');
            if(status != null){
                if(status.value == "absent"){
                    $("#late").attr('disabled','disabled');
                    $("#early-leaving").attr('disabled','disabled');
                    $("#over-time").attr('disabled','disabled');
                }else{
                    $("#late").removeAttr('disabled');
                    $("#early-leaving").removeAttr('disabled');
                    $("#over-time").removeAttr('disabled');
                }

                status.addEventListener("change", ()=>{
                    if(status.value == "absent"){
                        $("#late").attr('disabled','disabled');
                        $("#early-leaving").attr('disabled','disabled');
                        $("#over-time").attr('disabled','disabled');
                    }else{
                        $("#late").removeAttr('disabled');
                        $("#early-leaving").removeAttr('disabled');
                        $("#over-time").removeAttr('disabled');
                    }
                });
            }
        });
    </script>
@endsection