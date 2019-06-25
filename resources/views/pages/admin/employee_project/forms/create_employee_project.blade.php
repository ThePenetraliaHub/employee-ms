<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id[]" style="width: 100%;" multiple>
            <option value=""></option>
            @foreach($employees as $employee)
                <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
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