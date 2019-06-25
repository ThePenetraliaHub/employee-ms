<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id[]" style="width: 100%;" multiple>
            <option value=""></option>
            @foreach($employees as $employee)
                @if(!$employee->user_info)
                    <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->has('employee_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_id') }}</strong>
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
        });
    </script>
@endsection