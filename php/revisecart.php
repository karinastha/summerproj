<?php
session_start();
include('database.inc.php');
include('function.inc.php');
// if(!isset($_SESSION['IS_LOGIN'])){
// 	redirect('revisecart.php');
// }

$error_msg = "";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $product_id = $_POST["productId"];
    $user_id = $_POST["userId"];
    $qty = $_POST["txtQty"];
    $product_name= $_POST["txtProductName"];
    $product_price= $_POST["txtProductPrice"];
    if($product_id === ""){
        $error_msg = "Product Id should not be empty.";
    }else if($user_id === ""){
        $error_msg = "User Id should not be empty.";
    }else if($qty === ""){
        $error_msg = "Quantity should not be empty.";
    }else{
        $query = "INSERT INTO cart (product_id,user_id,product_qty,product_name,product_price) VALUES(?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssii", $pid, $uid, $pqty);
        $pid = $product_id;
        $uid= $user_id;
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
    <title>Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
  
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<script src="../js/jquery2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
    <!-- <link href="../css/menu.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="cartstyle.css"/>
    
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../bakeryimg/bakershub.png" alt="Bakeaway.com">
        </div>
        <div class="nav-items">
            <div class="item"><a href="../php/home.php"> Home </a></div>
            <div class="menu-item item">
                <div class="menu">Menu</div>
                <div class="dropdown-items">
                    <div class="dropdown-item"><a href="../php/menu.php">Our Products</a></div>
                    <div class="dropdown-item"><a href="#services">Seasonal Products</a></div>
                </div>
            </div>
             
            <button class="login-btn"><a href="../php/cart.php"> Cart </a>
            </button>
        </div>
    </nav>

    <?php
            if($error_msg != ""){
             ?>
                <p class="error_msg"> <?=$error_msg?>  </p>
         <?php
        }
        ?>
        <div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> -->
						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>

   
   
  </div>
</body>
</html>

