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
                  <li>
                    <a href="#">
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="{{ route("message.inbox") }}">See All Messages</a></li>
            </ul>
          </li>