@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Add new File Movement
            <small>Create</small>
        </h1>
    </section>                          
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-push-2">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('histories.store') }}">
                        @csrf
                        <div class="box-body">
                            @include('pages.admin.histories.forms.create')
                        </div>
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('histories.index')}}" > Cancel</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop