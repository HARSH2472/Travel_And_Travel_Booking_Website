<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ass1</title>
</head>
<body>
<form action="formvalue.php" method="post">
	username
	<input type="text" name="uname"><br><br>
	password
	<input type="text" name="upass"><br><br>
	emailid
	<input type="email" name="emailid"><br><br>
	address
	<input type="text" name="address"><br><br>
	phoneno
	<input type="number" name="phoneno"><br><br>

	<label>Select Your City:-</label>
	<select name="city">
		<option value="Aurangabad">Aurangabad</option>
		<option value="Pune">Pune</option>
		<option value="Mumbai">Mumbai</option>
		<option value="Nashik">Nashik</option>
	</select>

	<p><b>select gender</b></p>
	<input type="radio" name="rd1" value="male">
	<label>MALE</label><br>
	<input type="radio" name="rd1" value="female">
	<label>FEMALE</label><br>
	<input type="radio" name="rd1" value="other">
	<label>OTHER</label><br>

	<input type="submit" name="submit" value="send value">

</form>
</body>
</html>
<?php 

if(isset($_POST['submit']))
{
	$uname = $_POST["uname"];
}

 ?>