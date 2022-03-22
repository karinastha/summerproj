<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');

$type=get_safe_value($_POST['type']);
$added_on=date('Y-m-d h:i:s');
if($type=='register'){
	$name=get_safe_value($_POST['name']);
	$email=get_safe_value($_POST['email']);
	$mobile=get_safe_value($_POST['mobile']);
	$password=get_safe_value($_POST['password']);
	
	$check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email'"));
	if($check>0){
		$arr=array('status'=>'error','msg'=>'Email id already registered','field'=>'email_error');
	}else{
		$new_password=password_hash($password,PASSWORD_BCRYPT);
		$rand_str=rand_str();
		$referral_code=rand_str();
		if(isset($_SESSION['FROM_REFERRAL_CODE']) && $_SESSION['FROM_REFERRAL_CODE']!=''){
			$from_referral_code=$_SESSION['FROM_REFERRAL_CODE'];
		}else{
			$from_referral_code='';
		}
		mysqli_query($con,"insert into user(name,email,mobile,password,status,email_verify,added_on,rand_str,referral_code,from_referral_code) values('$name','$email','$mobile','$new_password','1','0','$added_on','$rand_str','$referral_code','$from_referral_code')");
		$id=mysqli_insert_id($con);
		unset($_SESSION['FROM_REFERRAL_CODE']);
		
		$getSetting=getSetting();
		$wallet_amt=$getSetting['wallet_amt'];
		if($wallet_amt>0){
				manageWallet($id,$wallet_amt,'in','Register');
		}
		$html=FRONT_SITE_PATH."verify/".$rand_str;
		send_email($email,$html,'Verify your email id');
		
		
		$arr=array('status'=>'success','msg'=>'Thank you for register. Please check your email id, to verify your account','field'=>'form_msg');
	}
	echo json_encode($arr);
}

if($type=='login'){
	$email=get_safe_value($_POST['user_email']);
	$password=get_safe_value($_POST['user_password']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		$email_verify=$row['email_verify'];
		$dbpassword=$row['password'];
		if($email_verify==1){
			if($status==1){
				if(password_verify($password,$dbpassword)){
					$_SESSION['FOOD_USER_ID']=$row['id'];
					$_SESSION['FOOD_USER_NAME']=$row['name'];
					$_SESSION['FOOD_USER_EMAIL']=$row['email'];
					$arr=array('status'=>'success','msg'=>'');
					
					if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
						foreach($_SESSION['cart'] as $key=>$val){
							manageUserCart($_SESSION['FOOD_USER_ID'],$val['qty'],$key);
						}
					}
					
				}else{
					$arr=array('status'=>'error','msg'=>'Please enter correct password');
				}
			}else{
				$arr=array('status'=>'error','msg'=>'Your account has been deactivated.');
			}
		}else{
			$arr=array('status'=>'error','msg'=>'Please varify your email id');
		}
	}else{
		$arr=array('status'=>'error','msg'=>'Please enter valid email id');	
	}
	echo json_encode($arr);
}

if($type=='forgot'){
	$email=get_safe_value($_POST['user_email']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		$email_verify=$row['email_verify'];
		$id=$row['id'];
		if($email_verify==1){
			if($status==1){
				$rand_password=rand(11111,99999);
				$new_password=password_hash($rand_password,PASSWORD_BCRYPT);
				mysqli_query($con,"update user set password='$new_password' where id='$id'");
				$html=$rand_password;
				send_email($email,$html,'New Password');
				$arr=array('status'=>'success','msg'=>'Password has been reset and send it to your email id');
				
			}else{
				$arr=array('status'=>'error','msg'=>'Your account has been deactivated.');
			}
		}else{
			$arr=array('status'=>'error','msg'=>'Please varify your email id');
		}
	}else{
		$arr=array('status'=>'error','msg'=>'Please enter valid email id');	
	}
	echo json_encode($arr);
}
?>
<!DOCTYPE html>
<html lang="en">
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
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password"/>
          </div>
          <input type="submit" class="btn solid" value="SIGN IN"  name="submit"/>
        </form>
        <div class="login-msg">
          <?php echo $msg; ?>
        </div>
        <!-- Sign up -->
        <form action="#" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="contact" placeholder="Contact Number" name="contact" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" class="btn" value="Sign up" />
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
        <!-- <img src="img/log.svg" class="image" alt="" /> -->
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Welcome To Bakeaway!
          </p>
          <button class="btn transparent" id="sign-in-btn" value="SIGN IN" name="submit">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
      
    </div>
  </div>

 <script src='../app.js'></script>
 </body>
</html>