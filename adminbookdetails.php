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
			/*.bim{
				width: 100%;
				background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url("images/bgimg.jpg");
				background-position: center;
				background-size: cover;
				box-sizing: border-box;
				background-repeat: no-repeat; 
			}*/
			.tb{
				color: black;
				font-weight: bold;
			}
			td{
				color: black;
			}
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			  background: linear-gradient(#12c2e9,#c471ed,#f64f59);
			}

			td, th {
			  border: 1px solid black;
			  text-align: left;
			  padding: 8px;
			  font-weight: bold;
			}
		</style>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="print.css" media="print">
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
						<div class="col-sm-10 mr-0 bg-white border-left p-0 bim " style="height: 100vh;">
						<div style="height: 610px; overflow-y:scroll">
							<table class="table tb print-container" id="exptoexcel">
							  <thead class="text-white">
							    <tr class="tb"> 
							      <th scope="col">ID</th>
							      <th scope="col">Customer Name</th>
							      <th scope="col">Customer Number</th>
							      <th scope="col">Email</th>
							      <th scope="col">Package Name</th>
							      <th scope="col">Start Date</th>
							      <th scope="col">End Date</th>
							      <th scope="col">No Of Seat</th>
							      <th scope="col">Date Of Booking</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php 

									$link = mysqli_connect("localhost","root","","pyb");

									$query = "SELECT * FROM book";
									$result = mysqli_query($link,$query);
									while($row=mysqli_fetch_assoc($result))
									{
									 ?>
									<tr>
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['uname'] ?></td>
										<td><?php echo $row['unumber'] ?></td>
										<td><?php echo $row['email'] ?></td>
										<td><?php echo $row['pkgname'] ?></td>
										<td><?php echo $row['pickdate'] ?></td>
										<td><?php echo $row['dropdate'] ?></td>
										<td><?php echo $row['noofseat'] ?></td>
										<td><?php echo $row['date1'] ?></td> 
									</tr>
									<?php 
									}	
									 ?>
							  </tbody>
							</table>
						</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary mt-2" onclick="ExportToExcel('xlsx')") >𝐄𝐱𝐩𝐨𝐫𝐭 𝐭𝐚𝐛𝐥𝐞 𝐭𝐨 𝐞𝐱𝐜𝐞𝐥</button>
							</div>
						</div>
					</div>
				</div>




		<!-- Optional JavaScript -->
		<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
		<script type="text/javascript">
			function ExportToExcel(type, fn, dl)
			{
		       var elt = document.getElementById('exptoexcel');
		       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
		       return dl ?
		         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
		         XLSX.writeFile(wb, fn || ('AllBookingDetails.' + (type || 'xlsx')));
		    }
		</script>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
<?php 
}
 ?>