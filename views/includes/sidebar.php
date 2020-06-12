<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">QUICK ERP</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= $sidebarSection =='dashboard' ? 'active' : '';?>">
        <a class="nav-link" href="<?= BASEPAGES;?>index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modules
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= $sidebarSection=='category' ? 'active' : '';?>">
        <a class="nav-link <?= $sidebarSection=='category' ? '' : 'collapsed';?>" href="#" 
        data-toggle="collapse" 
        data-target="#collapseCategory" 
        aria-expanded="true" 
        aria-controls="collapseCategory">
          <i class="fas fa-fw fa-cog"></i>
          <span>Category</span>
        </a>
        <div id="collapseCategory" 
        class="collapse <?= $sidebarSection=='category' ? 'show' : '';?>" 
        aria-labelledby="headingTwo" 
        data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= $sidebarSubSection=='add' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>add-category.php">Add Category</a>
            <a class="collapse-item <?= $sidebarSubSection=='manage' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>manage-category.php">Manage Category</a>
          </div>
        </div>
      </li>

 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item <?= $sidebarSection=='product' ? 'active' : '';?>">
        <a class="nav-link <?= $sidebarSection=='product' ? '' : 'collapsed';?>" href="#" 
        data-toggle="collapse" 
        data-target="#collapseProduct" 
        aria-expanded="true" 
        aria-controls="collapseProduct">
          <i class="fas fa-fw fa-cog"></i>
          <span>Product</span>
        </a>
        <div id="collapseProduct" 
        class="collapse <?= $sidebarSection=='product' ? 'show' : '';?>" 
        aria-labelledby="headingTwo" 
        data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= $sidebarSubSection=='add' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>add-product.php">Add Product</a>
            <a class="collapse-item <?= $sidebarSubSection=='manage' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>manage-product.php">Manage Product</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Customers Collapse Menu -->
      <li class="nav-item <?= $sidebarSection=='customer' ? 'active' : '';?>">
        <a class="nav-link <?= $sidebarSection=='customer' ? '' : 'collapsed';?>" href="#" 
        data-toggle="collapse" 
        data-target="#collapseCustomer" 
        aria-expanded="true" 
        aria-controls="collapseCustomer">
          <i class="fas fa-fw fa-cog"></i>
          <span>Customers</span>
        </a>
        <div id="collapseCustomer" 
        class="collapse <?= $sidebarSection=='customer' ? 'show' : '';?>" 
        aria-labelledby="headingTwo" 
        data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= $sidebarSubSection=='add' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>add-customer.php">Add Customer</a>
            <a class="collapse-item <?= $sidebarSubSection=='manage' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>manage-customer.php">Manage Customer</a>
          </div>
        </div>
      </li>

       <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item <?= $sidebarSection=='transaction' ? 'active' : '';?>">
        <a class="nav-link <?= $sidebarSection=='transaction' ? '' : 'collapsed';?>" href="#" 
        data-toggle="collapse" 
        data-target="#collapseTransaction" 
        aria-expanded="true" 
        aria-controls="collapseTransaction">
          <i class="fas fa-fw fa-cog"></i>
          <span>Transaction</span>
        </a>
        <div id="collapseTransaction" 
        class="collapse <?= $sidebarSection=='transaction' ? 'show' : '';?>" 
        aria-labelledby="headingTwo" 
        data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= $sidebarSubSection=='purchase' && $sidebarSection == 'transaction'? 'active' : '';?>" 
                href="<?= BASEPAGES;?>add-purchase.php">Purchase</a>
            <a class="collapse-item <?= $sidebarSubSection=='sales' ? 'active' : '';?>" 
                href="<?= BASEPAGES;?>add-sale.php">Sale</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.php">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->