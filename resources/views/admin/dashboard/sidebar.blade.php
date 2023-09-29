  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{route ('dashboard')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <p>
                Modules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('adminuserlist') }}" class="nav-link active">
                  <p>User Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('hrmlist') }}" class="nav-link">
                  <p>Hrm Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('salarylist') }}" class="nav-link">
                  
                  <p>Salary Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('leaveslist') }}" class="nav-link">
                 
                  <p>Leaves Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('attendencelist') }}" class="nav-link">
                
                  <p>Attendence Module</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('permission') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Permissions</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studentlist') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Student</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Customer</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout') }}"> logout </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>