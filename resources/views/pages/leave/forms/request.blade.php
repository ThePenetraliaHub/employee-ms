<div class="form-row">
    <div class="col-md-6">
        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="employee_id">Employee Name</label>
            <select class="form-control" name="employee_id" id="employee_id">
                <option value="Richard">Richard Odigiri</option>
            </select>
        <!--  @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>

        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="start_date">From:</label>
            <input  id="start_date" placeholder="01/07/2019" type="date" class="form-control" name="start_date" value="" required>
        <!--  @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>
    </div>

    <div class="col-md-6">

         <div class="form-group col-xs-11<!-- {{ $errors->has('gender') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="leave_policies_id">Leave Type</label><small class="pull-right text-red">6 days available</small>
            <select class="form-control" name="leave_policies_id" id="leave_policies_id">
                <option value="Male">Annual Leave</option>
            </select>
        <!--  @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif -->
        </div>

        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="end_date">To:</label>
            <input id="end_date" type="date" class="form-control" name="end_date" value="" required>
        <!--  @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>
        
  </div>

  <div >
        <div class="form-group col-xs-11{{ $errors->has('content') ? ' has-error' : '' }} mb-0 mt-3">
         <!--     <label for="leave_policies_id">Leave Reason</label> -->
                <textarea id="compose-textarea" placeholder="Please State your Reason here..." name="content" class="form-control" style="height: 300px"></textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
        </div>
        
  </div>

  
            

</div>
