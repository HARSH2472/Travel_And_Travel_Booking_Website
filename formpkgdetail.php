<?php

$link = mysqli_connect("localhost","root","","pyb");

if(isset($_POST['submit']))
{
	$pkgname = $_POST['pkgname'];
	$pkgprice = $_POST['pkgprice'];
	
	$image1_name = $_FILES['image1']['name'];
	$image1_tmp = $_FILES['image1']['tmp_name'];
	
	if($_POST['pkgname']=='' and $_POST['pkgprice']=='')
	{
		echo ("<script>alert('Fill All The Field')</script>");
		exit();	
	}
	else
	{
		move_uploaded_file($image1_tmp,"images/$image1_name");
		$query = " insert into pkgdetail (pkgname,pkgprice,image1) values ('$pkgname','$pkgprice','$image1_name') ";
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
			<td colspan="5" align="center">Insert New Tour Detail Here</td>
		</tr>

		<tr>
			<td>Package Name:-</td>
			<td><input type="text" name="pkgname" size="80"  autocomplete="off"/></td>
		</tr>

				<tr>
			<td>Package Price:-</td>
			<td><input type="text" name="pkgprice" size="80"  autocomplete="off"/></td>
		</tr>

		<tr>
			<td>Post Image-1</td>
			<td><input type="file" name="image1"/></td>
		</tr>

		<tr>
			<td colspan="5" align="center"><input type="submit" name="submit" value="Insert Tour Detail"></td>
		</tr>

	</table>
	</form>

</body>
</html>
