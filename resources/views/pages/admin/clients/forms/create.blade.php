@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Client
            <small>Create</small>
        </h1>
    </section>                          
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('client.store') }}" >
                        @csrf
                        <div class="box-body">
                            @include('pages.admin.clients.forms.create_client')
                        </div>
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
                            <a type="button" class="ml-3 btn btn-warning" href="{{route('client.index')}}" > Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop