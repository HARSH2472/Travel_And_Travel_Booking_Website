<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>
	<style type="text/css">
		body
		{
			margin: 0;
			padding: 0;
		}
		img
		{
			height: 400px;
		}
	</style>
	<body>
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
		<div class="container-fluid shadow" style="width: 100%;">
			<div class="row">
			<?php 

				$link=mysqli_connect("localhost","root","","pyb");

							    $pkgname=@$_GET['pkgname'];

							  	$query = "SELECT * FROM pkgdetail where pkgname='$pkgname'";
							 	$query_run = mysqli_query($link,$query);
							 	$check_details = mysqli_num_rows($query_run)>0;

							 	  if($check_details)
			      				  {
			        				while ($row = mysqli_fetch_array($query_run))
			        				{
			         				 ?>	 
			         				 <div class="col-sm-8">
										<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
										  <ol class="carousel-indicators">
										    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										  </ol>
										  <div class="carousel-inner">
										    <div class="carousel-item active">
										      <img class="d-block w-100" src="images/<?php echo $row['image1']; ?>" alt="First slide">
										    </div>
										    <?php
									        }
									      }
									      else
									      {
									         echo "No record Found";
									      }
									     ?>
										   <?php  

										   $link=mysqli_connect("localhost","root","","pyb");

										    $pkgname=@$_GET['pkgname'];

										   $query = "SELECT image FROM pkgimage where pkgname='$pkgname' ";

										   $result = mysqli_query($link,$query);
										   while($row=mysqli_fetch_array($result))
										   {
										   	 
										     ?>
										    <div class="carousel-item">
										      <img class="d-block w-100" src="pkgdetimg/<?php echo $row['image']; ?>" alt="Second slide">
										    </div>
										   <?php 
										    
										   }
										   ?>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										    <span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										    <span class="carousel-control-next-icon" aria-hidden="true"></span>
										    <span class="sr-only">Next</span>
										  </a>
										</div>
									</div>
			         				 <?php 
			         				 $link=mysqli_connect("localhost","root","","pyb");

			         				 $pkgname=@$_GET['pkgname'];

			         				 $query = "SELECT * FROM pkgdetail where pkgname='$pkgname' ";
			         				 $query_run = mysqli_query($link,$query);
								 	$check_details = mysqli_num_rows($query_run)>0;

								 	  if($check_details)
				      				  {
				        				while ($row = mysqli_fetch_array($query_run))
				        				{
			         				 ?>	
								     <div class="col-sm-4 bg-white shadow" >
								     	<div class="row bg-dark mt-1"><h3 class="text-white"><?php echo $row['pkgname'] ?></h3></div>
								     	<div class="card mt-2" style="height:auto; width: 90%;">
										  <div class="card-body"> 

										    <h5 class="card-title">Package Price</h5>
										    <h5 class="card-title text-danger border-bottom"><?php echo $row['pkgprice'] ?></h5>

										    <p class="card-subtitle mb-2 mt-1 text-muted">Tour length</p>
										    <h6 class="card-subtitle mb-2 mt-1 border-bottom text-muted"><?php echo $row['tourlength'] ?></h6>


										    <h6 class="card-subtitle mt-1 text-muted">Start Date :-<label class="text-info"><?php echo $row['startdate'] ?></label></h6>
										    <h6 class="card-subtitle mt-1 border-bottom text-muted">End Date :-<label class="text-danger"><?php echo $row['enddate'] ?></label></h6>

										    <button type="submit" class="text-white bg-danger border-0 mt-3 w-100" style="border-radius: 5px; height: 30px;"> <a href="contactus.php" class="text-white" style="text-decoration: none;">𝐄𝐧𝐪𝐮𝐢𝐫𝐲</a></button>

										    <?php
						                		$path1="booking.php?pkgname=".$row['pkgname'];
						                	?>
										    <button type="submit" class="text-white bg-danger border-0 mt-3 w-100" style="border-radius: 5px; height: 30px;"> <a href="<?php echo $path1 ?>" class="text-white" style="text-decoration: none;">𝐁𝐨𝐨𝐤</a></button>

										  </div>
										</div>
								     </div>
							    </div>
							    <div class="container-fliud mt-3 shadow ml-5" style="width: 90%;">
							    	<div id="accordion">
									  <div class="card">
									  	<p class="text-danger ml-3">Day</p>
									    <div class="card-header" id="headingOne">
									      <h5 class="mb-0">
									        <button class="btn text-white bg-danger" style="border-radius: 20px;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									          1
									        </button>
									      </h5>
									    </div>

									    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									      <div class="card-body">
									       <?php echo $row['day1'] ?>
									      </div>
									    </div>
									  </div>
									   <div class="card">
									  	<p class="text-danger ml-3">Day</p>
									    <div class="card-header" id="headingOne">
									      <h5 class="mb-0">
									        <button class="btn text-white bg-danger" style="border-radius: 20px;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
									          2
									        </button>
									      </h5>
									    </div>
									    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
									      <div class="card-body">
									        <?php echo $row['day2'] ?>
									      </div>
									    </div>
									  </div>
									  <div class="card">
									  	<p class="text-danger ml-3">Day</p>
									    <div class="card-header" id="headingOne">
									      <h5 class="mb-0">
									        <button class="btn text-white bg-danger" style="border-radius: 20px;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
									          3
									        </button>
									      </h5>
									    </div>
									    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
									      <div class="card-body">
									        <?php echo $row['day3'] ?>
									      </div>
									    </div>
									  </div>
									</div>
 									<?php 
										  }
										}	
									?>




							    </div>
							</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>