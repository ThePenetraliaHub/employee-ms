<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('attendance.sign_in.store') }}" >
    @csrf
    <div class="text-center"><span class="text-info ">You need not sign in a staff that is absent with no reason</span></div>
    <div class="item form-group {{ $errors->has('date') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Day 
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="date"   readonly value="{{ date_create('now')->format('F jS, Y') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="employee_id" name="employee_id"required="required" style="width: 100%;">
        @foreach($unsigned_in_employees as $employee)
                <option value="{{ $employee->id }}" @if (old('employee_id') == $employee->id) {{  'selected'  }} @endif> {{ $employee->name }} ({{ $employee->employee_number }}) </option>
        @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('present') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="present">Attendance Status<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="present" name="present"required="required" style="width: 100%;">
        <option value="1" @if(old("present") == "1") {{ "selected" }} @endif>Present</option>
        <option value="0" @if(old("present") == "0") {{ "selected" }} @endif>Absent</option>
        </select>
        @if ($errors->has('present'))
            <span class="help-block">
                <strong>{{ $errors->first('present') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div id="time_in_div" class="item form-group {{ $errors->has('time_in') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time_in">Time in </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input type="time" id="time_in"   name="time_in" value="{{ old('time_in', date("H:i")) }}" required class="form-control col-md-7 col-xs-12">
            @if ($errors->has('time_in'))
                <span class="help-block">
                    <strong>{{ $errors->first('time_in') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div id="absence_reason_div" class="item form-group {{ $errors->has('absence_reason') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="absence_reason">Absence Reason</label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
        <textarea placeholder="Please state employee absence reason here..." name="absence_reason" class="form-control" style="height: 120px">{{ old('absence_reason') }}</textarea>
            @if ($errors->has('absence_reason'))
                <span class="help-block">
                    <strong>{{ $errors->first('absence_reason') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('attendance.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Create</button>
    </div>
    </div >
</form>