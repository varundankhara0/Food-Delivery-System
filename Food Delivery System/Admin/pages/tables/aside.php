

<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index.php" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Luminor Delivery</a>
          </div>

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admin info</p>
                  </a>
                </li>
              </ul>
            </li>
           
            
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tables
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="tbl_restaurant.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Restaurant</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_users.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/tbl_payment.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../tables/tbl_fooditem.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Food Item</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_delivery_man.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delivery Man</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_deliver.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delivery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_users_add.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Customer Address</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_coupon.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Coupon</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="tbl_Complaint.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Complaint</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_category.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tbl_area.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Area</p>
                  </a>
                </li>
              </ul>
              <li>
                <button type="button" class="btn btn-block bg-gradient-info btn-lg" onclick="relocate()">logout</button>
              </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <script>
  function relocate()
  {
    window.location="../../../pages/Landing/logout.php";
  }
</script>


</body>
</html>
