<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('leave-type.store')}}" >
    @csrf
<div class="form-row">
    <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('leave_name') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="leave_name">Title</label>
            <input id="leave_name" type="text" class="form-control" name="leave_name" value="{{ old('leave_name') }}" required>
            @if ($errors->has('leave_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('leave_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-xs-11{{ $errors->has('description') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="description">Description</label>
            <textarea rows="4" id="description" type="textarea" class="form-control" name="description" required placeholder="Description of leave here...">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('number_of_days') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="number_of_days">Number of days (Leave as 0 if it cannot be predefined)</label>
            <input id="number_of_days" type="number" class="form-control" name="number_of_days" value="{{ old('number_of_days', '0') }}" required>
            @if ($errors->has('number_of_days'))
                <span class="help-block">
                    <strong>{{ $errors->first('number_of_days') }}</strong>
                </span>
            @endif
        </div>

       <div class="form-group col-xs-11{{ $errors->has('eligibility') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="eligibility">Eligibility</label>
            <select class="form-control" name="eligibility" id="eligibility">
                <option value="All" @if (old('eligibility') == 'All') {{ 'selected' }} @endif>All</option>
                <option value="Male" @if (old('eligibility') == 'Male') {{ 'selected' }} @endif>Male</option>
                <option value="Female" @if (old('eligibility') == 'Female') {{ 'selected' }} @endif>Female</option>
            </select>
            @if ($errors->has('eligibility'))
               <span class="help-block">
                   <strong>{{ $errors->first('eligibility') }}</strong>
                </span>
            @endif
       </div>

       <div class="form-group col-xs-11{{ $errors->has('compulsory') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="compulsory">Is Leave Compulsory?</label>
            <select class="form-control" name="compulsory" id="compulsory">
                <option value="No" @if (old('compulsory') == 'No') {{ 'selected' }} @endif>No</option>
                <option value="Yes" @if (old('compulsory') == 'Yes') {{ 'selected' }} @endif>Yes</option>
            </select>
            @if ($errors->has('compulsory'))
               <span class="help-block">
                   <strong>{{ $errors->first('compulsory') }}</strong>
                </span>
            @endif
       </div>
    </div>

    <div class="col-md-6">
        <div class="form-group col-xs-11{{ $errors->has('is_active') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="is_active">Leave Status</label>
            <select class="form-control" name="is_active" id="is_active">
                <option value="Active" @if (old('is_active') == 'Active') {{ 'selected' }} @endif>Active</option>
                <option value="Inactive" @if (old('is_active') == 'Inactive') {{ 'selected' }} @endif>Inactive</option>
            </select>
            @if ($errors->has('is_active'))
               <span class="help-block">
                   <strong>{{ $errors->first('is_active') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <a type="button" class="btn btn-warning" type="button" href="{{route('leave-type.index')}}">Cancel</a>
    <button type="submit" class="btn btn-success">Submit</button>
</div>
</div >
</form>


