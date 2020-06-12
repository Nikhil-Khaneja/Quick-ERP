
<?php
require_once __DIR__."/../../helper/init.php";
$page_title ="Quick ERP | ADD CUSTOMER";
    $sidebarSection = 'customer';
    $sidebarSubSection = 'add';
    Util::createCSRFToken();
  $errors="";
  $old="";
  if(Session::hasSession('old'))
  {
    $old = Session::getSession('old');
    Session::unsetSession('old');
  }
  if(Session::hasSession('errors'))
  {
    $errors = unserialize(Session::getSession('errors'));
    Session::unsetSession('errors');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    require_once __DIR__."/../includes/head-section.php";
  ?>
  

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

        <!-- Begin Page Content-->
        
        <!-- Page Heading -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Customer</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-list-ul fa-sm text-white"></i>Manage Customer</a>
            </div>
        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card show mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fa fa-plus"></i>Add Customer
                            </h6>
                        </div>
                        <!--END OF CARD HEADER-->

                        <!--CARD BODY-->
                        <div class="card-body">
                          <form action="<?= BASEURL?>helper/routing.php" method="POST">
                            <input type="hidden"
                              name="csrf_token"
                              value="<?= Session::getSession('csrf_token');?>">
                            <div class="row">
                              <!-bhai yaha-  -->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('first_name') ? 'error is-invalid' : '') : '';?>"
                                    name="first_name"
                                    id="first_name"  
                                    placeholder="Enter First Name"
                                    value="<?= $old != '' ?$old['name']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('first_name')):
                                  echo "<span class='error'> {$errors->first('first_name')}</span>";
                                endif;
                                ?>
                             </div>
                            
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('last_name') ? 'error is-invalid' : '') : '';?>"
                                    name="last_name"
                                    id="last_name"  
                                    placeholder="Enter Last Name"
                                    value="<?= $old != '' ?$old['name']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('last_name')):
                                  echo "<span class='error'> {$errors->first('last_name')}</span>";
                                endif;
                                ?>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="gst_no">GST No</label>
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('gst_no') ? 'error is-invalid' : '') : '';?>"
                                    name="gst_no"
                                    id="gst_no"  
                                    placeholder="Enter gst no "
                                    value="<?= $old != '' ?$old['gst_no']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('gst_no')):
                                  echo "<span class='error'> {$errors->first('gst_no')}</span>";
                                endif;
                                ?>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="phone_no">Phone No</label>
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('phone_no') ? 'error is-invalid' : '') : '';?>"
                                    name="phone_no"
                                    id="phone_no"  
                                    placeholder="Enter phone no "
                                    value="<?= $old != '' ?$old['phone_no']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('phone_no')):
                                  echo "<span class='error'> {$errors->first('phone_no')}</span>";
                                endif;
                                ?>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('email') ? 'error is-invalid' : '') : '';?>"
                                    name="email_id"
                                    id="email_id"  
                                    placeholder="Enter gst no "
                                    value="<?= $old != '' ?$old['email']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('email')):
                                  echo "<span class='error'> {$errors->first('email')}</span>";
                                endif;
                                ?>
                              </div>
                  
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="gender">GENDER</label>
                                  <!-- <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label><br>
                                <input type="radio" id="other" name="gender" value="other">
                                <label for="other">Other</label>   -->
                                  <input type="text" 
                                    class="form-control <?= $errors!= '' ? ($errors->has('gender') ? 'error is-invalid' : '') : '';?>"
                                    name="gender"
                                    id="gender"  
                                    placeholder="Enter gender "
                                    value="<?= $old != '' ?$old['gender']: '';?>"
                                  >
                                </div>
                                <?php
                                if($errors!="" && $errors->has('gender')):
                                  echo "<span class='error'> {$errors->first('gender')}</span>";
                                endif;
                                ?>
                              </div>
                              
                            </div>
                            

                            <input type="submit" class="btn btn-primary" name="add_customer" value="submit">
                          </form>
                        </div>
                        <!--END OF CARD BODY-->
                    </div>
                </div>
            </div>
        </div>
      <!-- End of Main Content -->
</div>
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
  <script src="<?= BASEASSETS;?>js/pages/customer/add-customer.js"></script>
  <script src="<?= BASEASSETS;?>js/plugins/jquery-validation/jquery.validation.min.js"></script>

</body>

</html>
