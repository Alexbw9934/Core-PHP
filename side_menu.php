<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img  src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?php if($_session['menu']=="dashboard"){echo "active";}?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="user_list.php" class="nav-link <?php if($_session['menu']=="user"){echo "active";}?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="driver_list.php" class="nav-link <?php if($_session['menu']=="driver"){echo "active";}?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Drivers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="result_list.php" class="nav-link <?php if($_session['menu']=="result"){echo "active";}?>">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                  Results</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Events.php" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                  Events</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Stats.html" class="nav-link">
                <i class="nav-icon fas fa-chart-area"></i>
                <p>
                  Stats</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="products_list.php" class="nav-link <?php if($_session['menu']=="products"){echo "active";}?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Add Products</p>
              </a>
            </li>
            <li  class="nav-header"><hr class="dropdown-divider"></li>
            <li class="nav-header">My Profile</li>
            <li class="nav-item">
              <a href="ProfileEdit.php" class="nav-link <?php if($_session['menu']=="profile"){echo "active";}?>">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                  Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="DriverResults.html" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Result</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out"></i>
                <p>
                  Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>