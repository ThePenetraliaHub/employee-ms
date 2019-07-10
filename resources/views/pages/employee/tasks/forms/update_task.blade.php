<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal " method="POST" action="{{ route('task.update', $employee_project->id) }}" style="align-content: left" >
    {{csrf_field()}}  
    {{method_field('POST')}}
        <div class="col-md-12 " >
            <label for="status" class="control-label viewLabel3 ">Task Status</label>
        </div>
        <div class="form-group col-md-12{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3 viewLabel2">
            <select class="form-control" id="status" name="status" style="width: 100%">
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

        <div class="col-md-12 ">
             <label class="control-label viewLabel3" >Employee's Remark</label>
        </div>
                        
        <div class="card-body">
           <input type="textarea" style="height: 100px; width: 100%;">
            
        </div>

        <div class="col-md-12" style="margin-top: 3%">
            <button id="button" type="submit" class="btn btn-success " >Update</button>
        </div>
</form>   
