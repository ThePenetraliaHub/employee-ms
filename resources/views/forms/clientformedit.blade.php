<div class="form-row">
        <div class="form-group col-xs-11 mb-0 mt-3">
            <input id="name" type="text" class="form-control" name="name" value="{{ $client->name}}" required="" placeholder="Client Name"> 
        </div>
        <div class="form-group col-xs-11{{ $errors->has('details') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="details">Clients Details</label>
            <textarea placeholder="Clients details here..." rows="3" id="details" type="textarea" class="form-control" name="details" value="{{ $client->details}}" required > </textarea>
        </div>
        <div class="form-group col-xs-11{{ $errors->has('address') ? ' has-error' : '' }} mb-0 mt-3">
            <input id="address" type="text" class="form-control" name="address" value="{{ $client->address}}" required placeholder="Client Address">
        </div>
        <div class="form-group col-xs-11{{ $errors->has('contact_number') ? ' has-error' : '' }} mb-0 mt-3">
            <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ $client->contact_number}}" required data-parsley-type="number" minlength="11" maxlength="11" placeholder="Client Contact Number">
        </div>
        <div class="form-group col-xs-11{{ $errors->has('contact_email') ? ' has-error' : '' }} mb-0 mt-3">
            <input id="contact_email" type="email" class="form-control" name="contact_email" value="{{ $client->contact_email}}" required  placeholder="Client Contact Email">
        </div>
        <div class="form-group col-xs-11{{ $errors->has('company_url') ? ' has-error' : '' }} mb-0 mt-3">
            <input id="company_url" type="text" class="form-control" name="company_url" value="{{ $client->company_url}}" data-parsley-type="url" placeholder="Client Website if Available">
        </div>
        <div class="form-group col-xs-11{{ $errors->has('status') ? ' has-error' : '' }} mb-0 mt-3">
            <select class="form-control" id="status" name="status" value="{{ $client->status}}">
              <option>Active</option>
              <option>Inactive</option>
          </select>
          
        </div>

         <div class="form-group col-xs-11{{ $errors->has('first_contact_date') ? ' has-error' : '' }} mb-0 mt-3">
            <label for="first_contact_date">First Contacted Date</label>
            <input id="first_contact_date" type="date" class="form-control" name="first_contact_date" value="{{ $client->first_contact_date}}" required placeholder="Client Fist Contacted Date">
        </div> 

        </div>
 </div>