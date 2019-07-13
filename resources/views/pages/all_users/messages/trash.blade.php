@extends('layouts.layout')

@section('content')
<section class="content-header panel">
    <h1>Message
        <small>trash</small>
    </h1>
</section>
    <section class="content">
        <div class="row">
            @include('pages.all_users.messages.sidebar', ['active'=>'trash'])
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trash</h3>
                    </div>

                    <div class="box-body">
                        @if(count($messages) > 0)
                            <div class="table-responsive mailbox-messages">
                                <table id="dataTable" class="table table-hover table-striped ">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Sender</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Time Sent</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="mailbox-subject text-truncate">
                                                    <a href="{{ route("employee.profile", $message->sender->owner->id) }}">{{ $message->sender->name }}</a>
                                                </td>
                                                <td class="mailbox-subject text-truncate" style="max-width: 250px;">
                                                    <b>{{ $message->subject }}</b> {{ $message->subject != ""? "-" : "" }}
                                                    <span class="text-muted"> {!! $message->content !!} </span>
                                                </td>
                                                <td class="mailbox-date">
                                                    {{ $message->created_at->diffForHumans() }}
                                                </td>
                                                <td class="text-center" style="min-width:120px;">
                                                    <a title="View message content" class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('message.show', $message->id) }}" role="button" ></a>

                                                    <button class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete message" onclick="event.preventDefault(); document.getElementById('delete_msg').submit();"></button>
                                                    <button class="delete-btn btn btn-success btn-sm glyphicon glyphicon-repeat" style="transform: scale(-1, 1);" onclick="event.preventDefault(); document.getElementById('recover_msg').submit();"></button>

                                                    <form method="post" id="delete_msg" action="{{ route("message.delete", $message->id) }}" class="form-inline">
                                                        {{csrf_field()}} 
                                                        {{method_field('DELETE')}} 
                                                    </form>

                                                    <form method="post"  id="recover_msg" action="{{ route("message.trash.recover", $message->id) }}" class="form-inline">
                                                        {{csrf_field()}} 
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('icons.empty')
                                <p class="text-muted my-3">
                                    Your trashed messages will apear here.
                                </p>
                            </div>
                        @endif
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

