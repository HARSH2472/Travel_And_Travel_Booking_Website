<?php 
session_start();
session_unset();
session_destroy();
echo ("<script>alert('Logout Sucessfull')</script>");
header('refresh:0; url=index.php');
 ?>