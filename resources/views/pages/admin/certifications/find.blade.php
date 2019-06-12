@extends('layouts.layout')

@section('content')
    <!-- Edit Item-->
    <section class="content-header">
        <h1>Edit Certifications
            <small>Edit</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form method="get" autocomplete="off" novalidate="novalidate" role="form" id="submit_form" class="form-horizontal" >
                          
                        <div class="box-body">
                            @include('pages.admin.certifications.forms.find')
                        </div>

                        <div class="box-footer">
                            <button id="viewbtn" type="submit" class="btn btn-success col-xs-2" style="margin-right:10px;">View</button>
                            <button type="submit" id ="addbtn" class="btn btn-warning" href="" > Add</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Edit Item-->
@stop