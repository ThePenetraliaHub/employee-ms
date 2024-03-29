@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Leave
            <small>Create</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('leave-type.store') }}">
                        @csrf
                        <div class="box-body">
                            @include('pages.all_users.leave.forms.create_leave_type')
                        </div>
                        <div class="box-footer ml-4">
                            <button id="button" type="submit" class="btn btn-success">Create</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('leave-type.index')}}" > Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop