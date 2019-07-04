
    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
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
                <label class="control-label viewLabel">{{ $employee->job_title->title}}</label> 
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
                <label class="control-label ">Employee Supervisor</label>
                <label class="control-label viewLabel"> @if($employee->supervisor)
                   <a href="{{ route('shortProfile' ,$employee->supervisor->id) }}" > {{ $employee->supervisor->name }}
                </a>@endif</label>  
                
            </div>

        </div>
    </div>