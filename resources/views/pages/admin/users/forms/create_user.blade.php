
<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control " id="employee_id" name="employee_id">
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
            $('#supervisor_id').select2();
            $('#department_id').select2();
            $('#employee_status_id').select2();
            $('#pay_grade_id').select2();
            $('#job_title_id').select2();
            $('#marital_status').select2();
            $('#gender').select2();
        });
    </script>
@endsection