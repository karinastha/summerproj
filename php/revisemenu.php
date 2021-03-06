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
    <title>Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="../css/revisemenu.css" rel="stylesheet" type="text/css">
    
</head>

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../bakeryimg/bakershub.png" alt="Bakeaway.com">
        </div>
        <div class="nav-items">
            <div class="item"><a href="../php/home.php"> Home </a></div>

            <div class="item"><a href="#client-section"> About Us</a></div>
            <div class="item"><a href="C:\xampprealfile\htdocs\Summerproject\html\contactus.html"> Contact Us </a></div>
            <button class="login-btn"><a href="cart.php"> Cart </a>
            </button>
            <!-- <div class="dropdown-items">
                <div id="cart_product">
                    <div class="row">
                        <div class="col-md-3">Sl.No</div>
                        <div class="col-md-3">Product Image</div>
                        <div class="col-md-3">Product Name</div>
                        <div class="col-md-3">Price in $.</div>
                    </div>
                    </div>
            </div> -->
        </div>
    </nav>
    <section id="services-container">
        <h1 class="h-primary-center">Our Donuts</h1>
        <div id="services">
            
               
                  <?php
                        $query = "SELECT * FROM products";
                        $res=mysqli_query($con, $query);
                        //if(mysqli_num_rows($res) > 0){
                        while($row = $res->fetch_assoc()){
                            ?>
                                <div class="box">
             <img src="../bakeryimg/lemonrosemarydonuts.jpg" alt="Rosemary Donuts"> 
             <!-- <img src="../bakeryimg/cake4.jpg" alt="Rosemary Donuts"> -->
                <h2 class="h-secondary"><?=$row["product_title"]?></h2>
                <p class="center"><?=$row["product_desc"]?></p>
               <h2> <?=$row["product_price"]?> </h2>
               
                <!-- <h2>Rs.110</h2> -->
                    <select class="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                <button class="cart-btn"><a href="../php/cart.php"> Add To Cart </a>
                    <!-- <img id="img-cart" src="C:\xampprealfile\htdocs\Summerproject\bakeryimg\addtocart.png" alt="Cart"></a> -->
                    </button>
                        </div>
                        
                        <?php        
                                }
                            //}
                        ?>
                    
              

          
            <!-- <div class="box">
                
                <img src="../bakeryimg/chocolate gazed chocolate banana donuts.jpg"
                    alt="Chocolate Gazed Donuts">
                <h2 class="h-secondary">Chocolate Gazed Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.110</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div> -->
        </div>
    </section>
    <section id="services-container">
        <h1 class="h-primary-center">Cakes</h1>
        <div id="services">
            <div class="box">
               
                <img src="../bakeryimg/cake4.jpg" alt="Rosemary Donuts">
                <h2 class="h-secondary">Rosemary Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit. .</p>
                    <h2>Rs.2500</h2>
                    <select class="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
                <img src="../bakeryimg/cake2.jpg" alt="Red Velvet Donuts">
                <h2 class="h-secondary">Red Velvet Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.1800</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
           
                <img src="../bakeryimg/cake3.jpg" alt="Chocolate Gazed Donuts">
                <h2 class="h-secondary">Chocolate Gazed Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.950</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
        </div>
    </section>
    <section id="services-container">
        <h1 class="h-primary-center">Muffins</h1>
        <div id="services">
            <div class="box">
               
                <img src="../bakeryimg/muffin1.jpg" alt="Rosemary Donuts">
                <h2 class="h-secondary">Rosemary Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit. .</p>
                    <h2>Rs. 50</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
               
                <img src="../bakeryimg/muffin2.jpg" alt="Red Velvet Donuts">
                <h2 class="h-secondary">Mocha Cupcakes</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.60</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
               
                <img src="../bakeryimg/muffin3.jpg" alt="Red Velvet Cupcakes">
                <h2 class="h-secondary">Chocolate Gazed Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.95</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
        </div>
    </section>
    <section id="services-container">
        <h1 class="h-primary-center">Pastry</h1>
        <div id="services">
            <div class="box">
                
                <img src="../bakeryimg/lemonrosemarydonuts.jpg" alt="Rosemary Donuts">
                <h2 class="h-secondary">Rosemary Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit. .</p>
                    <h2>Rs.120</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
                
                <img src="../bakeryimg/red velvet donuts.jpg" alt="Red Velvet Donuts">
                <h2 class="h-secondary">Red Velvet Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.120</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
                <img src="../bakeryimg/chocolate gazed chocolate banana donuts.jpg"
                    alt="Chocolate Gazed Donuts">
                <h2 class="h-secondary">Chocolate Gazed Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.160</h2>
                    <select class="qty">
                    <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
        </div>
    </section>
    <section id="services-container">
        <h1 class="h-primary-center">Cookies</h1>
        <div id="services">
            <div class="box">
               
                <img src="../bakeryimg/lemonrosemarydonuts.jpg" alt="Rosemary Donuts">
                <h2 class="h-secondary">Rosemary Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit. .</p>
                    <h2>Rs.130</h2>
                    <select class="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="C:\Users\DELL\Desktop\Summerproject\html\login.html"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
               
                <img src="../bakeryimg/red velvet donuts.jpg" alt="Red Velvet Donuts">
                <h2 class="h-secondary">Red Velvet Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.50</h2>
                    <select class="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
            <div class="box">
                <img src="../bakeryimg/chocolate gazed chocolate banana donuts.jpg"
                    alt="Chocolate Gazed Donuts">
                <h2 class="h-secondary">Chocolate Gazed Donuts</h2>
                <p class="center"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus totam, ut provident
                    tempora
                    consequuntur sed adipisci et, iure mollitia ratione iste quae suscipit, tenetur numquam tempore
                    eius impedit dolor reiciendis. Voluptate eius voluptatem velit.</p>
                    <h2>Rs.180</h2>
                    <select class="qty">
                         <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option> 
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                    </select>
                    <button class="cart-btn"><a href="../php/cart.php"> Add To Cart</a>
                    </button>
            </div>
        </div>
    </section>
</body>

</html>