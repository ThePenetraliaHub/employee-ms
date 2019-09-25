<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST"action="{{  route('work-day.update',$work_day->id) }}">
    @csrf
    {{method_field('PUT')}} 
    <div class="item form-group {{ $errors->has('date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Day<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="date" readonly value="{{ old('date', $work_day->date->format("Y-m-d")) }}" class="form-control col-md-7 col-xs-12 has-feedback-left " id="date"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="item form-group {{ $errors->has('day_type') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="day_type">Day Type<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="day_type" name="day_type"required="required" style="width: 100%;">
        <option value="Work Day" @if(old("day_type", $work_day->day_type) == "Work Day") {{ "selected" }} @endif>Work Day</option>
        <option value="Weekend" @if(old("day_type", $work_day->day_type) == "Weekend") {{ "selected" }} @endif>Weekend</option>
        <option value="Public Holiday" @if(old("day_type", $work_day->day_type) == "Public Holiday") {{ "selected" }} @endif>Public Holiday</option>
        </select>
        @if ($errors->has('day_type'))
            <span class="help-block">
                <strong>{{ $errors->first('day_type') }}</strong>
            </span>
        @endif
    </div>
    </div>
    
    
    
    <div id ="start_time_div"class=" item form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_time">Official Opening Time <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input type="time" id="start_time"  name="start_time" value="{{ old('start_time', date_format(date_create($work_day->start_time), 'H:i')) }}" {{-- step="3" --}}  required="required" class="form-control col-md-7 col-xs-12">
            @if ($errors->has('start_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_time') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div id="end_time_div" class="item form-group {{ $errors->has('end_time') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_time">Official Closing Time <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input type="time" id="end_time"  name="end_time" value="{{ old('end_time', date_format(date_create($work_day->end_time), 'H:i')) }}" {{-- step="3" --}} required="required" class="form-control col-md-7 col-xs-12">
            @if ($errors->has('end_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_time') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('work-day.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    </div >
</form>