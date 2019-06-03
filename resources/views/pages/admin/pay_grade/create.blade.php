@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Create Pay Grade
            <small>Create</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
					<form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('pay_grade.store') }}" >
						@csrf
						<div class="box-body">
							@include('pages.admin.pay_grade.forms.create_pay_grade')
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