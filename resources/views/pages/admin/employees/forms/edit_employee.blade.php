<div class="form-row">
    <div class="form-group {{ $errors->has('NIN') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="NIN">National Identity Number(NIN)</label>
        <input @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif id="NIN" type="text" class="form-control" name="NIN" value="{{ old('NIN', $employee->NIN ) }}" required="" placeholder="">
        @if ($errors->has('NIN'))
            <span class="help-block">
                <strong>{{ $errors->first('NIN') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('employee_number') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="employee_number">Employee Number</label>
        <input @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif id="employee_number" type="text" class="form-control" name="employee_number" value="{{ old('employee_number', $employee->employee_number) }}" required placeholder="">
        @if ($errors->has('employee_number'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_number') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('department_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="department_id">Employee Department</label>
        <select class="form-control" id="department_id" name="department_id">
            <option value=""></option>
            @foreach($departments as $department)
                <option value="{{$department->id}}" @if (old('department_id', $employee->department->id) == $department->id) {{ 'selected' }} @endif>{{$department->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('department_id'))
            <span class="help-block">
                <strong>{{ $errors->first('department_id') }}</strong>
            </span>
        @endif
    </div>

    {{-- <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="firstname">First Name</label>
        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname', $employee->firstname) }}" required="" placeholder="">
        @if ($errors->has('firstname'))
        <span class="help-block">
            <strong>{{ $errors->first('firstname') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="middlename">Middle Name</label>
        <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename', $employee->middlename) }}" required="" placeholder="">
        @if ($errors->has('middlename'))
        <span class="help-block">
            <strong>{{ $errors->first('middlename') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="lastname">Last Name</label>
        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname', $employee->lastname) }}" required="" placeholder="">
        @if ($errors->has('lastname'))
        <span class="help-block">
            <strong>{{ $errors->first('lastname') }}</strong>
        </span>
        @endif
    </div> --}}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="name">Full Name</label>
        <input @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif id="name" type="text" class="form-control" name="name" value="{{ old('name', $employee->name) }}" required="" placeholder="">
        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('gender') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="gender">Gender</label>
        <select @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif class="form-control" id="gender" name="gender">
            <option value=""></option>
            <option value="male" @if (old('gender', $employee->gender) === "male") {{ 'selected' }} @endif>Male</option>
            <option value="female" @if (old('gender', $employee->gender) === "female") {{ 'selected' }} @endif>Female</option>
        </select>
        @if ($errors->has('gender'))
        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('date_of_birth') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="date_of_birth">Date of Birth</label>
        <input @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth->format("Y-m-d")) }}" required>
        @if ($errors->has('date_of_birth'))
        <span class="help-block">
            <strong>{{ $errors->first('date_of_birth') }}</strong>
        </span>
        @endif
    </div> 

    <div class="form-group col-xs-11{{ $errors->has('marital_status') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="marital_status">Marital Status</label>
        <select class="form-control" id="marital_status" name="marital_status">
            <option value=""></option>
            <option value="single" @if (old('marital_status', $employee->marital_status) === "single") {{ 'selected' }} @endif>Single</option>
            <option value="married" @if (old('marital_status', $employee->marital_status) === "married") {{ 'selected' }} @endif>Married</option>
            <option value="divorced" @if (old('marital_status', $employee->marital_status) === "divorced") {{ 'selected' }} @endif>Divorced</option>
            <option value="others" @if (old('marital_status', $employee->marital_status) === "others") {{ 'selected' }} @endif>Others</option>
        </select>
        @if ($errors->has('marital_status'))
            <span class="help-block">
                <strong>{{ $errors->first('marital_status') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('addressline1') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="addressline1">Address Line 1</label>
        <input id="addressline1" type="text" class="form-control" name="addressline1" value="{{ old('addressline1', $employee->addressline1) }}" required="" placeholder="">
        @if ($errors->has('addressline1'))
        <span class="help-block">
            <strong>{{ $errors->first('addressline1') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('addressline2') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="addressline2">Address Line 2</label>
        <input id="addressline2" type="text" class="form-control" name="addressline2" value="{{ old('addressline2', $employee->addressline2) }}" required="" placeholder="">
        @if ($errors->has('addressline2'))
        <span class="help-block">
            <strong>{{ $errors->first('addressline2') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('zip_code') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="zip_code">Zipcode</label>
        <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ old('zip_code', $employee->zip_code) }}" required="" placeholder="">
        @if ($errors->has('zip_code'))
            <span class="help-block">
                <strong>{{ $errors->first('zip_code') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('home_phone') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="home_phone">Home Phone Number</label>
        <input id="home_phone" type="text" class="form-control" name="home_phone" value="{{ old('home_phone', $employee->home_phone) }}" required="" placeholder="">
        @if ($errors->has('home_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('home_phone') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('office_phone') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="office_phone">Office Phone Number</label>
        <input id="office_phone" type="text" class="form-control" name="office_phone" value="{{ old('office_phone', $employee->office_phone) }}" required="" placeholder="">
        @if ($errors->has('office_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('office_phone') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('private_email') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="private_email">Private Email Address</label>
        <input id="private_email" type="email" class="form-control" name="private_email" value="{{ old('private_email', $employee->private_email) }}" required>
        @if ($errors->has('private_email'))
            <span class="help-block">
                <strong>{{ $errors->first('private_email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('office_email') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="office_email">Office Email Address</label>
        <input id="office_email" type="email" class="form-control" name="office_email" value="{{ old('office_email', $employee->office_email) }}" required>
        @if ($errors->has('office_email'))
            <span class="help-block">
                <strong>{{ $errors->first('office_email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('job_title_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="job_title_id">Job Title</label>
        <select @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif class="form-control" id="job_title_id" name="job_title_id">
            <option value=""></option>
            @foreach($job_titles as $job_title)
                <option value="{{ $job_title->id }}" @if (old('job_title_id', $employee->job_title->id) == $job_title->id) {{ 'selected' }} @endif>{{$job_title->title}}</option>
            @endforeach
        </select>
        @if ($errors->has('job_title_id'))
            <span class="help-block">
                <strong>{{ $errors->first('job_title_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('pay_grade_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="pay_grade_id">Employee Pay Grade</label>
        <select @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif class="form-control" id="pay_grade_id" name="pay_grade_id">
            <option value=""></option>
             <option value="Grade 1">Grade 1</option>   <!-- for testing sake -->
            @foreach($pay_grades as $pay_grade)
                <option value="{{ $pay_grade->id }}" @if (old('pay_grade_id', $employee->pay_grade->id) == $pay_grade->id) {{ 'selected' }} @endif>{{$pay_grade->title}}</option>
            @endforeach
        </select>
        @if ($errors->has('pay_grade_id'))
            <span class="help-block">
                <strong>{{ $errors->first('pay_grade_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('employee_status_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="employee_status_id">Employement Status</label>
        <select @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif class="form-control" id="employee_status_id" name="employee_status_id">
            <option value=""></option>
            @foreach($employment_statuses as $employment_status)
                <option value="{{ $employment_status->id }}" @if (old('employee_status_id', $employee->employee_status->id) == $employment_status->id) {{ 'selected' }} @endif> {{$employment_status->title}}</option>
            @endforeach
        </select>
        @if ($errors->has('employee_status_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_status_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('supervisor_id') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="supervisor_id">Supervisor</label>
        <select @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif class="form-control" id="supervisor_id" name="supervisor_id">
            <option value=""></option>
            @foreach($employees as $employee)
                @if($employee->supervisor)
                    <option value="{{$employee->id}}" @if (old('supervisor_id', $employee->supervisor->id) == $employee->id) {{ 'selected' }} @endif>{{$employee->name }}</option>
                @else
                    <option value="{{$employee->id}}" @if (old('supervisor_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name }}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->has('supervisor_id'))
            <span class="help-block">
                <strong>{{ $errors->first('supervisor_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('joined_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="joined_date">Date Employee Joined</label>
        <input @if(!auth()->user()->can('edit_employee')){!!'disabled'!!}@endif id="joined_date" type="date" class="form-control" name="joined_date" value="{{ old('joined_date', $employee->joined_date->format('Y-m-d')) }}" required>
        @if ($errors->has('joined_date'))
            <span class="help-block">
                <strong>{{ $errors->first('joined_date') }}</strong>
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