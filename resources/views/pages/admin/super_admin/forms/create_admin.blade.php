<div class="form-row">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="name">Admin's Name</label>
      <input name="name" value="{{ old('name') }}" class="form-control" placeholder="" required/>
      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="email">Admin's Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="" required/>
      @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="phone">Admin's Mobile</label>
      <input name="phone" value="{{ old('phone') }}" class="form-control" placeholder="" required/>
      @if ($errors->has('phone'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('phone') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-xs-11 mb-0 mt-3">
      <label for="address">Admin's Address</label>
      <textarea name="address" class="form-control">{{ old('address') }}</textarea>
      @if ($errors->has('address'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('address') }}</strong>
          </span>
      @endif
    </div>
</div>
   @section('script')
    <script>
        $(document).ready(function () {
            $('#employee_id').select2({
                //multiple: true
            });
        });
    </script>
@endsection