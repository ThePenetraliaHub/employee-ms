
    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label text-uppercase  text-success">Personal Phone</label><br/>
                <label class="control-label ">{{ $employee->home_phone}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase  text-success">Office Phone</label><br/>
                <label class="control-label ">{{ $employee->office_phone}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase  text-success">Private Email</label><br/>
                <label class="control-label ">{{ $employee->private_email}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase  text-success">Office Email</label><br/>
                <label class="control-label ">{{ $employee->office_email}}</label>  
            </div>

        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">Job Information</div>
        <div class="panel-body">
            <div class="col-md-4"> 
                <label class="control-label text-uppercase  text-success">Job Title</label><br/>
                <label class="control-label viewLabel">{{ $employee->job_title->title}}</label> 
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase  text-success">Department</label><br/>
                <label class="control-label viewLabel">{{ $employee->department->name}}</label>  
            </div>
            
            <div class="col-md-4"> 
                <label class="control-label text-uppercase  text-success">Employee ID</label><br/>
                <label class="control-label viewLabel">{{ $employee->employee_number}}</label> 
            </div>
            <div class="col-md-4">
                <label class="control-label text-uppercase  text-success">Employee Supervisor</label><br/>
                <label class="control-label viewLabel"> @if($employee->supervisor)
                   <a href="{{ route('employee.profile' ,$employee->supervisor->id) }}" > {{ $employee->supervisor->name }}
                </a>@endif</label>  
                
            </div>

        </div>
    </div>