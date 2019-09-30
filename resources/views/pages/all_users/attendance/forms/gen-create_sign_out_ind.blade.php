<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('attendance.sign_out_ind.store', $attendance->id) }}" >
    @csrf
    <div class="item form-group ">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Employee 
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="date"  value="{{ $attendance->employee->name }} ({{ $attendance->employee->employee_number }})"  readonly value="{{ date_create('now')->format('F jS, Y') }}" required="required" class="form-control col-md-7 col-xs-12">
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