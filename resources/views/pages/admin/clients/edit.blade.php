@extends('layouts.layout')

@section('content')
    <!-- Edit Item-->
          <section class="content-header">
        <h1>Edit Client
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
<section class="content">
        <div class="row">
        <div class="col-md-8">
        <div class="box box-primary">
        <form {{-- autocomplete="off" --}} novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('client.update',$client->id) }}"data-parsley-validate="">
        {{csrf_field()}}  
        {{method_field('PUT')}}  
        <div class="box-body">

        @include('forms.clientformedit')
        </div>
        <div class="box-footer">
        <button id="button" type="submit" class="btn btn-success col-xs-2" style="margin-right:10px;">UPDATE</button>
       <a type="button" class="btn btn-warning" href="{{route('client.index')}}" > Cancel</a> 
        </div>
        </form>
        </div>
        </div>
        </div>
    </section>
    <!-- End Edit Item-->
@stop