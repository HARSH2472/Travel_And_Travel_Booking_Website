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
// SEARCH DATA
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

			$query = "SELECT * FROM pkgcitytour where city='$city'";
			$result = mysqli_query($link,$query);
				if(mysqli_num_rows($result)==1)
			{ 	
				$row=mysqli_fetch_assoc($result);
				echo ("<script>alert('record found')</script>");
				$_SESSION['city']=$row['city'];
				$_SESSION['pkgname']=$row['pkgname'];
				$_SESSION['pkgdes']=$row['pkgdes'];			
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>explore</title>
	<script>
		if(window.history.replaceState)
		{
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</head>
<body>

 	<form action="#"  method="post"  enctype="multipart/form-data">
	<table align="center" border="10" width="740">
		
		<tr>
			<td colspan="5" align="center">Insert New Tour Here</td>
		</tr>

		<tr>
			<td>Enter State Name:-</td>
			<td><input type="text" name="city" size="80"  autocomplete="off" value="<?php echo @$_SESSION['city'] ?>" /></td>
		</tr>

		<tr>
			<td>Enter Package Name:-</td>
			<td><input type="text" name="pkgname" size="80"  autocomplete="off" value="<?php echo @$_SESSION['pkgname'] ?>"/></td>
		</tr>

		<tr>
			<td>Description :-</td>
			<td><textarea name="pkgdes" cols="80" rows="20"  autocomplete="off" /><?php echo @$_SESSION['pkgdes'] ?></textarea></td>
		</tr>

		<tr>
			<td>Post Image</td>
			<td><input type="file" name="image"/></td>
		</tr>

		<tr>
			<td colspan="5" align="center"><input type="submit" name="submit" value="Insert Tour Record"></td>
		</tr>

		<tr>
			<td colspan="5" align="center"><input type="submit" name="search" value="Search Data"></td>
		</tr>

		<tr>
			<td colspan="5" align="center"><input type="submit" name="update" value="Update Data"></td>
		</tr>

		<tr>
			<td colspan="5" align="center"><input type="submit" name="delete" value="Delete Data"></td>
		</tr>

	</table>
	</form>

</body>
</html>
