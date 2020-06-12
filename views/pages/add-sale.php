<?php
require_once __DIR__."/../../helper/init.php";
$page_title ="Quick ERP | ADD NEW SALES";
    $sidebarSection = 'transaction';
    $sidebarSubSection = 'sales';
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
  <style>
    .email_verify{
        background: green;
        color: #FFF;
        padding: 5px 10px;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: .2rem;
        vertical-align: middle;
        display: none !important;    
    }
  </style>

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
                <h1 class="h3 mb-0 text-gray-800">Sales</h1>
            </div>
        
            <!-- /.container-fluid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow mb-4">
                            <!-- <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fa fa-plus"></i>Add Category
                                </h6>
                            </div> -->
                            <div class="card-header py-3 d-flex flex-row justify-content-end">
                                <div class="mr-3">
                                    <input type="text" class="form-control" name="email" id="customer_email" placeholder="Enter email of customer">
                                </div>

                                <div>
                                    <p class = "email_verify" id = "email_verify_success">
                                        <i class="fas fa-check fa-sm text-white mr-1"></i> Email Verified
                                    </p>

                                    <p class="email_verify bg-danger d-inline-block mb-0" id = "email_verify_fail" >
                                    <i class="fas fa-times fa-sm text-white mr-1"></i> Email Not Verified
                                    </p>
                                    <a href="<?=BASEPAGES;?>add-customer.php" class = "btn btn-sm btn-warning shadow-sm d-inline-block " id= "add_customer_button"  style = "display:none !important" >
                                        <!-- -->
                                    <i class="fas fa-users fa-sm text-white"></i> Add Customer
                                    </a>
                                    <button type="button" class="d-sm-inline-block btn btn-sl btn-primary shadow-sm" name="check_email" id ="check_email">
                                        <i class="fas fa-envelope fa-sm text-white"></i> Check Email                                
                                    </button>
                                </div>
                            </div>

                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                                <i class="fa fa-plus"></i>Sales</h6>
                                <button type="button" onclick="addProduct();" class = "d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white"></i> Add One More Product                                
                                </button>
                            </div>
                            <!-- END OF CARD HEADER -->

                            <!--CARD BODY-->
                            <form action="<?= BASEURL?>helper/routing.php" method="POST">
                                <input type="hidden"
                                name="csrf_token"
                                value="<?= Session::getSession('csrf_token');?>">
                                <input type="text" name="customer_id" id="customer_id">    
                            
                                <div class="card-body">
                                    <div id="product_container">
                                        <!-- BEGIN: PRODUCT CUSTOM CONTROL  -->  
                                            <div class="row product_row" id = "element_1">
                                                <!-- BEGIN: CATEGORY SELECT  -->
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Category</label>
                                                            <select class="form-control category_select" id="category_1">
                                                                <option disabled selected>Select Category</option>
                                                                <?php
                                                                $categories = $di->get('database')->readData("category",['id','name'], "deleted=0");
                                                                foreach($categories as $category){
                                                                    echo "<option value = '{$category->id}'>{$category->name}</option>";
                                                                }    
                                                                ?>
                                                            </select>
                                                        </div>              
                                                    </div>
                                                <!-- END: CATEGORY SELECT  -->  
                                                
                                                <!-- BEGIN: PRODUCT SELECT  -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Products</label>
                                                            <select class="form-control product_select" name= "product_id[]" id="product_1">
                                                                <option disabled selected>Select Product</option>
                                                            </select>
                                                        </div>              
                                                    </div>                    
                                                <!-- END: PRODUCT SELECT  --> 
                                
                                                <!-- BEGIN: SELLING PRICE  -->
                                                    <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Selling Price</label>
                                                                <input type="text" class="form-control" name= "selling_price[]" id="selling_price_1" disabled>
                                                            </div>              
                                                    </div>                    
                                                <!-- END: SELLING PRICE  -->

                                                <!-- BEGIN: QUANTITY  -->
                                                    <div class="col-md-1">
                                                            <div class="form-group">
                                                                <label for="">Quantity</label>
                                                                <input type="text"  class="form-control quantity_input" value= "0" name= "quantity[]" id="quantity_1" value="0">
                                                            </div>              
                                                    </div>                    
                                                <!-- END: QUANTITY  -->
                                                
                                                <!-- BEGIN: DISCOUNT  -->
                                                    <div class="col-md-1">
                                                            <div class="form-group">
                                                                <label for="">Discount</label>
                                                                <input type="text"  class="form-control discount_input" value= "0" name= "discount[]" id="discount_1" value="0">
                                                            </div>              
                                                    </div>                    
                                                <!-- END: DISCOUNT  -->
                                                
                                                <!-- BEGIN: FINAL RATE  -->
                                                <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Final Rate</label>
                                                                <input type="text"  class="form-control final_price_input" name= "final_rate[]" id="final_rate_1" disabled>
                                                            </div>              
                                                    </div>                    
                                                <!-- END: FINAL RATE  -->

                                                <!-- BEGIN: DELETE BUTTON -->
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button onclick="deleteProduct(1)" type="button" class="btn btn-danger" style="margin-top: 40%">
                                                                    <i class="fas fa-trash-alt"></i>
                                                            </button>             
                                                        </div>
                                                    </div>                    
                                                <!-- END: DELETE BUTTON -->
                                                
                                            </div>
          
                                    </div>
                                    
                                </div>
                                <!--END OF CARD BODY-->
                                <!--BEGIN CARD FOOTER-->
                                <div class="card-footer d-flex justify-content-between">
                                    <div>
                                        <input type="submit" class="btn btn-primary" name="add_category" value="submit">
                                    </div>
                                    
                                        <label for="final_total" class="col-sm-2 col-form-label">Final Total</label> 
                                        <input type="text"  class="form-control col-sm-2" name= "final_total" id="final_total" disabled>                                    
                                                                        
                                </div>
                                <!--END OF CARD FOOTER-->                                        

                            </form>
                            <!--END OF CARD -->
                        </div>
                    </div>
                </div>
            </div>
    <!-- End of Content Wrapper -->  
        </div>
  <!-- End of Page Wrapper -->
  <!-- Footer -->
  <?php require_once __DIR__."/../includes/footer.php"; ?>
      <!-- End of Footer -->
  <!-- Scroll to Top Button-->
  
  <?php require_once __DIR__."/../includes/scroll-to-top.php"; ?>
  <?php require_once __DIR__."/../includes/core-scripts.php"; ?>

  <?php require_once __DIR__."/../includes/page-level/index-scripts.php"; ?>
  <script src="<?= BASEASSETS;?>js/pages/transaction/add-sales.js"></script>
  <script src="<?= BASEASSETS;?>js/plugins/jquery-validation/jquery.validation.min.js"></script>

</body>

</html>
