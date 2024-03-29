@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Attendance
            <small>Sign-in</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
					<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('attendance.sign_in.store') }}">
						@csrf
						<div class="box-body">
                            <span class="text-info">You need not sign in a staff that is absent with no reason</span>
							@include('pages.all_users.attendance.forms.create_sign_in')
						</div>
						<div class="box-footer">
							<button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('attendance.index')}}" > Cancel</a> 
						</div>
					</form>
                </div>
            </div>
        </div>
    </section>
@stop