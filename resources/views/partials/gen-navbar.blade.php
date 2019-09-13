<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      @if(auth()->user()->owner instanceof \App\SuperAdmin)
                           <img src="{{ auth()->user()->user_avatar }}" class="img-circle" alt="User Image">
                      @elseif(auth()->user()->owner instanceof \App\Employee)
                          <img src="{{ asset('storage/'.auth()->user()->owner->avatar) }}" class="img-circle" alt="User Image">
                      @endif 
                      @if(auth()->user()->typeable_type == "App\SuperAdmin")
                        {{ auth()->user()->user_type() }}
                      @else
                          {{ auth()->user()->owner->job_title->title }} 
                          <small>{{ auth()->user()->user_type() }}</small>
                      @endif 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><a href=""> 
                        @if(auth()->user()->owner instanceof \App\SuperAdmin)
                        <a  href="{{ route("admin.show", auth()->user()->owner->id) }}" >Edit Profile</a>
                        @elseif(auth()->user()->owner instanceof \App\Employee)
                        <a  href="{{ route("employee.show", auth()->user()->owner->id) }}" >Edit Profile</a>
                        @endif
                        </a>
                      </li>
                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i></i> Log Out</a></li>
                  </ul>
                </li>

                @if(auth()->user()->hasAnyPermission(['receive_messages','send_messages']))
                @include("partials.header-widget.gen-messages")
                @endif
              </ul>
            </nav>
          </div>
        </div>