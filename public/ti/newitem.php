<!DOCTYPE html>
<html>
<head>
	<title>New Item</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnect.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$serialNumber = $_POST["serialn"];
$category = $_POST["category"];
$model = $_POST["model"];
$sql="INSERT INTO items(model,category,serialNumber) Values ('$model','$category','$serialNumber')";
$results = mysqli_query($con,$sql);
if($results){
echo " The new items  is successfully inserted";
}
else{
    echo "The new item is not inserted. Please try again";
}
?>

</body>
</html>