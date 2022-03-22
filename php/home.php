<?php
	require "../php/config/constant.php";

	$servername = HOST;
	$username = USER;
	$password = PASSWORD;
	$db = DATABASE_NAME;
	
	// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online Bakery System | Bakeaway.com </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="C:\Users\DELL\Desktop\Summerproject\css\phone.css" rel="stylesheet" media="screen and 
    (max-width:1180 )" type="text/css">
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../bakeryimg/bakershub.png" alt="Bakeaway.com">
        </div>
        <div class="nav-items">
            <div class="item"><a href="#home"> Home </a></div>
             <!-- <div class="item"><a href="#services-container"> Our Products </a></div> -->
            <div class="menu-item item">
                <div class="menu">Menu</div>
                <div class="dropdown-items">
                    <div class="dropdown-item"><a href="../php/menu.php">Our Products</a></div>
                    <div class="dropdown-item"><a href="#services">Seasonal Products</a></div>
                </div>
            </div>
             
            <div class="item"><a href="#client-section"> About Us</a></div>
            <div class="item"><a href="C:\xampprealfile\htdocs\Summerproject\html\contactus.html"> Contact Us </a></div>
             <button class="login-btn"><a href="../php/login.php"> Login </a> </button>
        </div>
    </nav>
    <!-- homepage ko lagi -->
    <section class="home">
        <h1 class="h-primary"> Welcome To Baker's Hub | Let the taste take away</h1>
        <!-- <button class="btn"> Order Now </button> -->
    </section>
    <!-- Menu ko lagi -->
    <section id="services-container">
        <h1 class="h-primary-center">Seasonal Products</h1>
        <div id="services">
        <?php
                            $query = "SELECT * FROM products";
                            $res=mysqli_query($con, $query);
                            //if(mysqli_num_rows($res) > 0){
                                while($row = $res->fetch_assoc()){
                                    ?>
                                    <div class="box">
                <!-- iimage ko same size bhako bhaye huncha -->
                <img src="../bakeryimg/lemonrosemarydonuts.jpg" alt="Rosemary Donuts">
                <h2 class="h-secondary"><?=$row["product_title"]?></h2>
                <p class="center"><?=$row["product_desc"]?></p>
            </div>
                                    <?php        
                                }
                            //}
            ?>

            
           
        </div>
    </section>
    <section id="client-section">
        <h1 class="h-primary-center"> About Us</h1>
        <div id="client">
            <!-- <div class="client-item">
                <img src="C:\Users\DELL\Desktop\Summerproject\bakeryimg\aboutusbg.jpg" alt="Our Clients">
            </div> -->
            <div class="client-item">
                <h3>Welcome To Baker's Hub</h3>
                <p> Baker's Hub is a top notch cake and cake shop in Lalitpur. Mrs. Sushma Maskey 
                    are the specialist and has fabricated the brand on two fundamental standards – quality 
                    and the client. Bakeaway intends to serve the most innovative and mouth-watering cakes,
                    to help make your festival considerably increasingly unique!

                    Baker's Hub represents considerable authority in redid wedding cakes, commemoration cakes,
                    commitment cakes, kids birthday cakes, planner cakes, child shower cakes, subject cakes,
                    photograph cakes and cupcakes, festivity cakes, single girl party cakes, cakes for
                    gifting and then some. Pick a structure you like, and after that browse tasty flavors,
                    for example, the Belgian Chocolate, Red Velvet, Hazelnut, Salted Caramel and that’s
                    just the beginning. You would then be able to take a load off, and anticipate that
                    an awesome cake should touch base at your ideal area, on your picked date and time.</p>
            </div>
        </div>
    </section>
    <section id="contact">
        <h1 class="h-primary-center"><a href="C:\xampprealfile\htdocs\Summerproject\html\contactus.html">Contact Us</a></h1>
        <div id="contact-box">
            <!-- BACKEND KO KAAM -->
            <form action="">
                <div class="form-group">
                    <label for="name"> Name </label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="name"> Email </label>
                    <input type="text" name="name" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="name"> Phone Number </label>
                    <input type="text" name="name" id="phone" placeholder="+977">
                </div>
                <div class="form-group">
                    <label for="name"> Message </label>
                    <textarea name="message" id="msg" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" value="Send" class="btn" />
                <div class="form-group">
                    <label for="name"> Visit Us at:Baliphal,Lalitpur </label><br/>
                    <label for="name"> 01-5533459  </label>
                </div>
            </form>
            <!-- <h3>Baliphal, Lalitpur</h3>
            <h3> 01-5533459/+977-9818845690</h3> -->
        </div>
    </section>
    <footer>
        <div class="center">
            Copyright &copy;www.onlineBakeaway.com. All rights reserved!
        </div>
    </footer>
    <!-- <script src="dropdownavindex.js"></script> -->

</body>

</html>