<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Explore</title>
		<script>
		if(window.history.replaceState)
		{
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	</head>
	<style>
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
<body style="overflow-x: hidden;">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		    <ul class="navbar-nav ms-auto">
		      <li class="nav-item ">
		        <a class="nav-link" href="myhome.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">logout</a>3
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
<div class="container-fluid h-100 m-0 p-0"> 
	<div class="row">
		 <div class="col-sm-3  p-3" style="font-size: 20px; text-decoration: none; ">
		 		<div class="pos-f-t">
  					<div class="collapse" id="navbarToggleExternalContent">
    					<div class="bg-dark p-4">
				    		<ul  style="background-color: white; overflow: hidden;" class="text-center rounded ml-4 mr-4">
				    			<?php
				                	$path="cityexplore.php?city="."MAHARASHTRA";
				                 ?>
						 	 <a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none; ">Maharastra</a>
						 	 </ul>
						 	 <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	<?php
				                	$path="cityexplore.php?city="."RAJASTHAN";
				                 ?>
						 	 <a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none;">Rajastan</a>
						 	 </ul>
						 	 <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	<?php
				                	$path="cityexplore.php?city="."GUJARAT";
				                 ?>
						 	 	<a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none;">Gujarat</a>
						 	 </ul>
						 	 <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	 <?php
				                	$path="cityexplore.php?city="."TELANGANA";
				                 ?>
						 	 	<a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none;">Telengana</a>
						 	 </ul>
						 	  <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	 <?php
				                	$path="cityexplore.php?city="."HIMACHAL PRADESH";
				                 ?>
						<a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none;">HIMACHAL PRADESH</a>
						 	 </ul>	
						 	 <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	 <?php
				                	$path="cityexplore.php?city="."LADAKH";
				                 ?>
						<a href="<?php echo $path?>" class="text-dark font-weight-bold" style="text-decoration: none;">LADAKH</a>
						 	 </ul>				 	 					 	 
						 	 <ul style="background-color: white;  overflow: hidden;" class="text-center rounded ml-4 mr-4">
						 	 	<a href="#" class="text-dark font-weight-bold" style="text-decoration: none;">Odisa<a class="text-success" style="text-decoration: none;" href="#">(Comming Soon)</a></a>
						 	 </ul>
						</div>
  					</div>
						<nav class="navbar navbar-dark bg-dark">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						    </button>
						</nav>
				</div>
			 </div>



			 
		 <div class="col-sm-9">
		 	<div class="row">
		 		<?php 
						    $link=mysqli_connect("localhost","root","","pyb");

						    $city=@$_GET['city'];

						  	$query = "SELECT * FROM pkgcitytour where city='$city'";
						 	$query_run = mysqli_query($link,$query);
						 	$check_details = mysqli_num_rows($query_run)>0;

						 	  if($check_details)
		      				  {
		        				while ($row = mysqli_fetch_array($query_run))
		        				{
		         				 ?>

		            <div class="col-sm-4  p-3" >
		            <div class="card extcard shadow">
		              <div class="card-body">
		                <img src="images/<?php echo $row['image']?>" class="card-img-top">
		                <h4 class="card-title"><?php echo $row['pkgname'];?></h4>
		                <p class="card-text">
		                  <?php echo $row['pkgdes']; ?>
		                </p>
		               	<div class="row border-dark" style="height: 30px;">
		               		<?php
		                		$path1="booking.php?pkgname=".$row['pkgname'];
		                	 ?>
		               		<button type="submit" class=" bg-danger  shadow" style="width: 50%; border-radius: 20px;"><a href="<?php echo $path1 ?>" style="text-decoration: none;" class="text-dark">Book</a></button>
		               		 <?php
		                		$path1="pkgdetail.php?pkgname=".$row['pkgname'];
		                	 ?>
		               <a href="<?php echo $path1 ?>" class="text-dark  bg-white shadow"  style="width: 50%; border-radius: 20px; text-decoration: none; text-align: center; font-weight: 500; ">Detail</a>
		               	</div>
		              </div>
		            </div>
		          </div>

		          <?php
		        }
		      }
		         else
		         {
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