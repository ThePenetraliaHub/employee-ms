
@extends('layouts.layout')

@section('content')
    <section class="content-header">
        <h1>Leave
            <small>Response</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary">
                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form" enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('leave-approval.store') }}">
                        @csrf
                        <div class="box-body">
                            @include('pages.all_users.leave.forms.respond_to_leave_request')
                            <span class='d-inline text-warning ml-4'>Please reconfirm your entry, response can not be revoked or updated after submitted</span><br>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success ml-4"><i class="fa fa-send-o"></i> Update</button>
                            <a href="{{ route('leave-approval.index') }}" class="btn btn-warning"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            @include('pages.all_users.leave.staffs_on_leave_summary')
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
