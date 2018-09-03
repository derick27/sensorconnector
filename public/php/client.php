<html>
<head>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$clientid = $_POST["clientid"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$youraddr = $_POST["youraddr"];
$courriel = $_POST["courriel"];
$telephone = $_POST["telephone"];
$sql="INSERT INTO clients( clientId,prenom,nom,addresse,courriel,telephone) 
VALUES('$clientid','$prenom','$nom','$youraddr','$courriel','$telephone')";
$results = mysqli_query($con,$sql);
if($results){
echo " successfully inserted";
}
else{
    echo "not inserted";
}

?>
</body>
</html>