<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST"action="{{ route('employee.store') }}">
    @csrf
    <div class="item form-group {{ $errors->has('NIN') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NIN">National Identity Number(NIN) <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="NIN"  name="NIN" value="{{ old('NIN') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('NIN'))
            <span class="help-block">
                <strong>{{ $errors->first('NIN') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('employee_number') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_number">Employee Number<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="employee_number"  name="employee_number" value="{{ old('employee_number') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('employee_number'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_number') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('department_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department_id">Employee Department<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="department_id" name="department_id" required="required" style="width: 100%;">
        <option value=""></option>
                @foreach($departments as $department)
                    <option value="{{$department->id}}" @if (old('department_id') == $department->id) {{ 'selected' }} @endif>{{$department->name}}</option>
                @endforeach
        </select>
        @if ($errors->has('department_id'))
            <span class="help-block">
                <strong>{{ $errors->first('department_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="name"  name="name" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Gender<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="status" name="gender"required="required" style="width: 100%;">
        <option value=""></option>
                <option value="Male" @if (old('gender') === "Male") {{ 'selected' }} @endif>Male</option>
                <option value="Female" @if (old('gender') === "Female") {{ 'selected' }} @endif>Female</option>
        </select>
        @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_of_birth"> Date of Birth<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="date_of_birth" class="form-control col-md-7 col-xs-12 has-feedback-left " id="single_cal4"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('date_of_birth'))
                <span class="help-block">
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="item form-group {{ $errors->has('marital_status') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Marital Status<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="marital_status" name="marital_status"required="required" style="width: 100%;">
           <option value=""></option>
                <option value="Single" @if (old('marital_status') === "Single") {{ 'selected' }} @endif>Single</option>
                <option value="Married" @if (old('marital_status') === "Married") {{ 'selected' }} @endif>Married</option>
                <option value="Divorced" @if (old('marital_status') === "Divorced") {{ 'selected' }} @endif>Divorced</option>
                <option value="Others" @if (old('marital_status') === "Others") {{ 'selected' }} @endif>Others</option>
        </select>
        @if ($errors->has('marital_status'))
            <span class="help-block">
                <strong>{{ $errors->first('marital_status') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('addressline1') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline1">Address Line 1 <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="addressline1"  name="addressline1" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('addressline1'))
            <span class="help-block">
                <strong>{{ $errors->first('addressline1') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('addressline2') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="addressline2">Address Line 2
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="addressline2"  name="addressline2" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('addressline2'))
            <span class="help-block">
                <strong>{{ $errors->first('addressline2') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('zip_code') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip_code">Zipcode <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="zip_code"  name="zip_code" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('zip_code'))
            <span class="help-block">
                <strong>{{ $errors->first('zip_code') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('home_phone') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_phone">Home Phone Number<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="home_phone"  name="home_phone" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('home_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('home_phone') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('office_phone') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="office_phone">Office Phone Number <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="office_phone"  name="office_phone" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('office_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('office_phone') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('private_email') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="private_email">Private Email Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="email" id="private_email"  name="private_email" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('private_email'))
            <span class="help-block">
                <strong>{{ $errors->first('private_email') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('office_email') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="office_email">Office Email Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="email" id="office_email"  name="office_email" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('office_email'))
            <span class="help-block">
                <strong>{{ $errors->first('office_email') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('job_title_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job_title_id">Job Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="job_title_id" name="job_title_id"required="required" style="width: 100%;">
            <option value=""></option>
                @foreach($job_titles as $job_title)
            <option value="{{ $job_title->id }}" @if (old('job_title_id') == $job_title->id) {{ 'selected' }} @endif>{{$job_title->title}}</option>
                @endforeach
        </select>
        @if ($errors->has('job_title_id'))
            <span class="help-block">
                <strong>{{ $errors->first('job_title_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('pay_grade_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pay_grade_id">Employee Pay Grade<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="pay_grade_id" name="pay_grade_id"required="required" style="width: 100%;">
        <option value=""></option>
                @foreach($pay_grades as $pay_grade)
        <option value="{{ $pay_grade->id }}" @if (old('pay_grade_id') == $pay_grade->id) {{ 'selected' }} @endif>{{$pay_grade->title}}</option>
                @endforeach
        </select>
        @if ($errors->has('pay_grade_id'))
            <span class="help-block">
                <strong>{{ $errors->first('pay_grade_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('employee_status_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_status_id">Employement Status<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="employee_status_id" name="employee_status_id" value="{{ old('employee_status_id') }} required="required" style="width: 100%;">
        <option value=""></option>
                @foreach($employment_statuses as $employment_status)
        <option value="{{ $employment_status->id }}" @if (old('employee_status_id') == $employment_status->id) {{ 'selected' }} @endif> {{$employment_status->title}}</option>
                @endforeach
        </select>
        @if ($errors->has('employee_status_id'))
            <span class="help-block">
                <strong>{{ $errors->first('employee_status_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('supervisor_id') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supervisor_id">Supervisor<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="supervisor_id" name="supervisor_id" style="width: 100%;">
        <option value=""></option>
        @foreach($employees as $employee)
        <option value="{{$employee->id}}" @if (old('supervisor_id') == $employee->id) {{ 'selected' }} @endif>{{$employee->name}}</option>
        @endforeach
        </select>
        @if ($errors->has('supervisor_id'))
            <span class="help-block">
                <strong>{{ $errors->first('supervisor_id') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('joined_date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="joined_date">Date Employee Joined<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="joined_date" class="form-control col-md-7 col-xs-12 has-feedback-left " id="single_cal5"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('joined_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('joined_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('employee.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>