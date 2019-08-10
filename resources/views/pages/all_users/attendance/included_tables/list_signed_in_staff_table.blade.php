@if($attendances->count() > 0)
    @foreach($attendances as $attendance)
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
                @endif</td>
            <td style="min-width: 120px;" class="text-center">
                @if($attendance->present === 1 && $attendance->time_out === null)
                    <a class="btn-info btn-sm" href="{{ route('attendance.sign_out_ind', $attendance->id) }}">
                        Sign out
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-center"><p>Attendances that satisfy the selection criteria will appear here.</p></td>
    </tr>
@endif