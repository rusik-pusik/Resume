<?php 
// Database connection info 
$server="127.0.0.1";
$user  ="root";
$pass  ="1";
$dbname ="infocel";
$dbtable ="user";
$conn  = mysqli_connect($server, $user,$pass, $dbname);
if(!$conn)
{
	die("connection Failed!" . mysqli_connect_error());
}
else{
	echo "Connection Established";
}
?>