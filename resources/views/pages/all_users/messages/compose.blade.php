@extends('layouts.layout')

@section('content')
    <section class="content-header panel">
        <h1>Message
            <small>compose</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            @include('pages.all_users.messages.sidebar', ['active'=>'nill'])
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose New Message</h3>
                    </div>

                    <form autocomplete="off" novalidate="novalidate" role="form" id="submit_form"  enctype="multipart/form-data" method="POST" action="{{ route('certification.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="To:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" style="height: 300px"></textarea>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-right">
                                <button name="draft" type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                <button name="send" type="submit" class="btn btn-success"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <a href="{{ "message.inbox" }}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();
        });
    </script>
@endsection

