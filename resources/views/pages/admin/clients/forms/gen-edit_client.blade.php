<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST"action="{{ route('client.update', $client->id) }}">
{{csrf_field()}}  
{{method_field('PUT')}} 
    <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Client Name <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="name"  name="name" value="{{ old('name', $client->name) }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('details') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Clients Details <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <textarea id="details"  name="details" required="required" class="form-control col-md-7 col-xs-12">
        {{ old('details', $client->details) }}
        </textarea>
        @if ($errors->has('details'))
            <span class="help-block">
                <strong>{{ $errors->first('details') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('address') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Client Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="address"  name="address" value="{{ old('address', $client->address) }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('contact_number') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_number">Client Contact Number <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="contact_number"  name="contact_number" value="{{ old('contact_number', $client->contact_number) }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('contact_number'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_number') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('contact_email') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_email">Client Contact Email<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="email" id="contact_email"  name="contact_email" value="{{ old('contact_email', $client->contact_email) }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('company_url') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_url">Client Website if Available
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="url" id="company_url"  name="company_url"  value="{{ old('company_url', $client->company_url) }}" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('company_url'))
            <span class="help-block">
                <strong>{{ $errors->first('company_url') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Client Active Status<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="status" name="status"required="required">
        <option value="1" @if (old('status', $client->status) == 1) {{ 'selected' }} @endif>Active</option>
        <option value="0" @if (old('status', $client->status) == 0) {{ 'selected' }} @endif>Inactive</option>
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('first_contact_date') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_contact_date">First Contacted Date<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group has-feedback">
                        <input type="text" name="first_contact_date" value="{{ old('first_contact_date', $client->first_contact_date->format('Y-m-d')) }}" class="form-control col-md-7 col-xs-12 has-feedback-left " id="single_cal4"  aria-describedby="inputSuccess2Status4">
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                    </div>
            @if ($errors->has('first_contact_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_contact_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('client.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>