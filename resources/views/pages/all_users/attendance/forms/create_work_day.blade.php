<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('date') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="date">Day</label>
        <input id="date" type="date" class="form-control" name="date" value="{{ old('date', date_format(date_create(), 'Y-m-d')) }}" required>
        @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('day_type') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="day_type">Day Type</label>
        <select class="form-control" name="day_type" id="day_type">
            <option value="Work Day" @if(old("day_type") == "Work Day") {{ "selected" }} @endif>Work Day</option>
            <option value="Weekend" @if(old("day_type") == "Weekend") {{ "selected" }} @endif>Weekend</option>
            <option value="Public Holiday" @if(old("day_type") == "Public Holiday") {{ "selected" }} @endif>Public Holiday</option>
        </select>
        @if ($errors->has('day_type'))
            <span class="help-block">
                <strong>{{ $errors->first('day_type') }}</strong>
            </span>
        @endif
    </div>

    <div id="start_time_div" class="form-group col-xs-11{{ $errors->has('start_time') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="start_time">Official Opening Time</label>
        <input id="start_time" type="time" class="form-control" name="start_time" value="{{ old('start_time', "09:00") }}" {{-- step="3" --}} required>
        @if ($errors->has('start_time'))
            <span class="help-block">
                <strong>{{ $errors->first('start_time') }}</strong>
            </span>
        @endif
    </div>

    <div id="end_time_div" class="form-group col-xs-11{{ $errors->has('end_time') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="end_time">Official Closing Time</label>
        <input id="end_time" type="time" class="form-control" name="end_time" value="{{ old('end_time', "17:00") }}" {{-- step="3" --}} required>
        @if ($errors->has('end_time'))
            <span class="help-block">
                <strong>{{ $errors->first('end_time') }}</strong>
            </span>
        @endif
    </div>
</div>

@section('script')
	<script>
    $(document).ready(function () {
              
	        //Code to hide and show user selection field based on message type selection
	        const day_type = document.getElementById('day_type');
	        if(day_type != null){
	            if(day_type.value !== "Work Day"){
	                $("#start_time_div").hide();
	                $("#end_time_div").hide();
	            }else{
	                $("#start_time_div").show();
	                $("#end_time_div").show();
	            }

	            day_type.addEventListener("change", ()=>{
	                if(day_type.value !== "Work Day"){
	                    $("#start_time_div").hide();
	                    $("#end_time_div").hide();
	                }else{
	                    $("#start_time_div").show();
	                    $("#end_time_div").show();
	                }
	            });
            }
           
	    });
	</script>
@endsection
   