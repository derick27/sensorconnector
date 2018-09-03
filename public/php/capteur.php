<head>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$macadresse = $_POST["macadresse"];
$cmarque = $_POST["cmarque"];
$cmodele = $_POST["cmodele"];
$ctype = $_POST["ctype"];
$fai = $_POST["fai"];
$lot = $_POST["lot"];
$initialisele = $_POST["initialisele"];
$initialisea = $_POST["initialisea"];
$initialisepar = $_POST["initialisepar"];
$siloid = $_POST["siloid"];
$sql="INSERT INTO capteur(macAdresse,capteurMarque,capteurModele,capteurType,fai,lot,initialiseLe,clientId,initialisepar,siloId) 
    VALUES('$macadresse','$cmarque','$cmodele','$ctype','$fai','$lot','$initialisele','$initialisea','$initialisepar','$siloid')";
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