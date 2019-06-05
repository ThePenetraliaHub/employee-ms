<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('title') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="code">Employment Status</label>
        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('description') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="description">Employment Status Description</label>
        <textarea rows="3" id="description" type="textarea" class="form-control" name="description" required placeholder="Employment status description here....">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

</div>
   