<!DOCTYPE html>
<html>
<head>
	<title>scanout</title>
</head>
<body>
	<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	require_once("dbconnect.php");
	$obj = new DBconnector(); // craete an object
	$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
	$sn = $_POST["serialnumber"];
	 echo $sn;
	?>

</body>
</html>