  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/Welcome-PNG-Free-Download.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        @if(Auth::check())
          <p>Welcome {{Auth::user()->name}}!</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        @else
          <p>Common. Let's go!</p>
          <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
        @endif
        </div>
      </div>
      <!-- search form -->
      {{-- @include('pages.searchform') --}}
      <!-- /.search form -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li> 
    @if(Auth::check())
      <li><a href="{{route('files.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Manage files</span></a>
      </li>
      <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Profile</span></a>
      </li>
    @else
      <li><a href="/register">Register</a></li>
      <li><a href="/login">Login</a></li>
    @endif               
        
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>