<div class="form-row">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="name">Admin's Name</label>
      <input name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="" required/>
      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="email">Admin's Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="" required/>
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="phone">Admin's Mobile</label>
      <input name="phone" value="{{ old('phone', $user->owner->phone) }}" class="form-control" placeholder="" required/>
      @if ($errors->has('phone'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="address">Admin's Address</label>
      <textarea name="address" class="form-control">{{ old('address', $user->owner->address) }}</textarea>
      @if ($errors->has('address'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('address') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('role') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="role">Role</label>
        <select class="form-control " id="role" name="role" style="width: 100%;">
            <option value=""></option>
            @foreach($roles as $roles)
                <option value="{{ $roles->name }}" @if (old('role', $user->getRoleNames()->first()) == $roles->name) {{ 'selected' }} @endif>{{$roles->display_name}}</option>
            @endforeach
        </select>
        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>