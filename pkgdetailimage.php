<?php 
session_start();
error_reporting(0);
if(!isset($_SESSION['logindone'])||($_SESSION['logindone'])!=true)
{
	echo ("<script>alert('Please Login First Your Session Is Not Started Yet ')</script>");
	header('refresh:0; url=index.php');
	
} 
else
{
?>
<?php

$link = mysqli_connect("localhost","root","","pyb");
$_SESSION['count']=1;

if(isset($_POST['submit']))
{
	$pkgname = $_POST['pkgname'];
	$image_name = $_FILES['image']['name'];
	
	if($_POST['pkgname']=='')
	{
		echo ("<script>alert('Fill All The Field')</script>");
		exit();	
	}
	else
	{
		$extension = pathinfo($image_name,PATHINFO_EXTENSION);
		// $randomno=rand(0,100);
		
		$rename=$pkgname.$_SESSION['count'];

		$newname=$rename.'.'.$extension;

		$image_tmp = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($image_tmp,"pkgdetimg/".$newname);
		$query = " insert into pkgimage (pkgname,image) values ('$pkgname','$newname') ";
		if(mysqli_query($link,$query))
		{
			echo ("<script>alert('image Add Successfully')</script>");
			$_SESSION['count'] = $_SESSION['count']+1;
		}
		else
		{
			echo ("<script>alert('Something Wrong')</script>");
		}		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>
		<script>
			if(window.history.replaceState)
			{
				window.history.replaceState(null,null,window.location.href);
			}
		</script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>
	<body>
	<form action="#"  method="post"  enctype="multipart/form-data">
			
		 <label for="cars">Choose a Package:</label>
		  <select name="pkgname">
		  	<?php 
		  	$query = "SELECT pkgname FROM pkgdetail";
		  	$result = mysqli_query($link,$query);
		  	 while($row=mysqli_fetch_assoc($result))
		  	 { 
		  	 ?>
		    		<option value="<?php echo $row["pkgname"] ?>"> <?php echo $row["pkgname"] ?> </option>
		  	<?php 
		  	}
		  	 ?>
		  </select>
		  <br><br>

		  <input type="file" name="image"/><br><br>

		  <input type="submit" value="Submit" name="submit">
	</form>



		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
<?php 
}
 ?>