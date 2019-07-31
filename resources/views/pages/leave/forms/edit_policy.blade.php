<div class="form-row">
    <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('leave_name') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_name">Name</label>
            <input id="leave_name" type="text" class="form-control" name="leave_name" value="{{ old('leave_name',$leavePolicy->leave_name) }}" required>
            @if ($errors->has('leave_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-xs-11{{ $errors->has('type') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="type">Leave Type</label>
            <input id="type" type="text" class="form-control" name="type" value="{{ old('type',$leavePolicy->type) }}" required>
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-xs-11{{ $errors->has('description') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="description">Description</label>
            <textarea rows="4" id="description" type="textarea" class="form-control" name="description" required placeholder="Description of leave here...">{{ old('description',$leavePolicy->description) }}</textarea>
          @if ($errors->has('description'))
              <span class="help-block">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
        </div>

    </div>

   <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('days') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="days">Days</label>
            <input id="days" type="number" class="form-control" name="days" value="{{ old('days',$leavePolicy->days) }}" required>
            @if ($errors->has('days'))
                <span class="help-block">
                    <strong>{{ $errors->first('days') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-xs-11{{ $errors->has('effective_from') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="effective_from">Effective From</label>
            <input id="effective_from" type="date" class="form-control" name="effective_from" value="{{ old('effective_from',$leavePolicy->effective_from) }}" required>
            @if ($errors->has('effective_from'))
                <span class="help-block">
                    <strong>{{ $errors->first('effective_from') }}</strong>
                </span>
            @endif
        </div>

       <div class="form-group col-xs-11{{ $errors->has('gender') ? ' has-error' : '' }} mb-0 mt-3">
           <label for="gender">Eligibility</label>
           <select class="form-control" name="gender" id="gender" sellected="{{ old('leave_name') }}">
               <option value="All" @if (old('gender',$leavePolicy->gender) == 'All') {{ 'selected' }} @endif>All</option>
               <option value="Male" @if (old('gender',$leavePolicy->gender) == 'Male') {{ 'selected' }} @endif>Male</option>
               <option value="Female" @if (old('gender',$leavePolicy->gender) == 'Female') {{ 'selected' }} @endif>Female</option>
           </select>
        @if ($errors->has('gender'))
           <span class="help-block">
               <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
       </div>

    </div>
</div>


