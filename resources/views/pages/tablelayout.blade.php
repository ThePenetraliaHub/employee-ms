
    <div class="panel panel-default card-body">
        <div class="panel-heading " style="text-align: center;"></div>

        <div class="panel-body">
            <div class="col-md-6"> 
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Task</label>
                </div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2"><b>Development of Employee Management System</b></label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Client</label></div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2">Joint Task Board</label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Assigned on</label>
                </div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2">June 23, 2019 
                    | 3:09PM</label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Deadline</label>
                </div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2">June 27, 2019 
                    | 3:09PM</label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Days Left</label>
                </div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2">5 days</label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Task Status</label>
                </div>
                <div class="col-md-8"> 
                    <label class="control-label viewLabel2">Innitiated</label>
                </div>
                <div class="col-md-4">
                    <label class="control-label viewLabel3">Team Members</label>
                </div>
                <div class="col-md-8"> 
                    @for($i = 0; $i < 4; $i++ )
                    <li class="control-label viewLabel2">Team Member{{$i+1}} </li>
                    @endfor
                </div>
                <div class="col-md-4">
                    <select class="control-label viewLabel3" id="status" style="width: 100%;">
                        <option>Task Status</option>
                        <option>Innitiated</option>
                        <option>Aborted</option>
                        <option>Completed</option>
                    </select>
                    
                </div>
                <div class="col-md-8"> 
                    <a class="btn btn-success btn-sm " href="">Update Status </a>
                    
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label viewLabel3">Task Details</label>
                <textarea class="control-label  textarea " disabled>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</textarea>
                <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="">Download Attachment </a>
            </div>
         

        </div>
    </div>
