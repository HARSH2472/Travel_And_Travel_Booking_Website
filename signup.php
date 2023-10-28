		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign Up</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

	<script>
		if(window.history.replaceState)
		{
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	
	<style type="text/css">
		body{
			overflow: hidden;
			width: 100%;
		    height: 100vh;
		    background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("image/signupbg.jpg");
		    background-position: center;
		    background-size: cover;
		    box-sizing: border-box;
		    background-repeat: no-repeat;
		}
	</style>
</head>
<body>	
	 <div class="row justify-content-between bg-dark ">
		    <div class="col-6 ">
		    	<p style="color: white; font: 25px bold;">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</p>
		    </div>
		    <div class="col-6 ">
		     	<ul class="nav justify-content-end " >
			
 					<button type="button" class="btn btn " style="font-size: 20px;"><a href="index.php" class="text-white">Home</a></button>
				    <!-- <button type="button" class="btn btn text-white" style="font-size: 20px;"data-toggle="modal" data-target="#completeModel">login</button> -->
				    <button type="button" class="btn btn text-white"style="font-size: 20px;">About Us</button>
				    <button type="button" class="btn btn text-white"style="font-size: 20px;">Contact</button>

				</ul> 
		    </div>
		 </div>

		<form style="margin-left: 100px;" method="post" enctype="multipart/form-data">
			<div class="row1">
				<div class="col-md-4 text-white" style="margin-top: 20px;">First Name
	<input type="text" class="form-control" placeholder="First Name" name="fname" onmouseleave="stringlength(this,1,12)">
				</div>	
			</div>
			<div class="row2">
				<div class="col-md-4 text-white" style="margin-top: 20px;">Last Name
	<input type="text" class="form-control" placeholder="Last Name" name="lname" onmouseleave="stringlength(this,1,12)">
				</div>	
			</div>

			<div class="row3">
				<div class="col-md-4 text-white" style="margin-top: 20px;">Address
	<input type="text" class="form-control" placeholder="Address" name="address" onmouseleave="stringlength(this,8,50)">
				</div>	
			</div>

			<div class="row4">
				<div class="col-md-4 text-white" style="margin-top: 20px;">Email
	<input type="email" class="form-control" placeholder="Enter Email" name="email" onmouseleave="ValidateEmail(this)">
				</div>	
			</div>
			<div class="row5">
				<div class="col-md-4 text-white" style="margin-top: 20px;">Password
		<input type="Password" class="form-control" placeholder="Enter Password" name="pass" onmouseleave="mover(this)">
				</div>	
			</div>
			<div class="row6">
				<div class="col-md-4 text-white" style="margin-top: 20px;">Conform Password
		<input type="Password" class="form-control" placeholder="Conform Password" name="cpass" onmouseleave="mover(this)">
				</div>	
			</div>

			<div class="form-check"  style="margin-top: 10px; font-size: 20px;">
			    <input type="checkbox" style="margin-top: 13px;" class="form-check-input" id="exampleCheck1" name="chk">
			    <label class="form-check-label" for="exampleCheck1">I accept all <a href="terms.php" title="">terms and Conditions</a></label>
  			</div>
  			<div class="model justify-content-start" style="margin-top: 15px;" >
				    <input type="submit" class="btn btn-info" name="submit" value="SignUP">
		       
		     </div>
		</form>






	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
	function mover(inputtxt)
	{
		var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
		if(inputtxt.value.match(passw)) 
		{ 

		}
		else
		{ 
		alert('check a password between 8 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter')
		return false;
		}
	}
	function stringlength(inputtxt, minlength, maxlength)
	{ 
		var field = inputtxt.value; 
		var mnlen = minlength;
		var mxlen = maxlength;

		if(field.length<mnlen || field.length> mxlen)
		{ 
		alert("Please Enter Detail between " +mnlen+ " and " +mxlen+ " characters");
		return false;
		}
		else
		{ 
		}
	}
	function ValidateEmail(inputText)
	{
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(inputText.value.match(mailformat))
		{
		}
		else
		{
		alert("You have entered an invalid email address!");
		document.form1.text1.focus();
		return false;
		}
	}
</script>

<?php 
	$link = mysqli_connect("localhost","root","","pyb");


	if(isset($_POST['submit']))
	{
		if(!empty($_POST["chk"]))
		{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$date1 = date('y.m.d');

		if(!preg_match("/^[a-zA-Z ]*$/", $_POST['fname'] ))
        {  
            echo ("<script>alert('only charcter allowed at first name')</script>");
            exit();
        } 
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST['lname'] )) 
        {  
            echo ("<script>alert('only charcter allowed at last name')</script>");
            exit();
        } 
		if($_POST['pass'] != $_POST['cpass'])
		{
			echo ("<script>alert('pass not match')</script>");
		}
		else
		{
			$uppercase = preg_match('@[A-Z]@',$_POST['pass']);
			$lowercase = preg_match('@[a-z]@',$_POST['pass']);
			$number    = preg_match('@[0-9]@',$_POST['pass']);
			$specialChars = preg_match('@[^\w]@',$_POST['pass']);

			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['pass']) < 8)
			{
			    echo ("<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character')</script>");
			}
			else
			{
			    $query = mysqli_query($link,"SELECT * FROM signup_detail WHERE email = '$email'");
				if(mysqli_num_rows($query)>0)
				{
					echo ("<script>alert('EMAIL ID IS ALREADY REGISTERED')</script>");
				}
				else
				{
					$query = "insert into signup_detail(fname,lname,address,email,pass,cpass,date1) values ('$fname','$lname','$address','$email','$pass','$cpass','$date1')";
					if(mysqli_query($link,$query))
					{
						// echo ("<h1>DATA SUBMIT</h1>");
						echo ("<script>alert('Registration Sucessfull')</script>");
						header('refresh:0; url=index.php');
					}
				}
			}
			
		}

		}
		else
		{
			echo ("<script>alert('Please Accept Terms And Condition')</script>");
		}
	}

 ?>