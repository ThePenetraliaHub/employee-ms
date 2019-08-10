<div class="form-row">
    <div class="form-group col-xs-11 mb-0 mt-3">
    	<label for="date">Day</label>
        <input id="date" disabled type="text" class="form-control" value="{{ date_create('now')->format('F jS, Y') }}">
    </div>

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id">
            <option value=""></option>
            @foreach($unsigned_out_employees as $employee)
                <option value="{{ $employee->id }}" @if (old('employee_id') == $employee->id) {{  'selected'  }} @endif> {{ $employee->name }} ({{ $employee->employee_number }}) </option>
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>

    <div id="time_out_div" class="form-group col-xs-11{{ $errors->has('time_out') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="time_out">Time out</label>
        <input id="time_out" type="time" class="form-control" name="time_out" value="{{ old('time_out', "00:00") }}" required>
        @if ($errors->has('time_out'))
            <span class="help-block">
                <strong>{{ $errors->first('time_out') }}</strong>
            </span>
        @endif
    </div>
</div>