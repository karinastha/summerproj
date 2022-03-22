<?php
session_start();
include('database.inc.php');
include('function.inc.php');
if(!isset($_SESSION['IS_LOGIN'])){
	redirect('login.php');
}

$error_msg = "";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST["txtName"];
    $desc = $_POST["txtDescription"];
    $price = $_POST["txtPrice"];
    $qty = $_POST["txtQty"];
    if($name === ""){
        $error_msg = "Name should not be empty.";
    }else if($desc === ""){
        $error_msg = "Description should not be empty.";
    }else if($price === ""){
        $error_msg = "Price should not be empty.";
    }else if($qty === ""){
        $error_msg = "Quantity should not be empty.";
    }else{
        $query = "INSERT INTO products (product_title,product_desc,product_price,product_qty) VALUES(?,?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssii", $ptitle, $pdesc, $pprice, $pqty);
        $ptitle = $name;
        $pdesc = $desc;
        $pprice = $price;
        $pqty = $qty;
        $stmt->execute();
        $stmt->close();
        $con->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Add new product</title>
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
        
         <?php
            if($error_msg != ""){
             ?>
                <p class=" "> <?=$error_msg?>  </p>
         <?php
        }
        ?>
        
   
    <div id="content">
    <form method="post" action="add_new_product.php" enctype="multipart/form-data">
      
    <table class="table">
        <tr>
            <td>Name:</td>
            <td class="txt-box"><input type="text" id="txtName" name="txtName" /></td>
</tr>  


<tr>
            <td>Description:</td>
            <td class="txt-box"> 
                <textarea id="txtDescription" cols="50" rows="8" name="txtDescription">
                </textarea> 
            </td>
</tr>  

<tr>
            <td>Image:</td>
          
           <td class="txt-box">
           <input type="hidden" name="size" value="100000000">
            <input type="file" name="image">
            <?php if(isset($_POST['upload'])){
              $target = "bakeryimg/". basename($_FILES['image']['name']);
              $image= $_FILES['image']['name'];
              // $text=$_POST['text'];
              $sql="INSERT INTO product_images (image) VALUES ('$image')";
              // $res=mysqli_query($db, $sql);
              if (move_uploaded_file($_FILES['product_images']['tmp_name'], $target)){
                $msg="Image upload sucessfully";
              }else{
                $msg="There was a problem uploading an image";
              }
            }?>
            </td>
           <td class="txt-box"> 
            <input type="submit" name="upload" value="Upload Image" id="txtImg" cols="50" rows="8">
           </td>
</tr>  
<tr>
            <td>Price:</td>
            <td class="txt-box"><input type="text" id="txtPrice" name="txtPrice" /></td>
</tr>  


<tr>
            <td>Quantity:</td>
            <td class="txt-box"><input type="text" id="txtQty" name="txtQty" /></td>
</tr>  

<tr>
    <td colspan="2"><input type="submit" value="Add">
     <a href="products.php">Cancel</a> </td>
</tr>

    </table>
  </form>
  </div>
</body>
</html>
