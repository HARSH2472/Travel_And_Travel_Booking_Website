<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/sendmail/phpmailer/src/Exception.php';
require 'C:/xampp/sendmail/phpmailer/src/PHPMailer.php';
require 'C:/xampp/sendmail/phpmailer/src/SMTP.php';
try 
{
	$link = mysqli_connect("localhost","root","","pyb");

	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$email = stripslashes($email);
		$pass = stripslashes($pass);
		$email = mysqli_real_escape_string($link,$email);
		$pass = mysqli_real_escape_string($link,$pass);
		
		$query = "SELECT * FROM signup_detail where email='$email' and pass='$pass' ";
		$result = mysqli_query($link,$query);

		// $sql= "call LOGINUSER('$email','$pass');";
		// $result=mysqli_query($link,$sql);
		
		if(mysqli_num_rows($result)==1)
		{ 	
			$row=mysqli_fetch_assoc($result);
			$login=true;
			session_start();
			$_SESSION['logindone']=true;
			$_SESSION["username"]=$row["fname"];

			$mail = new PHPMailer(true);

		    $mail->isSMTP();
		    $mail->Host = 'smtp.gmail.com'; 
		    $mail->SMTPAuth = true;
		    $mail->Username = 'packyourbags73@gmail.com';
		    $mail->Password = 'zfqnkyysdxxfjpka';
		    $mail->SMTPSecure = 'ssl';
		    $mail->Port = 465;

		    $email=$_POST['email'];
		    $otp=rand(111111,999999);
		    $_SESSION['otp']=$otp;

		    $mail->setFrom('packyourbags73@gmail.com');

		    $mail->addAddress($email);
		    
		    $mail->isHTML(true);

		    $mail->Subject = ("OTP VERIFICATION");

		    $mail->Body = ($otp);

		    $mail->send();

		    header('refresh:0 url=otpvalidation.php');

		    // echo"<script>alert('OTP Send')</script>";
			// echo ("<script>alert('Login Done')</script>");
			// header('refresh:0; url=explore.php');
		}
		else
		{
			echo ("<script>alert('Wrong User ID or PASSWORD')</script>");
		}
	}

	if(isset($_POST['adminlogin']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// $username = stripslashes($username);
		// $password = stripslashes($password);
		// $username = mysqli_real_escape_string($link,$username);
		// $password = mysqli_real_escape_string($link,$password);
		// $query = "SELECT * FROM adminlogin where username='$username' and password='$password' ";
		// $result = mysqli_query($link,$query);

		$sql= "call LOGIN('$username','$password');";
		$result=mysqli_query($link,$sql);			
		if(mysqli_num_rows($result)>0)
		{ 	
			$row=mysqli_fetch_assoc($result);
			$login=true;
			session_start();
			$_SESSION['logindone']=true;
			$_SESSION["username"]=$row["username"];
			echo ("<script>alert('Login Done')</script>");
			header('refresh:0; url=admin.php');
		}
		else
		{
			echo ("<script>alert('Wrong User ID or PASSWORD')</script>");
		}
	}
} 
catch(Exception $e) 
{
echo ("<script>alert('Wrong User ID or PASSWORD')</script>");	
}
 ?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<style>	
			body{
				overflow: hidden;
				width: 100%;
			    height: 100vh;
			    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("image/gate2.jpg");
			    background-position: center;
			    background-size: cover;
			    box-sizing: border-box;
			    background-repeat: no-repeat;
			}	
		</style>

		<script>
		if(window.history.replaceState)
		{
			window.history.replaceState(null,null,window.location.href);
		}
		</script>

	</head>
	<body>
		<!--  <div class="row justify-content-between  ">
		    <div class="col-6 ">
		    	<p style="color: white; font: 25px bold;">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</p>
		    </div>
		    <div class="col-6 ">
		     	<ul class="nav justify-content-end " >
			
				    <button type="button" class="btn btn text-white" style="font-size: 20px;">Home</button>
				    <button type="button" class="btn btn text-white" style="font-size: 20px;"data-toggle="modal" data-target="#completeModel">login</button>
				    <button type="button" class="btn btn text-white"style="font-size: 20px;">About Us</button>
				    <button type="button" class="btn btn text-white"style="font-size: 20px;">Contact</button>

				</ul> 
		    </div>
		 </div> -->

		 <!--  -->

		 <nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		    <ul class="navbar-nav ms-auto">
		      <li class="nav-item ">
		        <a class="nav-link" href="index.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" data-toggle="modal" data-target="#completeModel" style="cursor: pointer;">login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="about.php">About US</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="contactus.php">Contact Us</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" data-toggle="modal" data-target="#completeModeladmin" href="admin.php">Admin login</a>
		      </li>
		    </ul>
		  </div>
		</nav>


		 <!--  -->

		 <div class="text-center " style="margin-top: 20%;">
		 	<p class="text-center text-white font-weight-bold justify-content-md-center" style="font-size: 60px;  font-style: oblique;">PACK YOU'R BAG'S</p>
		 	<!-- <button type="button "   class="btn btn-info ">EXPLORE</button> -->
		 	<a href="explore.php" style=" font-weight: bold; font-size: 25PX; border-radius: 20px; font-style: oblique;" class="btn bg-primary shadow ">EXPLORE</a>
		 	<!-- <input type="button" name="btn" class="shadow bg-primary" style=" font: bold; font-size: 25PX; border-radius: 20px; font-style: oblique; border: none;" value="EXPLORE"> -->
		 </div>



<!-- Login Form -->
<!-- Model -->
<form method="post" enctype="multipart/form-data">
<div class="modal fade" id="completeModel"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
				<div class="modal-body">
		        
			        <div class="form-group">
				        <label for="CompleteEmail">Email address</label>
				        <input type="email" class="form-control" id="CompleteEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email" >    
			        </div>

				    <div class="form-group">
				        <label for="exampleInputPassword1">Password</label>
				        <input type="password" class="form-control" id="Completepass" placeholder="Password" name="pass">
				            
				    </div>

				    <div class="modal-footer justify-content-center">
					
					<input type="submit" name="login" value="Login" class="bg-dark text-white rounded" style="width: 50%; border: none; height: 30px;">
		      		</div>
		      		<div>
		      			<ul >
		      				<p>Don't have an account ?<a href="signup.php" class="text-info">Sign Up</a></p>

		      			</ul>
		      		</div>
	   			</div>
	 		</div>
		</div>	 	
	</div>
</div>
</form>

<!-- admin module -->

<form method="post" enctype="multipart/form-data">
<div class="modal fade" id="completeModeladmin"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
				<div class="modal-body">
		        
			        <div class="form-group">
				        <label for="CompleteEmail">Enter Admin Email address</label>
				        <input type="text" class="form-control" id="CompleteEmail" aria-describedby="emailHelp" placeholder="Enter email" name="username" required>    
			        </div>

				    <div class="form-group">
				        <label for="exampleInputPassword1">Enter Admin Password</label>
				        <input type="password" class="form-control" id="Completepass" placeholder="Password" name="password" required> 
				            
				    </div>

				    <div class="modal-footer justify-content-center">
				         <input type="submit" name="adminlogin" value="Login" class="bg-dark text-white rounded" style="width: 50%; border: none; height: 30px;">
		      		</div>
	   			</div>
	 		</div>
		</div>	 	
	</div>
</div>
</form>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
