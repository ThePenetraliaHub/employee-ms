@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Attendance <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if($attendances->count() > 0)
                   <div class="x_content">
                        <!-- <div class="box-header with-border">
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
                            </form>
                        </div> --> 
                    <table id="datatable" class="table table-striped table-bordered">
                      
                      <thead>
                        <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                        <th>Late</th>
                        <th>Early Leaving</th>
                        <th>Over Time</th>
                        <th>Work Hour</th>
                        <th class="text-center">Status</th>
                        </tr>
                      </thead>

                      <tbody>
                             @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ date_create($attendance->date)->format("F jS, Y") }}
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
                                        @if($attendance->present == 0 || $attendance->work_day_id == null)
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
         </div>

      </div>



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