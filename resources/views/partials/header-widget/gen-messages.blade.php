<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{ auth()->user()->unread_inbox_message()->count() }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li class="header">
                        @if(auth()->user()->unread_inbox_message()->count() == 0)
                            You have no unread message
                        @else
                            You have {{ auth()->user()->unread_inbox_message()->count() }} unread messages
                        @endif 
                    </li>
                    @foreach(auth()->user()->unread_inbox_message() as $message)
                    <li>
                      <a>
                        <span class="image"><img src="{{ auth()->user()->user_avatar }}" alt="Profile Image" /></span>
                        <span>
                          <span>{{ $message->sender->name }}</span>
                          <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                        </span>
                        <span class="message">
                        {{ substr($message->subject,0,20)}}
                        <!-- <small> {!!substr($message->content,0,30)!!} </small> -->
                        </span>
                      </a>
                    </li>
                    @endforeach
                  
                      <div class="text-center">
                      @if(auth()->user()->unread_inbox_message()->count() > 0)
                        <a href="{{ route("message.inbox") }}">
                          <strong>See All Messages</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      @endif
                      </div>
                    </li>
                  </ul>
 </li>