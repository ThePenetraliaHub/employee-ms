<div class="form-row">
     <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control" id="employee_id" name="employee_id" disabled>
            <option value=""></option>
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

       
       <div class="form-row">
        <div class="form-group col-xs-11{{ $errors->has('skill_title') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="skill_title">Skills Title</label>
            <input id="skill_title" type="text" class="form-control" name="skill_title" value="{{ old('skill_title',$skill->skill_title) }}" required>
            @if ($errors->has('skill_title'))
                <span class="help-block">
                    <strong>{{ $errors->first('skill_title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group col-xs-11{{ $errors->has('detail') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="detail">Details</label>
        <textarea rows="3" id="detail" type="textarea" class="form-control" name="detail" required placeholder="Detail of your skills here...">{{ old('detail',$skill->detail) }}</textarea>
        @if ($errors->has('detail'))
            <span class="help-block">
                <strong>{{ $errors->first('detail') }}</strong>
            </span>
        @endif
    </div>

</div>
   @section('script')
    <script>
        $(document).ready(function () {
            $('#employee_id').select2();

        });

    </script>
@endsection