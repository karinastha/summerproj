<?php
session_start();
include('database.inc.php');
include('function.inc.php');

if(!isset($_SESSION['IS_LOGIN'])){
	redirect('login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Ordering Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../admincss/materialdesignicons.min.css">
  <link rel="stylesheet" href="../admincss/vendor.bundle.base.css">
  <link rel="stylesheet" href="../admincss/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admincss/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link href="../admincss/style.css" rel="stylesheet" type="text/css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="../bakeryimg/bakershub.png" alt="logo"/></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo.png" alt="logo"/></a> -->
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?=$_SESSION["LOGGED_IN_USER"]?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
		  <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="products.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Products</h4>
              <h4 class="card-title"><a href="add_new_product.php">Add New Product</a></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Product Id #</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $query = "SELECT * FROM products";
                            $res=mysqli_query($con, $query);
                            //if(mysqli_num_rows($res) > 0){
                                while($row = $res->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?=$row["product_id"]?></td>
                                        <td><?=$row["product_title"]?></td>
                                        <td><?=$row["product_desc"]?></td>
                                        <td></td>
                                        <td><?=$row["product_price"]?></td>
                                        <td><?=$row["product_qty"]?></td>
                                        <td></td>
                                    </tr>
                                    <?php        
                                }
                            //}
                          ?>
                        </tbody>
                  </div>
				</div>
              </div>
            </div>
          </div>
        
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/js/vendor.bundle.base.js"></script>
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/data-table.js"></script>
  <!-- End custom js for this page-->
  <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 www.onlineBakeaway.com. All rights reserved.</span>
          </div>
  </footer> -->
</body>
</html>