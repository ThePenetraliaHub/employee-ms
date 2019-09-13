<form id="submit_form" novalidate class="form-horizontal form-label-left" method="POST" action="{{ route('pay-grade.store') }}">
    @csrf
    <div class="item form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Pay Grade Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="title"  name="title" value="{{ old('title') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('currency') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currency">Currency<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <select class="form-control col-md-7 col-xs-12" id="currency" name="currency"required="required">
        <option value="">-- Select Currency --</option>
            <option value="Naira" @if (old('currency') === "Naira") {{ 'selected' }} @endif>Naira</option>
            <option value="Dollar" @if (old('currency') === "Dollar") {{ 'selected' }} @endif>Dollar</option>
        </select>
        @if ($errors->has('currency'))
            <span class="help-block">
                <strong>{{ $errors->first('currency') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('min_salary') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_salary">Minimum Salary <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="number" id="min_salary"  name="min_salary" value="{{ old('min_salary') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('min_salary'))
            <span class="help-block">
                <strong>{{ $errors->first('min_salary') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('max_salary') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_salary">Maximum Salary <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="number" id="max_salary"  name="max_salary" value="{{ old('max_salary') }}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('max_salary'))
            <span class="help-block">
                <strong>{{ $errors->first('max_salary') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('pay-grade.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>