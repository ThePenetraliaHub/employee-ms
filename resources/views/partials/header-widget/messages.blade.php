          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{auth()->user()->inbox_message()->where("read_status",0)->count()}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{auth()->user()->inbox_message()->where("read_status",0)->count()}} unread messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach(auth()->user()->inbox_message()->where("read_status",0) as $message)
                  <li><!-- start message -->
                    <a  href="{{ route('message.show', $message->id) }}">
                      <h4>
                        {{substr($message->subject,0,20)}}
                        <small><i class="fa fa-clock-o"></i> {{$message->created_at->diffForHumans()}}</small>
                      </h4>
                      <p>{!!substr($message->content,0,30)!!}</p>
                    </a>
                  </li>
                  <!-- end message -->
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ route("message.inbox") }}">See All Messages</a></li>
            </ul>
          </li>