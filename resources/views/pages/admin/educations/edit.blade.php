@extends('layouts.layout')

@section('content')
    <!-- Edit Item-->
    <section class="content-header">
        <h1>Education 
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('education.update', $education->id) }}">
                        {{csrf_field()}}  
                        {{method_field('PUT')}}  
                        <div class="box-body">
                            @include('pages.admin.educations.forms.edit_education')
                        </div>

                        <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2" style="margin-right:10px;">Update</button>
                            <a type="button" class="btn btn-warning" href="{{route('education.index')}}" > Cancel</a> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Edit Item-->
@stop