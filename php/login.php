<?php
session_start();
include('../php/database.inc.php');
include('../php/function.inc.php');
if(isset($_SESSION['IS_LOGIN'])){
  redirect('dashboard.php');
}
$msg="";
if(isset($_POST['submit'])){
	$username=get_safe_value($_POST['username']);
	$password=get_safe_value($_POST['password']);
	$sql="select * from admin where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res); 
		$_SESSION['IS_LOGIN'] = true;
    $_SESSION['LOGGED_IN_USER'] = $row["name"];
		redirect('dashboard.php');
	}else{
		$msg="Please enter valid login details";
	}
}
?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous" ></script>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
  <!-- <link href="../css/login.css" rel="stylesheet" type="text/css"> -->
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id="exampleInputEmail" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="exampleInputPassword1" name="password" />
            </div>
            <input type="submit" value="Sign In" class="btn solid" name="submit"/>
          </form>
          <div class="login-msg"> 
              <?php echo $msg; ?> 
          </div>

            <!-- SIGN IN KO HO -->
          <form action="#" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id="exampleInputEmail" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="contact" placeholder="Contact Number" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="exampleInputPassword1" name="password"/>
            </div>
            <input type="submit" class="btn" value="Sign up" name="submit"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Welcome To Bakeaway!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Welcome To Bakeaway!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../app.js"></script>
  </body>
</html>