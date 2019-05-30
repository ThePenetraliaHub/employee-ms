@if(Session::has('success'))
	<div class="alert alert-success col-sm-6 col-sm-offset-6" id="success-alert" role="alert">
		{{Session::get('success')}}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-success col-sm-6 col-sm-offset-6" role="alert">
		{{Session::get('success')}}
	</div>
@endif

{{-- @if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		<strong>Error(s)</strong>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</div>
@endif --}}