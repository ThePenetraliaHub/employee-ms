<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('date') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="date">Day</label>
        <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required>
        @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('start_time') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="start_time">Official Opening Time</label>
        <input id="start_time" type="time" class="form-control" name="start_time" value="{{ old('start_time') }}" {{-- step="3" --}} required>
        @if ($errors->has('start_time'))
            <span class="help-block">
                <strong>{{ $errors->first('start_time') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('end_time') ? ' has-error' : '' }} mb-0 mt-3">
    	<label for="end_time">Official Closing Time</label>
        <input id="end_time" type="time" class="form-control" name="end_time" value="{{ old('end_time') }}" {{-- step="3" --}} required>
        @if ($errors->has('end_time'))
            <span class="help-block">
                <strong>{{ $errors->first('end_time') }}</strong>
            </span>
        @endif
    </div>
</div>
   