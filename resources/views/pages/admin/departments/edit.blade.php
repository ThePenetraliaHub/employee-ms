@extends('layouts.manage')
@section('title', 'Edit Item')

@section('content')
    <!-- Edit Item-->
        <section class="p-t-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">Edit Item</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Item</h3>
                                </div>
                                <hr>
                                {!! Form::model($item, ['method'=> 'PATCH', 'class'=>'form-horizontal form-label-left','route' => ['items.update', $item->id]]) !!}

                                    @include('manage.items.partials.form', ['submit'=>'Update'])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
    <!-- End Edit Item-->
@stop