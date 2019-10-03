@extends('layouts.gen-layout')

@section('content')
 <div class="right_col" role="main">
      <div class="row">
      @include('pages.all_users.messages.gen-sidebar', ['active'=>'trash'])
            <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> <small>Trash</small></h2>
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
                                                <th scope="col">Sender</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Time Sent</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                        @if(!$message->is_read())
                                                            <span class="inline-block text-muted">
                                                                <span class='label label-warning'>Unread</span>
                                                            </span>
                                                        @endif
                                                    </td>
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

                                                        <button class="delete-btn btn btn-danger btn-sm glyphicon glyphicon-trash" title="Delete message" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-messageId="{{ $message->id }}"></button>
                                                        <button class="delete-btn btn btn-success btn-sm glyphicon glyphicon-repeat" style="transform: scale(-1, 1);" onclick="event.preventDefault(); document.getElementById('recover_msg').submit();"></button>

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
       
           
     </div>
</div>

<!--Delete modal start -->
<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="delete-form" method="post" id="deleteFormId">
                    {{csrf_field()}} 
                    {{method_field('DELETE')}} 
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="message_id" name="_method" value="DELETE" >
                    </div>
                    
                    <h4 class="text-center">Are you sure you want to permanently delete this Message? if deletded it can't be recover</h4>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success px-5">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Delete modal end -->
@endsection

@section('script')
<script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var message_id = button.data('messageid') // Extract info from data-* attributes
                console.log(message_id);
                var modal = $(this)
                $('#delete-form').attr('action', "delete/"+message_id);
            })
        });
    </script>
@endsection

