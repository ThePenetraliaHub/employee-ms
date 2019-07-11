<div class="col-md-3">
    <a href="{{route('message.compose')}}" class="btn btn-primary btn-block mb-2">Compose</a>

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
                        <span class="label label-primary pull-right">12</span>
                    </a>
                </li>

                <li class="{{ $active=='sent' ? 'active' : '' }}">
                    <a href="{{route('message.sent')}}">
                        <i class="fa fa-envelope-o"></i> Sent
                        <span class="label label-primary pull-right">12</span>
                    </a>
                </li>

                <li class="{{ $active=='trash' ? 'active' : '' }}">
                    <a href="{{route('message.trash.index')}}">
                        <i class="fa fa-file-text-o"></i> Trash
                        <span class="label label-primary pull-right">12</span>
                    </a>
                </li>

                {{-- <li class="{{ $active=='broadcast' ? 'active' : '' }}">
                    <a href="{{route('message.broadcast')}}">
                        <i class="fa fa-envelope-o"></i> Broadcast
                        <span class="label label-primary pull-right">12</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

