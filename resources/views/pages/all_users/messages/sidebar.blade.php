<div class="col-md-3">
     @if(auth()->user()->can('send_messages'))
     <a href="{{route('message.compose')}}" class="btn btn-primary btn-block mb-2">Compose</a>
     @endif

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="{{ $active=='inbox' ? 'active' : '' }}">
                    <a href="{{route('message.inbox')}}">
                        <i class="fa fa-inbox"></i> Inbox
                        @if(auth()->user()->unread_inbox_message()->count() > 0)
                            <span class="label label-primary pull-right">
                                {{ auth()->user()->unread_inbox_message()->count() }}
                            </span>
                        @endif
                    </a>
                </li>

                @if(auth()->user()->can('send_messages'))
                <li class="{{ $active=='sent' ? 'active' : '' }}">
                    <a href="{{route('message.sent')}}">
                        <i class="fa fa-envelope-o"></i> Sent
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('send_messages'))
                <li class="{{ $active=='trash' ? 'active' : '' }}">
                    <a href="{{route('message.trash.index')}}">
                        <i class="fa fa-file-text-o"></i> Trash
                        @if(auth()->user()->unread_trash_message()->count() > 0)
                            <span class="label label-primary pull-right">
                                {{ auth()->user()->unread_trash_message()->count() }}
                            </span>
                        @endif
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

