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
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sent</h3>
                    </div>

                    <div class="box-body">
                        @if(count($messages) > 0)
                            <div class="table-responsive mailbox-messages">
                                <table id="dataTable" class="table table-hover table-striped ">
                                    <thead>
                                        <tr class="table-heading-bg">
                                            <th scope="col">S/N</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Time Sent</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="mailbox-subject text-truncate" style="max-width: 250px;">
                                                    <b>{{ $message->subject }}</b> {{ $message->subject != ""? "-" : "" }}
                                                    <span class="text-muted"> {!! $message->content !!} </span>
                                                </td>
                                                <td class="mailbox-date">
                                                    {{ $message->created_at->diffForHumans() }}
                                                </td>
                                                <td class="text-center">
                                                    <form method="post" action="{{ route("message.trash.delete", $message->id) }}">
                                                        {{csrf_field()}} 
                                                        {{method_field('DELETE')}} 

                                                        <a class="edit-btn btn btn-info btn-sm glyphicon glyphicon-eye-open" href="{{ route('message.show', $message->id) }}" role="button" ></a>

                                                        <button class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" href=""></button>
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
                                    Your sent messages will apear here.
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

