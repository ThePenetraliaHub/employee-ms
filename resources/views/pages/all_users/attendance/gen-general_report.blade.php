@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>General Attendance <small>view</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                   <div class="x_content">
                            <!-- <div class="box-header with-border">
                                <h3 class="box-title">Filter by:</h3>
                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Report</button>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Report Type:</label>
                                        <select class="form-control" name="name">
                                            <option>Grouped Report</option>
                                            <option>Ungrouped Report</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                        <label for="employee_id">Employee</label>
                                        <select class="form-control " id="employee_id" name="employee_id">
                                            <option value=""></option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" @if (old('employee_id') == $employee->id) {{  'selected'  }} @endif> {{ $employee->name }} ({{ $employee->employee_number }}) </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('employee_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('employee_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label>From Date:</label>
                                        <input placeholder="From Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fromDate">
                                    </div>

                                    <div class="col-md-3">
                                        <label>To Date:</label>
                                        <input placeholder="To Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="toDate">
                                    </div>

                                    <div class="col-md-3">
                                        <label>Attendace Status:</label>
                                        <select class="form-control" name="status">
                                            <option disabled selected="">All Status</option>
                                            <option>Present</option>
                                            <option>Abscent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="late">
                                                Late
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="earlyLeaving" >
                                                Early Leaving
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="overTime">
                                                Over Time
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                  @if($work_days->count() > 0)    
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
                        <!-- <th>Day</th> -->
                        <th class="text-center">Status</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($work_days as $work_day)
                            <tr>
                                <td class="text-center text-primary" colspan="9">
                                    {{ $work_day->date->format('F jS, Y') }}
                                </td>
                            </tr>
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
                                    {{-- <td class="text-center text-primary">
                                        {{ $work_day->date->format('F jS, Y') }}
                                    </td>--}}

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
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                    @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                Attendance records for employees will appear here.
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
   
        });
    </script>
@endsection