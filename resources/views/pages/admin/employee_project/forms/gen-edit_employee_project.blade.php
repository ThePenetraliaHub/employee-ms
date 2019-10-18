<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('employee-project.update', $employee_project->id) }}" enctype="multipart/form-data">
{{csrf_field()}}  
{{method_field('PUT')}}
    <div class="item form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="employee_id" name="employee_id"required="required" style="width: 100%;">
        <option></option>
        @foreach($employees as $employee)
        <option value="{{$employee->id}}" @if (old('employee_id', $employee_project->employee->id) == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
                }
        @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('project_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project_id">Project<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="project_id" name="project_id"required="required" style="width: 100%;">
        @foreach($projects as $project)
        <option value="{{$project->id}}" @if (old('project_id', $employee_project->project ? $employee_project->project->id : "") == $project->id) {{ 'selected' }} @endif>{{$project->name}}</option>
        @endforeach
        </select>
        @if ($errors->has('project_id'))
            <span class="help-block">
                <strong>{{ $errors->first('project_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="status" name="status"required="required" style="width: 100%;">
        <option value="{{$employee_project->status}}" @if (old('status',$employee_project->status) === $employee_project->status) {{ 'selected' }} @endif>{{$employee_project->status}}</option>
        <option value="Initiated" @if (old('status', $employee_project->status) === "Initiated") {{ 'selected' }} @endif>Initiated</option>
        <option value="Processing" @if (old('status', $employee_project->status) === "Processing") {{ 'selected' }} @endif>Processing</option>
        <option value="Rounding-up" @if (old('status', $employee_project->status) === "Rounding-up") {{ 'selected' }} @endif>Rounding-up</option>
        <option value="Completed" @if (old('status', $employee_project->status) === "Completed") {{ 'selected' }} @endif>Completed</option>
        <option value="Approved" @if (old('status', $employee_project->status) === "Approved") {{ 'selected' }} @endif>Approved</option>
        <option value="Disapproved" @if (old('status', $employee_project->status) === "Disapproved") {{ 'selected' }} @endif>Disapproved</option>
        <option value="Terminated" @if (old('status', $employee_project->status) === "Terminated") {{ 'selected' }} @endif>Terminated</option>
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="start_date" value="{{ old('start_date',$employee_project->start_date->format("Y-m-d")) }}" class="form-control col-md-7 col-xs-12 has-feedback-left " id="start_date"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="item form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date">End Date<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="end_date" value="{{ old('end_date',$employee_project->end_date->format("Y-m-d")) }}" class="form-control col-md-7 col-xs-12 has-feedback-left " id="end_date"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="item form-group {{ $errors->has('details') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Details <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <textarea id="details"  name="details" required="required" class="form-control col-md-7 col-xs-12">
        {{ old('details', $employee_project->details) }}
        </textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('supervisor_remark') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supervisor_remark">Supervisor's Remark <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <textarea id="supervisor_remark"  name="supervisor_remark" required="required" class="form-control col-md-7 col-xs-12" placeholder="Query Employee on task status here...">
            {{ old('supervisor_remark', $employee_project->supervisor_remark) }}
        </textarea>
        @if ($errors->has('supervisor_remark'))
            <span class="help-block">
                <strong>{{ $errors->first('supervisor_remark') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('document_url') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="document_url">Project Document<span class="required"></span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="file" id="document_url"   name="document_url"   class="form-control col-md-7 col-xs-12">
        @if ($errors->has('document_url'))
            <span class="help-block">
                <strong>{{ $errors->first('document_url') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('employee-project.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>