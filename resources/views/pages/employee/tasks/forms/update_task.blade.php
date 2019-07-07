<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('task.update', $employee_project->id) }}" >
    {{csrf_field()}}  
    {{method_field('POST')}}

    <div class="form-row">
        <div class="form-group col-xs-4{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Initiated" @if (old('status', $employee_project->status) === "Initiated") {{ 'selected' }} @endif>Initiated</option>
                <option value="Completed" @if (old('status', $employee_project->status) === "Completed") {{ 'selected' }} @endif>Completed</option>
                <option value="Pending" @if (old('status', $employee_project->status) === "Pending") {{ 'selected' }} @endif>Pending</option>
                <option value="Terminated" @if (old('status', $employee_project->status) === "Terminated") {{ 'selected' }} @endif>Terminated</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-12">
            <button id="button" type="submit" class="btn btn-success " >Update</button>
        </div>
    </div>
</form>   
