<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span> 

    <span class="ml-3">
      {{ config('app.name') }}
    </span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
         @include("partials.header-widget.messages")
         @include("partials.header-widget.notifications")
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ auth()->user()->user_avatar }}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{ auth()->user()->user_avatar }}" class="img-circle" alt="User Image">
            <p>
                @if(auth()->user()->typeable_type == "App\SuperAdmin")
                    {{ auth()->user()->user_type() }}
                @else
                    {{ auth()->user()->owner->job_title->title }} 
                    <small>{{ auth()->user()->user_type() }}</small>
                @endif 
            </p>
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
                <a 
                    class="btn btn-default btn-flat"
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>