@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Edit Department
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
                    <form {{-- autocomplete="off" --}} novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('department.update',$department->id) }}">
                        {{csrf_field()}}  
                        {{method_field('PUT')}}  
                        <div class="box-body">
                            @include('pages.admin.departments.forms.edit_department')
                        </div>
                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2" style="margin-right:10px;">Update</button>
                            <a type="button" class="btn btn-warning" href="{{route('department.index')}}" > Cancel</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop