@if(Session::has('success'))
	<div class="alert alert-success col-sm-6 col-sm-offset-6" id="success-alert" role="alert">
		{{Session::get('success')}}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-error col-sm-6 col-sm-offset-6" id="success-alert" role="alert">
		{{Session::get('error')}}
	</div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-warning col-sm-6 col-sm-offset-6" id="warning-alert" role="warning">
		{{Session::get('warning')}}
	</div>
@endif

@if (session('status'))
	<div class="alert alert-success col-sm-6 col-sm-offset-6" id="success-alert" role="alert">
		{{ session('status') }}
	</div>
@endif