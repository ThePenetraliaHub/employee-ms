
    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
            <div class="col-md-4">
                <label class="control-label ">Office Phone</label>
                <label class="control-label viewLabel">{{ $admin->address}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Address</label>
                <label class="control-label viewLabel">{{ $admin->phone}}</label> 
            </div>

            <div class="col-md-4">
                <label class="control-label ">Email</label>
                <label class="control-label viewLabel">{{ $admin->user_info->email}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Type</label>
                <label class="control-label viewLabel">{{substr($admin->user_info->typeable_type,4)}}</label> 
            </div>

            <div class="col-md-4"> 
                <label class="control-label ">Active</label>
                <label class="control-label viewLabel">{{($admin->user_info->is_active?"Active":"Inactive")}}</label> 
            </div>

        </div>
    </div>


  