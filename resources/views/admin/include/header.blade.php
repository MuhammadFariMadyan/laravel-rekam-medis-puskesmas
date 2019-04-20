      <header class="main-header">

        <!-- Logo -->
        <a href="{{URL::to('/')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Redis</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SI REDIS</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('/img/avatar04.png')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->username  }} <!-- (level {{Auth::user()->level}}) --></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('/img/avatar04.png')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->username  }}<br>
                      <b>Otoritas user : </b>Level {{Auth::user()->level}} 
                      <small></small>
                    </p>
                  </li>                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{{URL::to('/logout')}}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->              
            </ul>
          </div>

        </nav>
      </header>