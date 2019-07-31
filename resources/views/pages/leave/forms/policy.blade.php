<div class="form-row">
    <div class="col-md-6">
        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="leave_name" value="" required>
           <!--  @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>

        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="type">Leave Type</label>
            <input id="type" type="text" class="form-control" name="type" value="" required>
           <!--  @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>


        <div class="form-group col-xs-11<!-- {{ $errors->has('description') ? ' has-error' : '' }} --> mb-0 mt-3">
        <label for="gender">Description</label>
            <textarea rows="4" id="details" type="textarea" class="form-control" name="description" required placeholder="Description of leave here...">{{ old('description') }}</textarea>
       <!--  @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif -->
        </div>

    </div>

   <div class="col-md-6">
        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="days">Days</label>
            <input id="days" type="number" class="form-control" name="days" value="" required>
           <!--  @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>

        <div class="form-group col-xs-11<!-- {{ $errors->has('date') ? ' has-error' : '' }} --> mb-0 mt-3">
            <label for="effective_from">Effective From</label>
            <input id="effective_from" type="date" class="form-control" name="effective_from" value="" required>
           <!--  @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif -->
        </div>

       <div class="form-group col-xs-11<!-- {{ $errors->has('gender') ? ' has-error' : '' }} --> mb-0 mt-3">
           <label for="gender">Gender</label>
           <select class="form-control" name="gender" id="gender">
               <option value="Male">Male</option>
               <option value="Female">Female</option>
           </select>
       <!--  @if ($errors->has('gender'))
           <span class="help-block">
               <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif -->
       </div>

    </div>
</div>


