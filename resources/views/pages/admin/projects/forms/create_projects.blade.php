<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('name') ? ' has-error' : '' }} mb-0 mt-3">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Project/Task name here..">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('details') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="details"></label>
        <textarea rows="3" id="details" type="textarea" class="form-control" name="details" required placeholder="Project/Task details here....">{{ old('details') }}</textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('client_id') ? ' has-error' : '' }} mb-0 mt-3">
        <select class="form-control" id="client_id" name="client_id">
            <option value="">-- Select Client --</option>
            @foreach($clients as $client)
            <option value="{{$client->id}}" @if (old('client_id') == $client->id) {{ 'selected' }} @endif>{{$client->name}}</option>

            @endforeach
        </select>
        @if ($errors->has('client_id'))
            <span class="help-block">
                <strong>{{ $errors->first('client_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('start_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="start_date">Start Date</label>
        <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required placeholder="Project/Task start date here..">
        @if ($errors->has('start_date'))
            <span class="help-block">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('end_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="end_date">End Date</label>
        <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required placeholder="Project/Task end date here..">
        @if ($errors->has('end_date'))
            <span class="help-block">
                <strong>{{ $errors->first('end_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
        <select class="form-control" id="status" name="status">
            <option value="">-- Select Project Status --</option>
            <option value="Initiated" @if (old('status') === "Initiated") {{ 'selected' }} @endif>Initiated</option>
            <option value="Completed" @if (old('status') === "Completed") {{ 'selected' }} @endif>Completed</option>
            <option value="Pending" @if (old('status') === "Pending") {{ 'selected' }} @endif>Pending</option>
            <option value="Terminated" @if (old('status') === "Terminated") {{ 'selected' }} @endif>Terminated</option>
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>

</div>
   