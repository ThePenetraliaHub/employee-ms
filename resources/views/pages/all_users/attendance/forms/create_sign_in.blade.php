<div class="form-row">
    <div class="form-group col-xs-11 mb-0 mt-3">
    	<label for="date">Day</label>
        <input id="date" disabled type="text" class="form-control" value="{{ date_create('now')->format('F jS, Y') }}">
    </div>

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id">
            <option value=""></option>
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

    <div class="form-group col-xs-11{{ $errors->has('present') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="present">Attendance Status</label>
        <select class="form-control" name="present" id="present">
            <option value=""></option>
            <option value="0" @if(old("present") == "0") {{ "selected" }} @endif>Present</option>
            <option value="1" @if(old("present") == "1") {{ "selected" }} @endif>Absent</option>
        </select>
        @if ($errors->has('present'))
            <span class="help-block">
                <strong>{{ $errors->first('present') }}</strong>
            </span>
        @endif
    </div>

    <div id="time_in_div" class="form-group col-xs-11{{ $errors->has('time_in') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="time_in">Time in</label>
        <input id="time_in" type="time" class="form-control" name="time_in" value="{{ old('time_in', "00:00") }}" required>
        @if ($errors->has('time_in'))
            <span class="help-block">
                <strong>{{ $errors->first('time_in') }}</strong>
            </span>
        @endif
    </div>

    <div id="absence_reason_div" class="form-group col-xs-11{{ $errors->has('absence_reason') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="absence_reason">Absence Reason</label>
        <textarea placeholder="Please state employee absence reason here..." name="absence_reason" class="form-control" style="height: 120px">{{ old('absence_reason') }}</textarea>
        @if ($errors->has('absence_reason'))
            <span class="help-block">
                <strong>{{ $errors->first('absence_reason') }}</strong>
            </span>
        @endif
    </div>
</div>

@section('script')
	<script>
	    $(document).ready(function () {
	        //Code to hide and show user selection field based on message type selection
	        const present = document.getElementById('present');

	        if(present != null){
	            if(present.value !== "0"){
	                $("#time_in_div").hide();
	            }else{
                    $("#time_in_div").show();
                }

                if(present.value !== "1"){
	                $("#absence_reason_div").hide();
	            }else{
                    $("#absence_reason_div").show();
                }

	            present.addEventListener("change", ()=>{
                    if(present.value !== "0"){
                        $("#time_in_div").hide();
                    }else{
                        $("#time_in_div").show();
                    }

                    if(present.value !== "1"){
                        $("#absence_reason_div").hide();
                    }else{
                        $("#absence_reason_div").show();
                    }
	            });
	        }
	    });
	</script>
@endsection
   