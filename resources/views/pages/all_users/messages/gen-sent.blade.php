@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
      @include('pages.all_users.messages.gen-sidebar', ['active'=>'sent'])
            <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> <small>Sent</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
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
       
           
     </div>
</div>
@endsection

@section('script')
<script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection

