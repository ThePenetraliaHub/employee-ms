<form id="submit_form" novalidate class="form-horizontal form-label-left"  method="POST" action="{{ route('files.update',$file->id) }}">
{{csrf_field()}}  
{{method_field('PUT')}}  
    <div class="item form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Name <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="name"  name="name" value="{{ $file->name}}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="item form-group {{ $errors->has('number') ? ' has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">File Number <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
        <input type="text" id="number"  name="number" value="{{ $file->number}}" required="required" class="form-control col-md-7 col-xs-12">
        @if ($errors->has('number'))
            <span class="help-block">
                <strong>{{ $errors->first('number') }}</strong>
            </span>
        @endif
    </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a type="button" class="btn btn-warning" type="button" href="{{route('files.index')}}">Cancel</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </div >
</form>