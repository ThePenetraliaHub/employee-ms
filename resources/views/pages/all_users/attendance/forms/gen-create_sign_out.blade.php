<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('attendance.sign_out.store') }}" >
    @csrf
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
    </div>

    <div id="time_in_div" class="item form-group {{ $errors->has('time_out') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time_out">Time out </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input type="time" id="time_out"   name="time_out" value="{{ old('time_out', date("H:i")) }}" required class="form-control col-md-7 col-xs-12">
            @if ($errors->has('time_out'))
                <span class="help-block">
                    <strong>{{ $errors->first('time_out') }}</strong>
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