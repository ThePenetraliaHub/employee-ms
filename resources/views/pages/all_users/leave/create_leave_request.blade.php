
@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Leave
            <small>Request</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('leave-request.store') }}">
                        @csrf
                        <div class="box-body">
                            @include('pages.all_users.leave.forms.create_leave_request')
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success ml-4"><i class="fa fa-send-o"></i> Request</button>
                            <a href="{{ route('leave-request.index') }}" class="btn btn-warning"><i class="fa fa-times"></i> Discard</a>
                        </div>
                    </form>
                </div>
            </div>

            @include('pages.all_users.leave.compulsory_leave_summary')
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
