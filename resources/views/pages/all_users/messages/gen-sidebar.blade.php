
<div class="col-md-3 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Message  <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> -->
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                    
                        @if(auth()->user()->can('send_messages'))
                        <a href="{{route('message.compose')}}" class="btn btn-success btn-block mb-2">Compose</a>
                        @endif
                            <div class="box-header with-border">
                                <h4 class="box-title">Folders</h4>
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
                                            <i class="fa fa-trash"></i> Trash
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

</div>

