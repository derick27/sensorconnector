<html>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();
?>
<body>
<div class="container-fluid"> <!-- start container div-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$clientid = $_POST["clientid"];
$nom = $_POST["nom"];
$youraddr = $_POST["youraddr"];
$courriel = $_POST["courriel"];
$telephone = $_POST["telephone"];
$sql="INSERT INTO clients( clientId,nom,addresse,courriel,telephone) 
VALUES('$clientid','$nom','$youraddr','$courriel','$telephone')";
$results = mysqli_query($con,$sql);
if($results){
echo " successfully inserted";
}
else{
    echo "not inserted";
}

?>
</div><!-- end container div-->
</body>
	<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>
</html>