
        <div class="form-row">
            <div class="form-group col-xs-11{{ $errors->has('name') ? ' has-error' : '' }} mb-0 mt-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="Department Name">
                
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

            </div>
        </div>
   