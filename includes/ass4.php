<?php 
if(isset($_POST['btnstep1']))
{
	disp1();
}
elseif(isset($_POST['btnstep2']))
{
	disp2();	
}
elseif(isset($_POST['btnstep3']))
{
	disp3();	
}
elseif(isset($_POST['finish']))
{
	dispthank();
}
else
{
	disp1();
}
function setValue($fieldname)
{
	if(isset($_POST[$fieldname]))
	{
		echo $_POST[$fieldname];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php 
	function disp1()
	{
	 ?>
	<form id="s1" method="post">
		<fieldset style="width: 300px;">
			<legend>Step1:-</legend>
			First Name<br>
			<input type="hidden" name="txtm" value="<?php setValue("txtm") ?>"/>
			<input type="hidden" name="txtl" value="<?php setValue("txtl") ?>"/>
			<input type="text" name="txtf" value="<?php setValue("txtf") ?>"/>
			<input type="submit" name="btnstep2" value="next" />
		</fieldset>
	</form>

	<?php 
	}
	function disp2()
	{
	 ?>
	<form id="s2" method="post">
		<fieldset style="width: 300px;">
			<legend>Step2:-</legend>
			Middle Name<br>
			<input type="hidden" name="txtf" value="<?php setValue("txtf") ?>"/>
			<input type="hidden" name="txtl" value="<?php setValue("txtl") ?>"/>
			<input type="text" name="txtm" value="<?php setValue("txtm") ?>"/>
			<input type="submit" name="btnstep3" value="next" />
			<input type="submit" name="btnstep1" value="previous" />
		</fieldset>
	</form>	

	<?php 
	}
	function disp3()
	{
	 ?>
	<form id="s3" method="post">
		<fieldset style="width: 300px;">
			<legend>Step3:-</legend>
			Last Name<br>
			<input type="hidden" name="txtf" value="<?php setValue("txtf") ?>"/>
			<input type="hidden" name="txtm" value="<?php setValue("txtm") ?>"/>
			<input type="text" name="txtl" value="<?php setValue("txtl") ?>"/>
			<input type="submit" name="finish" value="finish" />
			<input type="submit" name="btnstep2" value="previous" />
		</fieldset>
	</form>	

	<?php 
	}
	function dispthank()
	{
		echo "THANKS";		
	}	

	 ?>

</body>
</html>
