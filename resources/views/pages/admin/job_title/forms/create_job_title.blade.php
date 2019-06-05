<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('code') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="code">Job Title Code</label>
        <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required>
        @if ($errors->has('code'))
            <span class="help-block">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('title') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="code">Job Title</label>
        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('description') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="description">Job Description</label>
        <textarea rows="3" id="description" type="textarea" class="form-control" name="description" required placeholder="Job description here....">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

</div>
   