<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
			{!! Form::label('name', 'Name: ', ['class'=>'control-label']) !!}
			{!! Form::text('name', old('name'), ['class'=>'form-control mb-1"']) !!}
			@if ($errors->has('name'))
		   		<span class="help-block"> {{ $errors->first('name') }}</span>
		    @endif
		</div>
	</div>
	<div class="col-md-6">
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Price: ', ['class'=>'control-label']) !!}
            {!! Form::number('price', old('price'), ['class'=>'form-control mb-1"']) !!}

            @if ($errors->has('price'))
                <span class="help-block"> {{ $errors->first('price') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row mb-5">

	<div class="col-md-6">
        
        {!! Form::label('item_category_id', 'Item Category: ', ['class'=>'control-label']) !!}

            {!! Form::select('item_category_id', $item_categories, old('item_category_id'), ['class'=>'form-control  mb-1']) !!}

            @if ($errors->has('item_category'))
                <span class="help-block">{{ $errors->first('item_category') }}</span>
            @endif
    </div>
	<div class="col-md-6">
        
        {!! Form::label('service_category_id', 'Service Category: ', ['class'=>'control-label']) !!}

            {!! Form::select('service_category_id', $service_categories, old('service_category_id'), ['class'=>'form-control  mb-1']) !!}

            @if ($errors->has('service_category'))
                <span class="help-block">{{ $errors->first('service_category') }}</span>
            @endif
    </div>
</div>

<div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
        <span id="payment-button-amount">{{ $submit}}</span>
    </button>
</div>
