@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employees Attendance <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if($work_day->present_and_absent()->count() > 0)
                  <div class="x_content">
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

                            <td>
                                @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_in > $work_day->start_time)
                                    <span class="text-danger">{{ difference_in_time($attendance->time_in, $work_day->start_time) }}</span>
                                @elseif($attendance->present == 1 && $attendance->time_out != null)
                                    <span class="text-success">No</span>
                                @else
                                    <p class="text-danger">-- : -- : --</p>
                                @endif
                            </td>

                            <td>
                                @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_out < $work_day->end_time)
                                    <span class="text-danger">{{ difference_in_time($attendance->time_out, $work_day->end_time) }}</span>
                                @elseif($attendance->present == 1 && $attendance->time_out != null)
                                    <span class="text-success">No</span>
                                @else
                                    <p class="text-danger">-- : -- : --</p>
                                @endif
                            </td>

                            <td>
                                @if($attendance->present == 1 && $attendance->time_out != null && $attendance->time_out > $work_day->end_time)
                                    <span class="text-danger">{{ difference_in_time($attendance->time_out, $work_day->end_time) }}</span>
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
                                Attendance records will appear here
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
            $('#dataTable').DataTable();

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