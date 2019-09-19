

<form id="submit_form" novalidate class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('certification.store') }}" }}">
    @csrf

    <div class="item form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee<span class="required">*</span></label>
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


    <div class="item form-group {{ $errors->has('certification') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="certification">certification Title<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <input type="text" id="certification"  name="certification" value="{{ old('certification') }}" required="required" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('certification'))
            <span class="help-block">
                <strong>{{ $errors->first('certification') }}</strong>
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


    <div class="item form-group {{ $errors->has('granted_on') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="granted_on">Awarded On<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="form-group has-feedback">
                <input type="text" name="granted_on" class="form-control col-md-7 col-xs-12 has-feedback-left " id="granted_on"  aria-describedby="inputSuccess2Status4">
                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
            </div>
            @if ($errors->has('granted_on'))
                <span class="help-block">
                    <strong>{{ $errors->first('granted_on') }}</strong>
                </span>
            @endif
        </div>
    </div>
 
    
    <div class="item form-group {{ $errors->has('valid_on') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valid_on">Valid Through<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="form-group has-feedback">
                <input type="text" name="valid_on" class="form-control col-md-7 col-xs-12 has-feedback-left " id="valid_on"  aria-describedby="inputSuccess2Status4">
                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
            </div>
            @if ($errors->has('valid_on'))
            <span class="help-block">
                <strong>{{ $errors->first('valid_on') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="item form-group {{ $errors->has('document_url') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="document_url">Document<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="form-group has-feedback">
                <i class="{{ $errors->has('document_url') ? 'has-error' : '' }}"></i>
                <input class="form-control col-md-7 col-xs-12  "  name="document_url" id='document_url' type="file"  aria-describedby="inputSuccess2Status4">
                </label>
                <p  id="message-wrong" class="text-danger display-none" role="alert"></p>
                <p  id="message-correct" class="text-success display-none" role="alert"></p>
            </div>
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
            <a type="button" class="btn btn-warning" type="button" href="{{route('certification.index')}}">Cancel</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div >
</form>

