@if(Session::has('success'))
	<div class="alert alert-success col-sm-6 col-sm-offset-6" id="success-alert" role="alert">
		{{Session::get('success')}}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-error col-sm-6 col-sm-offset-6" role="alert">
		{{Session::get('error')}}
	</div>
@endif