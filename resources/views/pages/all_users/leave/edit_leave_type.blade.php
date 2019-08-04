@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Leave
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('leave-type.update',$leave_type->id) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            @include('pages.all_users.leave.forms.edit_leave_type')
                        </div>
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success ml-4">Update</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('leave-type.index')}}" > Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop