@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Leave Policy
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('leave-policy.update',$leavePolicy->id) }}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="box-body">
                            @include('pages.leave.forms.edit_policy')
                        </div>
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2">Update</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('leave-policy.index')}}" > Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop