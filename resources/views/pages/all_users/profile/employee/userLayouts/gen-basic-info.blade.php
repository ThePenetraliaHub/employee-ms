
    <div class="panel panel-default card-body">
        <div class="panel-heading">Personal Information</div>

        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Employee Number</label><br/>
                <label class="control-label ">{{ $employee->employee_number}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">National Identity Number</label><br/>
                <label class="control-label ">{{ $employee->NIN}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Gender</label><br/>
                <label class="control-label ">{{ $employee->gender}}</label>  
                
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Marital Status</label><br/>
                <label class="control-label ">{{ $employee->marital_status}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Date of Birth</label><br/>
                <label class="control-label ">{{ $employee->date_of_birth->format('F j, Y')}}</label>  
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label text-uppercase  text-success">Address 1</label><br/>
                <label class="control-label ">{{ $employee->addressline1}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase  text-success">Address 2</label><br/>
                <label class="control-label">{{ $employee->addressline2}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Zip Code</label><br/>
                <label class="control-label">{{ $employee->zip_code}}</label>   
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Personal Phone</label><br/>
                <label class="control-label ">{{ $employee->home_phone}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Office Phone</label><br/>
                <label class="control-label">{{ $employee->office_phone}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Private Email</label><br/>
                <label class="control-label ">{{ $employee->private_email}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Office Email</label><br/>
                <label class="control-label">{{ $employee->office_email}}</label>  
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Job Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Job Title</label><br/>
                <label class="control-label ">{{ '(' .$employee->job_title->code. ')'.$employee->job_title->title}}</label> 
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Department</label><br/>
                <label class="control-label ">{{ $employee->department->name}}</label>  
            </div>
            
            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Employee ID</label><br/>
                <label class="control-label ">{{ $employee->employee_number}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Employee Status</label><br/>
                <label class="control-label ">{{ $employee->employee_status->title}}</label>  
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Employee Supervisor</label><br/>
                <label class="control-label "> @if($employee->supervisor)
                    <a href="{{ route('employee.profile' ,$employee->supervisor->id) }}" > {{ $employee->supervisor->name }}
                </a>
                @endif</label>  
                
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Pay Grade</label><br/>
                <label class="control-label ">{{ $employee->pay_grade->title.' '. '(' .$employee->pay_grade->min_salary. ' - '.$employee->pay_grade->max_salary.')'.$employee->pay_grade->currency}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Joined Date</label><br/>
                <label class="control-label ">{{ $employee->joined_date->format('F j, Y')}}</label>  
            </div>

        </div>
    </div>