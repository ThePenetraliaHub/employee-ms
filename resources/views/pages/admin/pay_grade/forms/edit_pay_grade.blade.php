<div class="form-row">
    <div class="form-group col-xs-11{{ $errors->has('title') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="title">Pay Grade Title</label>
        <input id="title" type="text" class="form-control" name="title" value="{{ old('title',$pay_grade->title) }}" required>
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('currency') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="currency">Currency</label>
        <select class="form-control" id="currency" name="currency">
            <option value="">-- Select Currency --</option>
            <option value="Naira" @if (old('currency',$pay_grade->currency) === "Naira") {{ 'selected' }} @endif>Naira</option>
            <option value="Dollar" @if (old('currency',$pay_grade->currency) === "Dollar") {{ 'selected' }} @endif>Dollar</option>
        </select>
        @if ($errors->has('currency'))
        <span class="help-block">
            <strong>{{ $errors->first('currency') }}</strong>
        </span>
        @endif
    </div>


    <div class="form-group col-xs-11{{ $errors->has('min_salary') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="min_salary">Minimum Salary</label>
        <input id="min_salary" type="number" class="form-control" name="min_salary" value="{{ old('min_salary',$pay_grade->min_salary) }}" required>
        @if ($errors->has('min_salary'))
            <span class="help-block">
                <strong>{{ $errors->first('min_salary') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-xs-11{{ $errors->has('max_salary') ? ' has-error' : '' }} mb-0 mt-3">
        <label for="max_salary">Maximum Salary</label>
        <input id="max_salary" type="number" class="form-control" name="max_salary" value="{{ old('max_salary',$pay_grade->max_salary) }}" required>
        @if ($errors->has('max_salary'))
            <span class="help-block">
                <strong>{{ $errors->first('max_salary') }}</strong>
            </span>
        @endif
    </div>

</div>
   