<div class="form-row">

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id">
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

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('qualification') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="qualification">Qualification Title</label>
            <input id="qualification" type="text" class="form-control" name="qualification" value="{{ old('qualification') }}" required>
            @if ($errors->has('qualification'))
                <span class="help-block">
                    <strong>{{ $errors->first('qualification') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('institution') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="institution">Award Institution/Body</label>
            <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution') }}" required>
            @if ($errors->has('institution'))
                <span class="help-block">
                    <strong>{{ $errors->first('institution') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('start_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="start_date">Start Date</label>
            <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
            @if ($errors->has('start_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('end_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="end_date">End Date</label>
            <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
            @if ($errors->has('end_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('end_date') }}</strong>
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