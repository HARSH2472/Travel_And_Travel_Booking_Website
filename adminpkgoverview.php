<?php 
session_start();
error_reporting(0);
if(!isset($_SESSION['logindone'])||($_SESSION['logindone'])!=true)
{
	echo ("<script>alert('Please Login First Your Session Is Not Started Yet ')</script>");
	header('refresh:0; url=index.php');
} 
else
{?>
<?php 

$link=mysqli_connect("localhost","root","","pyb");

if(isset($_POST['submit']))
{
	$city = $_POST['city'];
	$pkgname = $_POST['pkgname'];
	$pkgdes = $_POST['pkgdes'];
	$image_name = $_FILES['image']['name'];
	$image_type = $_FILES['image']['type'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$date1 = date('y.m.d');

	if($_POST['city']=='')
	{
		echo ("<script>alert('Fill All The Field')</script>");
		exit();	
	}
	else 
	{
		if($image_type=="image/jpeg" or $image_type=="image/jpg" or $image_type=="image/png" or $image_type=="image/gif" or $image_type=="image/webp")
		{
			move_uploaded_file($image_tmp,"images/$image_name");
			$query = "insert into pkgcitytour(city,pkgname,pkgdes,image,date1) values ('$city','$pkgname','$pkgdes','$image_name','$date1')";
			if(mysqli_query($link,$query))
			{
				echo ("<script>alert('Tour Add Successfully')</script>");
			}
			else
			{
				echo ("<script>alert('Something Wrong')</script>");
			}	
		}
		
	}	
}
//SEARCH DATA
	if(isset($_POST['search']))
	{
			$city = $_POST['city'];
			$pkgname = $_POST['pkgname'];
			$pkgdes = $_POST['pkgdes'];
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_tmp = $_FILES['image']['tmp_name'];	
			$date1 = date('y.m.d');

			$query = "SELECT * FROM pkgcitytour where pkgname='$pkgname'";
			$result = mysqli_query($link,$query);
				if(mysqli_num_rows($result)==1)
			{ 	
				$row=mysqli_fetch_assoc($result);
				echo ("<script>alert('record found')</script>");
				$ncity=$row['city'];
				$npkgname=$row['pkgname'];
				$npkgdes=$row['pkgdes'];			
			}
			else
			{
				echo ("<script>alert('record not found')</script>");
			}

	}

// UPDATE DATA
	if (isset($_POST['update'])) 
	{
			$city = $_POST['city'];
			$pkgname = $_POST['pkgname'];
			$pkgdes = $_POST['pkgdes'];
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_tmp = $_FILES['image']['tmp_name'];	
			$date1 = date('y.m.d');

			$query = "update pkgcitytour set pkgdes='$pkgdes', date1='$date1' where pkgname='$pkgname'";

			if($_POST['pkgdes']=='')
		{
			echo ("<script>alert('Fill All The Field')</script>");
		}
		else
		{
			if(mysqli_query($link,$query))
			{
				echo "Records update: ";
			}
			else
			 {
			 	echo "Error: ";
			 }
		}
	}

// DELETE DATA
	if (isset($_POST['delete'])) 
	{
			$city = $_POST['city'];
			$pkgname = $_POST['pkgname'];
			$pkgdes = $_POST['pkgdes'];
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_tmp = $_FILES['image']['tmp_name'];	
			$date1 = date('y.m.d');

			$query = "DELETE FROM pkgcitytour WHERE pkgname='$pkgname'";

			
			if($_POST['pkgname']=='')
			{
				echo ("<script>alert('p;ease enter the title for delete yout record')</script>");
			}
			else
			{
				if(mysqli_query($link,$query))
				{
					echo "Records deleted: ";
				}
				else
				 {
				 	echo "Error: ";
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
		<title>Admin</title>
		<script>
		if(window.history.replaceState)
		{
			window.history.replaceState(null,null,window.location.href);
		}
		</script>
		<style type="text/css">
			body{
				overflow: hidden;
			}
			.bim{
				width: 100%;
				background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("images/bgimg.jpg");
				background-position: center;
				background-size: cover;
				box-sizing: border-box;
				background-repeat: no-repeat; 
			}

		</style>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>
	<body>


				
					
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <a class="navbar-brand" href="#">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</a>
				  <h6 style="color: black;">WELCOME <?php echo $_SESSION['username']; ?></h6>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				    <ul class="navbar-nav ms-auto">
				      <li class="nav-item">
						<a href="logout.php" style="text-decoration: none;" class="text-dark">𝐥𝐨𝐠𝐨𝐮𝐭</a>
				      </li>
				    </ul>
				  </div>
				</nav>
				<div class="container-fluid bg-dark">
					<div class="row p-1" style="height: 100vh;">
						<div class="col-sm-2 ml-0 bg-dark border-right p-0" style="height: 100vh;">
							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="#" style="text-decoration: none; color: black;">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a></p>
							</div>
							<!-- <div class="row bg-dark ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-white ml-3">𝐔𝐬𝐞𝐫</p>
							</div> -->

							<div class=" row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
							  <a class="dropdown-toggle text-dark ml-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
							    𝐔𝐬𝐞𝐫
							  </a>

							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							    <a class="dropdown-item" href="adminadduser.php">𝐀𝐝𝐝 𝐔𝐬𝐞𝐫</a>
							    <a class="dropdown-item" href="adminremoveuser.php">𝐑𝐞𝐦𝐨𝐯𝐞𝐫 𝐔𝐬𝐞𝐫</a>
							    <a class="dropdown-item" href="adminalluser.php">𝐓𝐨𝐭𝐚𝐥 𝐔𝐬𝐞𝐫</a>
							  </div>

							</div>
							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="adminstatedb.php" style="text-decoration: none; color: black;">𝐀𝐝𝐝 𝐒𝐭𝐚𝐭𝐞</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="adminpkgoverview.php" style="text-decoration: none; color: black;">𝐀𝐝𝐝 𝐏𝐚𝐜𝐤𝐚𝐠𝐞</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="adminpkgadd.php" style="text-decoration: none; color: black;">𝐀𝐝𝐝 𝐏𝐚𝐜𝐤𝐚𝐠𝐞 𝐃𝐞𝐭𝐚𝐢𝐥</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="adminaddpkgimage.php" style="text-decoration: none; color: black;">𝐀𝐝𝐝 𝐏𝐚𝐜𝐤𝐚𝐠𝐚𝐞 𝐈𝐦𝐚𝐠𝐞</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="adminbookdetails.php" style="text-decoration: none; color: black;">𝐁𝐨𝐨𝐤 𝐃𝐞𝐭𝐚𝐢𝐥𝐬</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="report.php" style="text-decoration: none; color: black;"> 𝐑𝐞𝐩𝐨𝐫𝐭</a></p>
							</div>

							<div class="row bg-white ml-4 mt-3" style="border-radius: 20px; height: 40px; width: 100%;">
								<p class="text-dark ml-3"><a href="reportuser.php" style="text-decoration: none; color: black;">𝐔𝐬𝐞𝐫 𝐑𝐞𝐩𝐨𝐫𝐭</a></p>
							</div>
							
						</div>
						<div class="col-sm-10 mr-0 bg-white border-left p-0 bim" style="height: 100vh; width: 100%;">
							
							<div class="container" style="height: 100vh;">

								<form action="#"  method="post"  enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-6">
											<div class="row mt-5" style="background: transparent;">
							                    <p style="color: white;">𝐄𝐧𝐭𝐞𝐫 𝐒𝐭𝐚𝐭𝐞 𝐍𝐚𝐦𝐞:-</p>
							                     <input type="text" id="contactBlockPhone3" class="form-control" style="border-radius: 20px; color: white; background: transparent; " placeholder="Enter State Name" name="city" autocomplete="off" value="<?php echo @$ncity; ?>"/>
							                </div>

							                <div class="row mt-5" style="background: transparent;">
							                    <p style="color: white;">𝐄𝐧𝐭𝐞𝐫 𝐏𝐚𝐜𝐤𝐚𝐠𝐞 𝐍𝐚𝐦𝐞:-</p>
							                     <input type="text" id="contactBlockPhone3" class="form-control" style="border-radius: 20px; color: white; background: transparent; " placeholder="Enter Package Name" name="pkgname" autocomplete="off"  value="<?php echo @$npkgname; ?>"/>
							                </div>

							                <div class="row mt-5" style="background: transparent;">
							                    <p style="color: white;">𝐄𝐧𝐭𝐞𝐫 𝐏𝐚𝐜𝐤𝐚𝐠𝐞 𝐃𝐞𝐬𝐜𝐫𝐢𝐩𝐭𝐢𝐨𝐧:-</p>
							                     <input type="text" id="contactBlockPhone3" class="form-control" style="border-radius: 20px; color: white; background: transparent; " placeholder="Enter Package Description" name="pkgdes" autocomplete="off"  value="<?php echo @$npkgdes; ?>"/>
							                </div>

							                <div class="row mt-5" style="background: transparent;">
							                    <p style="color: white;">𝐔𝐩𝐥𝐨𝐚𝐝 𝐈𝐦𝐚𝐠𝐞:-</p>
							                     <input type="file" id="contactBlockPhone3" class="form-control" style="border-radius: 20px; border: none; color: white; background: transparent; "  name="image" />
							                </div>

										</div>
										
						            <div class="row mt-5">
						            	
						            	<div class="col-sm-3">
						            	<input type="submit" name="submit" value="𝐀𝐝𝐝 𝐏𝐚𝐜𝐤𝐚𝐠𝐞" class="text-dark" style="border-radius: 10px; width: 120px;" />
						          		</div>

						          		<div class="col-sm-3">
						            	<input type="submit" name="search" value="𝐒𝐞𝐚𝐫𝐜𝐡 𝐏𝐚𝐜𝐤𝐚𝐠𝐞" class="text-dark" style="border-radius: 10px; width: 140px;" />
						          		</div>

						          		<div class="col-sm-3">
						            	<input type="submit" name="update" value="𝐔𝐩𝐝𝐚𝐭𝐞 𝐏𝐚𝐜𝐤𝐚𝐠𝐞" class="text-dark" style="border-radius: 10px; width: 140px;" />
						          		</div>

						          		<div class="col-sm-3">
						            	<input type="submit" name="delete" value="𝐃𝐞𝐥𝐞𝐭𝐞 𝐏𝐚𝐜𝐤𝐚𝐠𝐞" class="text-dark" style="border-radius: 10px; width: 140px;" />
						          		</div>
						            </div>
						            
						          </form>
							</div>

						</div>
					</div>
				</div>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
<?php 
}
 ?>