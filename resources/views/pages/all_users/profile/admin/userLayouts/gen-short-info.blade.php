
    <div class="panel panel-default">
        <div class="panel-heading">Contact Information</div>
        <div class="panel-body">
            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Office Phone</label><br/>
                <label class="control-label ">{{ $admin->address}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Address</label><br/>
                <label class="control-label ">{{ $admin->phone}}</label> 
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-success">Email</label><br/>
                <label class="control-label ">{{ $admin->user_info->email}}</label>  
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Type</label><br/>
                <label class="control-label ">{{substr($admin->user_info->typeable_type,4)}}</label> 
            </div>

            <div class="col-md-4"> 
                <label class="control-label text-uppercase text-success">Active</label><br/>
                <label class="control-label ">{{($admin->user_info->is_active?"Active":"Inactive")}}</label> 
            </div>

        </div>
    </div>


  