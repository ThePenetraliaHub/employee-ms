@extends('layouts.layout')
<!-- @section('title', 'Item') -->

@section('content')
    <section class="content-header">
        <h1>
            My Attendance
            <small>View</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                            @if($attendances->count() > 0)
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Filter by:</h3>
                                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Report</button>
                                    </div>
                                    <div class="box-body">
                                        <form>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <select id="status" class="form-control" name="status">
                                                        <option value="all" selected>All Status</option>
                                                        <option value="present">Present</option>
                                                        <option value="absent">Absent</option>
                                                    </select>
                                                </div>

                                                {{-- <div class="col-md-8">
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
                                                </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive table-bordered" id="print">
                                   <table id="dataTable" class="table table-striped table-responsive">
                                      <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Clock In</th>
                                            <th scope="col">Clock Out</th>
                                            <th scope="col">Late</th>
                                            <th scope="col">Early Leaving</th>
                                            <th scope="col">Over Time</th>
                                            <th scope="col">Work Hour</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                            @foreach($attendances as $attendance)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ \App\WorkDay::find($attendance->work_day_id)->date->format("F jS, Y") }}
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

                                                    <td>
                                                        @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_in > \App\WorkDay::find($attendance->work_day_id)->start_time)
                                                            <span class="text-danger">{{ difference_in_time($attendance->time_in, \App\WorkDay::find($attendance->work_day_id)->start_time) }}</span>
                                                        @elseif($attendance->present == 1 && $attendance->time_out != null)
                                                            <span class="text-success">No</span>
                                                        @else
                                                            <p class="text-danger">-- : -- : --</p>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_out < \App\WorkDay::find($attendance->work_day_id)->end_time)
                                                            <span class="text-danger">{{ difference_in_time($attendance->time_out, \App\WorkDay::find($attendance->work_day_id)->end_time) }}</span>
                                                        @elseif($attendance->present == 1 && $attendance->time_out != null)
                                                            <span class="text-success">No</span>
                                                        @else
                                                            <p class="text-danger">-- : -- : --</p>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_out > \App\WorkDay::find($attendance->work_day_id)->end_time)
                                                            <span class="text-danger">{{ difference_in_time($attendance->time_out, \App\WorkDay::find($attendance->work_day_id)->end_time) }}</span>
                                                        @elseif($attendance->present == 1 && $attendance->time_out != null)
                                                            <span class="text-success">No</span>
                                                        @else
                                                            <p class="text-danger">-- : -- : --</p>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($attendance->present == 1 && $attendance->time_out != null)
                                                            <span class="text-danger">{{ difference_in_time($attendance->time_out, $attendance->time_in) }}</span>
                                                        @else
                                                            <p class="text-danger">-- : -- : --</p>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        @if($attendance->present == 0 || $attendance->absence_reason == null)
                                                            <span class='label label-warning label-sm'>
                                                                Absent
                                                            </span>
                                                            @if($attendance->present == 0 && $attendance->absence_reason != "")
                                                                <br>
                                                                <button class="btn btn-info btn-xs glyphicon glyphicon-comment" data-toggle="popover" title="Absence Reason" data-content="{{ $attendance->absence_reason }}" data-placement="top"></button>
                                                            @endif
                                                        @else
                                                            <span class='label label-success label-sm'>
                                                                Present
                                                            </span>
                                                        @endif
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
                                        Your attendance records will appear here
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
            table = $('#dataTable').DataTable();

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
                if(status.value == "absent" || status.value == 'all'){
                    $("#late").attr('disabled','disabled');
                    $("#early-leaving").attr('disabled','disabled');
                    $("#over-time").attr('disabled','disabled');
                }else{
                    $("#late").removeAttr('disabled');
                    $("#early-leaving").removeAttr('disabled');
                    $("#over-time").removeAttr('disabled');
                }

                status.addEventListener("change", ()=>{
                    if(status.value == "absent" || status.value == 'all'){
                        $("#late").attr('disabled','disabled');
                        $("#early-leaving").attr('disabled','disabled');
                        $("#over-time").attr('disabled','disabled');
                    }else{
                        $("#late").removeAttr('disabled');
                        $("#early-leaving").removeAttr('disabled');
                        $("#over-time").removeAttr('disabled');
                    }

                    // $.ajax({
                    //     url: '{! route("attendance.filter_attendance_by_status", \App\WorkDay::find($attendance->work_day_id)->id) !}',
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     type: "POST",
                    //     data: { status : status.value },
                    //     success: function(data){
                    //         $('#dataTable').find('tbody').html(data);
                    //     },
                    // });
                });
            }
        });
    </script>
@endsection