
@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Request Leave
            <small>Create</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('leave.store') }}">
                        @csrf
                        <div class="box-body">
                            @include('pages.leave.forms.request')
                        </div>
                        <!-- <div class="box-footer">
                            <button id="button" type="submit" class="btn btn-success col-xs-2">Create</button>
                            <a type="button" class="btn btn-warning ml-3" href="{{route('leave.index')}}" > Cancel</a>
                        </div> -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Request</button>
                            </div>
                            <a href="{{ route('leave.index') }}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <h6>Days Calculator</h6>
                    <div class="table-responsive table-bordered">
                        <table id="dataTable" class="table table-striped table-responsive">
                            <thead>
                            <tr class="table-heading-bg">
                                <th scope="col">01/07/2019 </th>
                                <th scope="col">--</th>
                                <th scope="col">11/07/2019</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $sum2 =0; ?>
                            @for($i =1;$i<12;$i++)
                            <tr>
                                <td>Tue, Jul {{$i}}</td>
                                <td><?php $sum =rand ( 0 , 1 );$sum2+=$sum; ?></td>
                                <td> {{$sum }} day</td>
                            </tr>
                                @endfor
                            <tr><span class="text-center text-red">Total Days = {{$sum2}}</span> </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#compose-textarea").wysihtml5();
        });
    </script>


@endsection
