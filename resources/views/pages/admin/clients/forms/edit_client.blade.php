<div class="form-row">
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
        <label for="name">Client Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $client->name) }}" required="" placeholder="">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group col-xs-11{{ $errors->has('details') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="details">Clients Details</label>
        <textarea rows="3" id="details" type="textarea" class="form-control" name="details" required >{{ old('details', $client->details) }}</textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('address') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="address">Client Address</label>
        <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $client->address) }}" required>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('contact_number') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="contact_number">Client Contact Number</label>
        <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number', $client->contact_number) }}" required data-parsley-type="number" minlength="11" maxlength="11">
        @if ($errors->has('contact_number'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_number') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('contact_email') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="contact_email">Client Contact Email</label>
        <input id="contact_email" type="email" class="form-control" name="contact_email" value="{{ old('contact_email', $client->contact_email) }}" required>
        @if ($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('company_url') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="company_url">Client Website if Available</label>
        <input id="company_url" type="text" class="form-control" name="company_url" value="{{ old('company_url', $client->company_url) }}" data-parsley-type="url">
        @if ($errors->has('company_url'))
            <span class="help-block">
                <strong>{{ $errors->first('company_url') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="status">Client Active Status</label>
        <select class="form-control" id="status" name="status" value="{{ old('status') }}">
            <option value="1" @if (old('status', $client->status) == 1) {{ 'selected' }} @endif>Active</option>
            <option value="0" @if (old('status', $client->status) == 0) {{ 'selected' }} @endif>Inactive</option>
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>

     <div class="form-group col-xs-11{{ $errors->has('first_contact_date') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="first_contact_date">First Contacted Date</label>
        <input id="first_contact_date" type="date" class="form-control" name="first_contact_date" value="{{ old('first_contact_date', $client->first_contact_date) }}" required>
        @if ($errors->has('first_contact_date'))
            <span class="help-block">
                <strong>{{ $errors->first('first_contact_date') }}</strong>
            </span>
        @endif
    </div> 
</div>