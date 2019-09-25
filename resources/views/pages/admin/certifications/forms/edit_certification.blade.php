<div class="form-row">

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id" disabled>
            <option value=""></option>
            @foreach($employees as $employee)
                <option value="{{$certification->employee_id}}" @if (old('$certification->employee_id',$certification->employee->id) == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
        @endif
    </div>

       
    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('certification') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="certification">Certification Title</label>
            <input id="certification" type="text" class="form-control" name="certification" value="{{ old('certification',$certification->certification) }}" required>
            @if ($errors->has('certification'))
                <span class="help-block">
                    <strong>{{ $errors->first('certification') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('institution') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="institution">Award Institution/Body</label>
            <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution',$certification->institution) }}" required>
            @if ($errors->has('institution'))
                <span class="help-block">
                    <strong>{{ $errors->first('institution') }}</strong>
                </span>
            @endif
        </div>
    </div>

     <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('granted_on') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="granted_on">Awarded On</label>
            <input id="granted_on" type="date" class="form-control" name="granted_on" value="{{ old('granted_on',$certification->granted_on->format('Y-m-d')) }}" required>
            @if ($errors->has('granted_on'))
                <span class="help-block">
                    <strong>{{ $errors->first('granted_on') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('valid_on') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="valid_on">Valid Through</label>
            <input id="valid_on" type="date" class="form-control" name="valid_on" value="{{ old('valid_on',$certification->valid_on->format('Y-m-d')) }}" required>
            @if ($errors->has('valid_on'))
                <span class="help-block">
                    <strong>{{ $errors->first('valid_on') }}</strong>
                </span>
            @endif
        </div>
    </div>

 <div class="form-group col-xs-11 mb-0 mt-3">
        <label for="document_url">Document</label><br>
        <label class="btn btn-default" id="">
            <i class="{{ $errors->has('document_url') ? 'has-error' : '' }}"></i><input name="document_url" id='document_url' type="file">
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
  //  multiple: true

});
            $('#project_id').select2();
            $('#status').select2();


        });

    </script>
@endsection