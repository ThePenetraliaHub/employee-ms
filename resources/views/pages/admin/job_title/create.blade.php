@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Create Job Titles
            <small>Create</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
					<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('job-title.store') }}">
						@csrf
						<div class="box-body">
							@include('pages.admin.job_title.forms.create_job_title')
						</div>
						<div class="box-footer">
							<button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </section>
@stop