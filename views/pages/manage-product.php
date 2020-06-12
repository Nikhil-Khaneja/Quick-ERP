<?php
    require_once __DIR__."/../../helper/init.php";
    $page_title ="Quick ERP | MANAGE PRODUCT";
    $sidebarSection = 'product';
    $sidebarSubSection = 'manage';
    Util::createCSRFToken();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    require_once __DIR__."/../includes/head-section.php";
  ?>
  <link rel="stylesheet" href="<?= BASEASSETS;?>css/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= BASEASSETS;?>vendor/datatables/datatables.min.js">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once __DIR__."/../includes/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
        <?php require_once __DIR__."/../includes/navbar.php"; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
              <h1 class="h3 mb-0 text-gray-800">Manage Product</h1>
              <div class="class shadow mb-6">
                <div class="card-header py-3">
                  <h6 class="m-8 font-weight-bold text-primary">Products</h6>
                </div>
                <div class="card-body">
                  <div id= "export-buttons"></div>
                  <table class="table table-bordered table-responsive" id="manage-product-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Specification</th>
                        <th>Quantity</th>
                        <th>Selling Rate</th>
                        <th>WEF</th>
                        <th>Category</th>
                        <th>EOQ</th>
                        <th>Danger level</th>
                        <th>Supplier Names</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
        </div>
        <!-- /.container-fluid -->
      </div>

      <!-- End of Main Content -->
      <!-- EDIT MODAL  -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=BASEURL;?>helper/routing.php" method="POST" >
              <div class="modal-body">
                <input type="text" name="csrf_token" id='csrf_token' value="<?=Session::getSession('csrf_token');?>">
                <input type="text" name="product_id" id="edit_product_id">
                <div class="form-group row">
                  <div class="col-sm-5">
                    <label for="">Product Name</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="text" name="product_name" id="edit_product_name" class="form-control">
                  </div>
                </div>
              </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name  = "editProduct">Save changes</button>
            </div>

            </form>
          </div>
        </div>
      <!-- END OF EDIT MODAL -->
      <!-- Footer -->
      <?php require_once __DIR__."/../includes/footer.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  
  <?php require_once __DIR__."/../includes/scroll-to-top.php"; ?>
  <?php require_once __DIR__."/../includes/core-scripts.php"; ?>
  <?php require_once __DIR__."/../includes/page-level/index-scripts.php"; ?>
  <?php require_once __DIR__."/../includes/page-level/manage-product-script.php"; ?>
  
</body>

</html>
