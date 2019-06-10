<div class="form-row">

    <div class="form-group col-xs-11{{ $errors->has('employee_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_id">Employee</label>
        <select class="form-control employee_id" id="employee_id" name="employee_id">
            <option value=""></option>
            @foreach($employees as $employee)
                <option value="{{$employee->id}}" @if (old('employee_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->firstname}} {{$employee->middlename}} {{$employee->lastname}}</option>
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
    $('#employee_id').select2();

    $("select.employee_id").change(function(){
    var selectedCountry = $(this).children("option:selected").val();

        $('#submit_form').submit(function(){
        $('#submit_form').attr('action', "skills/"+selectedCountry);
        });

    });        

});

    </script>
@endsection