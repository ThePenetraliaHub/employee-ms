<div class="form-row">

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="client_id">Employee</label>
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

    <div class="form-group col-xs-11{{ $errors->has('project_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="client_id">Project</label>
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

    <div class="form-group col-xs-11{{ $errors->has('details') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="details">Details</label>
        <textarea rows="3" id="details" type="textarea" class="form-control" name="details" required placeholder="Project/Task details here....">{{ old('details') }}</textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="status">Project Status</label>
        <select class="form-control" id="status" name="status">
            <option value="">-- Select Project Status --</option>
            <option value="Initiated" @if (old('status', "Initiated") === "Initiated") {{ 'selected' }} @endif>Initiated</option>
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

    <div class="form-group">
        <label for="document">Project Document</label><br>
        <label class="btn btn-default" id="upload-image">
            <i class="fa fa-image{{ $errors->has('document') ? 'has-error' : '' }}"></i><span class="ml-3">Select Document</span><input name="document" id='select' type="file" style="display: none;" name="image">
        </label><br>
        <p  id="message-wrong" class="text-danger display-none" role="alert"></p>
        <p  id="message-correct" class="text-success display-none" role="alert"></p>
        @if ($errors->has('document'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('document') }}</strong>
          </span>
        @endif
    </div>
</div>
   