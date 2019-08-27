

<div class="panel panel-default ">
    <div class="panel-body viewLabel3">
       Update Task Status
    </div>
    <div class="panel-footer">
        <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal " method="POST" action="{{ route('task.update', $employee_project->id) }}" style="align-content: left" >
            {{csrf_field()}}  
            {{method_field('POST')}}
            <div >
                <label for="status" class="control-label viewLabel3 ">Task Status</label>
            </div>
            <div class="form-group col-md-12{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3 viewLabel2">
            @if($employee_project->status =="Approved"||$employee_project->status =="Terminated")
            <select disabled class="form-control" id="status" name="status" style="width: 100%">
            @else
            <select class="form-control" id="status" name="status" style="width: 100%"> 
            @endif
                    <option value="Processing" @if (old('status', $employee_project->status) === "Processing") {{ 'selected' }} @endif>Processing</option>
                    <option value="Rounding-up" @if (old('status', $employee_project->status) === "Rounding-up") {{ 'selected' }} @endif>Rounding-up</option>
                    <option value="Completed" @if (old('status', $employee_project->status) === "Completed") {{ 'selected' }} @endif>Completed</option>
                    <option disabled value="Initiated" @if (old('status', $employee_project->status) === "Initiated") {{ 'selected' }} @endif>Initiated</option>
                    <option disabled value="Approved" @if (old('status', $employee_project->status) === "Approved") {{ 'selected' }} @endif>Approved</option>
                    <option disabled value="Disapproved" @if (old('status', $employee_project->status) === "Disapproved") {{ 'selected' }} @endif>Disapproved</option>
                    <option disabled value="Terminated" @if (old('status', $employee_project->status) === "Terminated") {{ 'selected' }} @endif>Terminated</option>
                </select>
                @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
                @endif
            </div>

            <div>
               @if($employee_project->status =="Approved"||$employee_project->status =="Terminated")
                <textarea disabled rows="3" id="details" type="textarea" class="form-control" name="employee_remark" required placeholder="Employee's Remark here....">{{ $employee_project->employee_remark }}
                </textarea>
                @else<textarea rows="3" id="details" type="textarea" class="form-control" name="employee_remark" required placeholder="Employee's Remark here....">{{ $employee_project->employee_remark }}
                </textarea>
                @endif

            </div>

            <div style="margin-top: 3%">
                @if($employee_project->status =="Approved"||$employee_project->status =="Terminated")
                <button disabled id="button" type="submit" class="btn btn-success " style="margin-right: 10px;" >Update</button>
                @else
                <button id="button" type="submit" class="btn btn-success " style="margin-right: 10px;" >Update</button>
                @endif
                <a href="{{ URL::previous() }}" class="btn btn-warning" >Back</a>
            </div>
        </form> 
    </div>
</div>

