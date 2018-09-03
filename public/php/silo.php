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
$siloid = $_POST["siloid"];
$nom = $_POST["nom"];
$contenu = $_POST["contenu"];
$marque = $_POST["marque"];
$stype = $_POST["stype"];
$modele = $_POST["modele"];
$serie = $_POST["serie"];
$hducylindre = $_POST["hducylindre"];
$dicylindre = $_POST["dicylindre"];
$hducone = $_POST["hducone"];
$pducone = $_POST["pducone"];
$hglobal = $_POST["hglobal"];
$capacite = $_POST["capacite"];
$clientid = $_POST["clientid"];
$sql="INSERT INTO silo_info( siloId,nom,contenu,marque,type,modele,numeroSerie,hauteurCylindre,diametreCylindre,hauteurCone,penteCone,hauteurGlobal,capacite,clientId) 
    VALUES('$siloid','$nom','$contenu','$marque','$stype','$modele','$serie','$hducylindre','$dicylindre','$hducone','$pducone','$hglobal','$capacite','$clientid')";
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