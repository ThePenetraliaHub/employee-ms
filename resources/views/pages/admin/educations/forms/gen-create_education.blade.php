<form id="submit_form" novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST"action="{{ route('education.store') }}">
    @csrf
   
    <div class="item form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="employee_id" name="employee_id"required="required">
             <option value=""></option>
            @foreach($employees as $employee)
             <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif> {{$employee->name}} </option>
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>
    </div>
   
    <div class="item form-group {{ $errors->has('qualification') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification">Qualification Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="qualification"  name="qualification" value="{{ old('qualification') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('qualification'))
            <span class="help-block">
                <strong>{{ $errors->first('qualification') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('institution') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="institution">Award Institution/Body<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="institution"  name="institution" value="{{ old('institution') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('institution'))
            <span class="help-block">
                <strong>{{ $errors->first('institution') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="start_date" value="{{ old('start_date') }}"  class="form-control col-md-7 col-xs-12 has-feedback-left " id="start_date"  aria-describedby="inputSuccess2Status4">
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
                        <input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control col-md-7 col-xs-12 has-feedback-left " id="end_date"  aria-describedby="inputSuccess2Status4">
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

    <div class="item form-group {{ $errors->has('document_url') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="document_url">Document<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="file" id="document_url"  name="document_url"  required="required" class="form-control col-md-7 col-xs-12">
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
        <a type="button" class="btn btn-warning" type="button" href="{{route('education.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>