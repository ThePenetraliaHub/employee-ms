          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ auth()->user()->unread_inbox_message()->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                @if(auth()->user()->unread_inbox_message()->count() == 0)
                    You have no unread message
                @else
                    You have {{ auth()->user()->unread_inbox_message()->count() }} unread messages
                @endif 
              </li>
              <li>
                <ul class="menu">
                    @foreach(auth()->user()->unread_inbox_message() as $message)
                        <li>
                            <a href="{{ route('message.show', $message->id) }}">
                                <h4>
                                    {{ $message->sender->name }}
                                    <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }} </small>
                                </h4>
                                <p>
                                    {{ substr($message->subject,0,20)}}
                                    <small> {!!substr($message->content,0,30)!!} </small>
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
              </li>
              @if(auth()->user()->unread_inbox_message()->count() > 0)
                    <li class="footer"><a href="{{ route("message.inbox") }}">See All Messages</a></li>
              @endif 
            </ul>
          </li>