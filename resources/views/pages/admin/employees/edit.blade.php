@extends('layouts.layout')

@section('content')
    <!-- Edit Item-->
    <section class="content-header">
        <h1>Edit Employee
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" method="POST" action="{{ route('employee.update', $employee->id) }}"{{-- data-parsley-validate="" --}}>
                        {{csrf_field()}}  
                        {{method_field('PUT')}}  
                        <div class="box-body">
                            @include('pages.admin.employees.forms.edit_employee')
                        </div>

                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2" style="margin-right:10px;">Update</button>
                            <a type="button" class="btn btn-warning" href="{{route('employee.index')}}" > Cancel</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Edit Item-->
@stop