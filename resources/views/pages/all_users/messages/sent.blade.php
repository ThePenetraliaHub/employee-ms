@extends('layouts.layout')

@section('content')
<section class="content-header panel">
    <h1>Message
        <small>sent</small>
    </h1>
</section>
    <section class="content">
        <div class="row">
            @include('pages.all_users.messages.sidebar', ['active'=>'sent'])
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sent</h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive mailbox-messages">
                            <table id="dataTable" class="table table-hover table-striped ">
                                <thead>
                                    <tr class="table-heading-bg">
                                        <th scope="col">S/N</th>
                                        <th scope="col">Sender</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="mailbox-name">
                                            <a href="">Alexander Pierce</a></td>
                                        <td class="mailbox-subject">
                                            <b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                                        </td>
                                        <td class="mailbox-date">
                                            5 mins ago
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
@endsection

