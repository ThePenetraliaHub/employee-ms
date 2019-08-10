@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Attendance
            <small>Sign Out</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
					<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('attendance.sign_out.store') }}">
						@csrf
						<div class="box-body">
							@include('pages.all_users.attendance.forms.create_sign_out')
						</div>
						<div class="box-footer">
							<button id="button" type="submit" class="btn btn-success col-xs-2">Sign out</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('attendance.index')}}" > Cancel</a> 
						</div>
					</form>
                </div>
            </div>
        </div>
    </section>
@stop