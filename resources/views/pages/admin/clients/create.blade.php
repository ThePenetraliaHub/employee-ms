@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Create Clients
            <small>Create</small>
        </h1>
    </section>                          
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('client.store') }}" data-parsley-validate="">
                    @csrf
                    <div class="box-body">
                        @include('pages.admin.clients.forms.create_client')
                    </div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <span class="help-block">
                                    <strong>{{$error}}</strong>
                                </span>
                            @endforeach
                        @endif
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
                        </div>
                    </form>
             </div>
            </div>
        </div>
    </section>
@stop