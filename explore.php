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
<!DOCTYPE html>
<html lang="en">	
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Explore</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	</head>
	<style type="text/css">
		body
		{
			margin: 0;
			padding: 0;
		}
		.extcard
		{
			margin: 10px;
			height: auto;
			border-radius: 15px;
			cursor: pointer;
			background-position: center;
		    background-size: cover;
		    transition: transform 0.5s;
		}
		.extcard:hover
		{
		    transform: translateY(-10px);
			/*transform:  rotateY(360deg);
			transition: 0.7s;*/
		}
		.extcard img
		{
			height: 200px;
		}
	</style>

<body>
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</a>
		  <h6 style="color: black;">WELCOME <?php echo $_SESSION['username']; ?></h6>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		    <ul class="navbar-nav ms-auto">
		      <li class="nav-item ">
		        <a class="nav-link" href="index.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">logout</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="about.php">About US</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="contactus.php">Contact Us</a>
		      </li>
		    </ul>
		  </div>
		</nav>

		
<!-- cards -->
<div class="container-fluid h-100 "> 
	<div class="row">
		 <div class="col-sm-4">
		 	 <div class="card text-center shadow">
			      <img class="card-img-top rounded " src="image/namaste.jpg"  alt="Card image cap" >
			      <div class="card-body justify-content-start">
			        <h4 class="card-title text-left
			        ">Let's Explore India</h4>
			        <a href="#" class="btn btn-dark w-100" >BOOK</a>
			      </div>
			    </div>
		 </div>
		 <div class="col-sm-8">
		 	<div class="row">
		 		 <?php 
		    $link=mysqli_connect("localhost","root","","pyb");
		    
		  	$query = "SELECT * FROM detail";
		 	$query_run = mysqli_query($link,$query);
		 	$check_details = mysqli_num_rows($query_run)>0;

		       if($check_details)
		      {
		        while ($row = mysqli_fetch_array($query_run))
		        {
		          ?>

		            <div class="col-sm-4" >
		            <div class="card extcard shadow carddmeo">
		              <div class="card-body">
		                <img src="images/<?php echo $row['image'];?>" class="card-img-top">
		                <h4 class="card-title"><?php echo $row['city']; ?></h1>
		                <p class="card-text" style="font-size: 13px; font-weight: bolder;">
		                  <?php echo $row['description']; ?>
		                </p>
		                <?php
		                	$path="cityexplore.php?city=".$row['city'];
		                 ?>
		               	<a href="<?php echo $path ?>" class="btn btn-dark btn-block w-100" >EXPLORE</a>
		              </div>
		            </div>
		          </div>

		          <?php
		        }
		      }
		         else{
		          echo "NO record Found";
		         }
		         
		     ?>

		 	</div>
		 </div>
	</div>
  </div>
</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	</body>
</html>
<?php 
}
 ?>