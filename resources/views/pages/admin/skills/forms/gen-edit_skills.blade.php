<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST"action="{{ route('skills.update', $skill->id)  }}">
    {{csrf_field()}}  
    {{method_field('PUT')}}
   
    <div class="item form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select  disabled class="form-control col-md-7 col-xs-12" id="employee_id" name="employee_id"required="required" style="width: 100%;">
            @foreach($employees as $employee)
            <option value="{{$skill->employee_id}}" @if (old('$skill->employee_id', $skill->employee->id) == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>
    </div>
   
    <div class="item form-group {{ $errors->has('skill_title') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="skill_title">Skills Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="skill_title"  name="skill_title"  value="{{ old('skill_title',$skill->skill_title) }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('skill_title'))
            <span class="help-block">
                <strong>{{ $errors->first('skill_title') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('detail') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="detail">Details <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <textarea id="detail"  name="detail" required="required" class="form-control col-md-7 col-xs-12">{{ old('detail',$skill->detail) }}
        </textarea>
        @if ($errors->has('detail'))
            <span class="help-block">
                <strong>{{ $errors->first('detail') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('skills.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    </div >
</form>