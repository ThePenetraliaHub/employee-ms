
    <div class="panel panel-default card-body">
        <div class="panel-heading">Personal Information</div>

        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label ">Employee Number</label>
                <label class="control-label viewLabel">{{ $employee->employee_number}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">National Identity Number</label>
                <label class="control-label viewLabel">{{ $employee->NIN}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label ">Gender</label>
                <label class="control-label viewLabel">{{ $employee->gender}}</label>  
                
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Marital Status</label>
                <label class="control-label viewLabel">{{ $employee->marital_status}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Date of Birth</label>
                <label class="control-label viewLabel">{{ $employee->date_of_birth->format('F j, Y')}}</label>  
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label ">Country</label>
                <label class="control-label viewLabel">Country</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">State</label>
                <label class="control-label viewLabel">State</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Address 1</label>
                <label class="control-label viewLabel">{{ $employee->addressline1}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Address 2</label>
                <label class="control-label viewLabel">{{ $employee->addressline2}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label ">Zip Code</label>
                <label class="control-label viewLabel">{{ $employee->zip_code}}</label>  
                
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Personal Phone</label>
                <label class="control-label viewLabel">{{ $employee->home_phone}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Office Phone</label>
                <label class="control-label viewLabel">{{ $employee->office_phone}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Private Email</label>
                <label class="control-label viewLabel">{{ $employee->private_email}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Office Email</label>
                <label class="control-label viewLabel">{{ $employee->office_email}}</label>  
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Job Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label ">Job Title</label>
                <label class="control-label viewLabel">{{ '(' .$employee->job_title->code. ')'.$employee->job_title->title}}</label> 
            </div>

            <div class="col-md-4">
                <label class="control-label ">Department</label>
                <label class="control-label viewLabel">{{ $employee->department->name}}</label>  
            </div>
            
            <div class="col-md-4"> 
                <label class="control-label ">Employee ID</label>
                <label class="control-label viewLabel">{{ $employee->employee_number}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Employee Status</label>
                <label class="control-label viewLabel">{{ $employee->employee_status->title}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label ">Employee Supervisor</label>
                <label class="control-label viewLabel"> @if($employee->supervisor)
                    <a href="{{ route('employee.profile' ,$employee->supervisor->id) }}" > {{ $employee->supervisor->name }}
                </a>
                @endif</label>  
                
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Pay Grade</label>
                <label class="control-label viewLabel">{{ $employee->pay_grade->title.' '. '(' .$employee->pay_grade->min_salary. ' - '.$employee->pay_grade->max_salary.')'.$employee->pay_grade->currency}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label ">Joined Date</label>
                <label class="control-label viewLabel">{{ $employee->joined_date->format('F j, Y')}}</label>  
            </div>

        </div>
    </div>