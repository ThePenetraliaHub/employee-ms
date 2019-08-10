<div class="form-row">
    <div class="form-group col-xs-11 mb-0 mt-3">
        <label for="date">Employee</label>
        <input id="text" disabled type="text" class="form-control" value="{{ $attendance->employee->name }} ({{ $attendance->employee->employee_number }})">
    </div>

    <div id="time_out_div" class="form-group col-xs-11{{ $errors->has('time_out') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="time_out">Time in</label>
        <input id="time_out" type="time" class="form-control" name="time_out" value="{{ old('time_out', "00:00") }}" required>
        @if ($errors->has('time_out'))
            <span class="help-block">
                <strong>{{ $errors->first('time_out') }}</strong>
            </span>
        @endif
    </div>
</div>