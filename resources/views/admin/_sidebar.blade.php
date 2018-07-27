
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/Welcome-PNG-Free-Download.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        
          <p>Now You ...</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- @include('pages.searchform') --}}
      <!-- /.search form -->
 <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="/admin">
                <i class="fa fa-dashboard"></i> <span>Админ-панель</span></a>
            </li>
            <li><a href="{{route('files.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Manage files</span></a>
            </li>
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Profile</span></a>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
 </aside>