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

  if(isset($_POST['submit']))
  {
    $from = $_POST['from'];
    $to = $_POST['to'];

    $link = mysqli_connect("localhost","root","","pyb");

    $query = "SELECT pkgname FROM book where  pkgname='mahableshwar' AND date1 between '$from' AND '$to'";

    $result = mysqli_query($link,$query);

    $row=mysqli_num_rows($result);

      
    $query1 = "SELECT pkgname FROM book where  pkgname='mathurai' AND date1 between '$from' AND '$to'";

    $result1 = mysqli_query($link,$query1);

    $row1=mysqli_num_rows($result1);

  }

   ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Admin</title>

		<style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(54, 162, 235, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
/*        background: rgba(54, 162, 235, 0.2);*/
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(54, 162, 235, 1);
        background: white;
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
								<p class="text-dark ml-3"><a href="admin.php" style="text-decoration: none; color: black;">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a></p>
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
						<div class="col-sm-10 mr-0 bg-white border-left p-0" style=" width: 100%;">
								
							<!--  <div class="chartCard">
						      <div class="chartBox"> -->
						      	 <form method="post">
							          <label>FROM</label>
							          <input type="date" name="from">
							          <label>TO</label>
							          <input type="date" name="to">
							          <input type="submit" name="submit">
						        </form>
						        <canvas id="myChart"></canvas>
						      <!-- </div> -->
						    <!-- </div>					 -->
								
						</div>
					</div>
				</div>







		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
		 <script>
						    // setup 
						    const data = {
						      labels: ['Mahabaleshwar', 'mathurai', 'chennai', 'gujrat', 'ladkah', 'goa', 'rajastan'],
						      datasets: [{
						        label: 'Weekly Sales',
						        data: [<?php echo $row;?>, <?php echo $row1;?>,<?php echo 4?>, 9, 12, 3, 9],
						        backgroundColor: [
						          'rgba(255, 26, 104, 0.2)',
						          'rgba(54, 162, 235, 0.2)',
						          'rgba(255, 206, 86, 0.2)',
						          'rgba(75, 192, 192, 0.2)',
						          'rgba(153, 102, 255, 0.2)',
						          'rgba(255, 159, 64, 0.2)',
						          'rgba(0, 0, 0, 0.2)'
						        ],
						        borderColor: [
						          'rgba(255, 26, 104, 1)',
						          'rgba(54, 162, 235, 1)',
						          'rgba(255, 206, 86, 1)',
						          'rgba(75, 192, 192, 1)',
						          'rgba(153, 102, 255, 1)',
						          'rgba(255, 159, 64, 1)',
						          'rgba(0, 0, 0, 1)'
						        ],
						        borderWidth: 1
						      }]
						    };

						    // config 
						    const config = {
						      type: 'bar',
						      data,
						      options: {
						        scales: {
						          y: {
						            beginAtZero: true
						          }
						        }
						      }
						    };

						    // render init block
						    const myChart = new Chart(
						      document.getElementById('myChart'),
						      config
						    );
						    </script>
	</body>
</html>
<?php 
}
 ?>