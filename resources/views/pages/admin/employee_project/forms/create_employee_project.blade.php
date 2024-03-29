<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id[]" style="width: 100%;" multiple>
            <option value=""></option>
            @foreach($employees as $employee)
                <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
                }
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('project_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="project_id">Project</label>
        <select class="form-control" id="project_id" name="project_id" style="width: 100%;" >
            <option value=""></option>
            @foreach($projects as $project)
            <option value="{{$project->id}}" @if (old('project_id') == $project->id) {{ 'selected' }} @endif>{{$project->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('project_id'))
            <span class="help-block">
                <strong>{{ $errors->first('project_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="Initiated" @if (old('status') === "Initiated") {{ 'selected' }} @endif>Initiated</option>
            <!-- <option value="Processing" @if (old('status') === "Processing") {{ 'selected' }} @endif>Processing</option>
            <option value="Rounding-up" @if (old('status') === "Rounding-up") {{ 'selected' }} @endif>Rounding-up</option>
            <option value="Completed" @if (old('status') === "Completed") {{ 'selected' }} @endif>Completed</option>
            <option value="Approved" @if (old('status') === "Approved") {{ 'selected' }} @endif>Approved</option>
            <option value="Disapproved" @if (old('status') === "Disapproved") {{ 'selected' }} @endif>Disapproved</option>
            <option value="Terminated" @if (old('status') === "Terminated") {{ 'selected' }} @endif>Terminated</option> -->
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('start_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="start_date">Start Date</label>
        <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
        @if ($errors->has('start_date'))
            <span class="help-block">
                <strong>{{ $errors->first('start_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('end_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="end_date">End Date</label>
        <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
        @if ($errors->has('end_date'))
            <span class="help-block">
                <strong>{{ $errors->first('end_date') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('details') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="details">Details</label>
        <textarea rows="3" id="details" type="textarea" class="form-control" name="details" required placeholder="Detail of employee task on this project here...">{{ old('details') }}</textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11 mb-0 mt-3">
        <label for="document_url">Project Document</label><br>
        <label class="btn btn-default" id="upload-image">
            <i class="fa fa-image{{ $errors->has('document_url') ? 'has-error' : '' }}"></i><span class="ml-3">Select Document</span><input name="document_url" id='select' type="file" style="display: none;" name="image">
        </label><br>
        <p  id="message-wrong" class="text-danger display-none" role="alert"></p>
        <p  id="message-correct" class="text-success display-none" role="alert"></p>
        @if ($errors->has('document_url'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('document_url') }}</strong>
          </span>
        @endif
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('#employee_id').select2({
                //multiple: true
            });

            $('#project_id').select2();
            $('#status').select2();
        });
    </script>
@endsection