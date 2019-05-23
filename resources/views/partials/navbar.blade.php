<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset("img/user2-160x160.jpg") }}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{ asset("img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
                <a 
                    class="btn btn-default btn-flat"
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign out
                </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>