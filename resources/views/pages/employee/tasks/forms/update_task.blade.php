<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('task.update',$project->id) }}" >
        {{csrf_field()}}  
        {{method_field('POST')}}
     <div class=" {{ $errors->has('status') ? ' has-error' : '' }} col-md-4" style="margin-bottom: 10px;">
           <select class="form-control " id="status" name="status" style="width: 100%;">
                 <option value="" selected disabled>Select Task Status</option>
                 <option>Innitiated</option>
                 <option>Aborted</option>
                 <option>Completed</option>
           </select>

     </div>
     <div class="col-md-12">
              <button id="button" type="submit" class="btn btn-success " >Update</button>
     </div>
</form>   
