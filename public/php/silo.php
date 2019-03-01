<html>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();
?>
<body>
	<div class="container-fluid"><!-- start container div-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php

$nom = $_POST["nom"];
$contenu = $_POST["contenu"];
$serie = $_POST["serie"];
$hducylindre = $_POST["hducylindre"];
$dicylindre = $_POST["dicylindre"];
$hducone = $_POST["hducone"];
$densite = $_POST["densite"];
$clientid = $_POST["clientid"];
$siloid = $clientid.$nom ;
$macad = $_POST["macad"];
$rayon = round(($dicylindre/2),2);
$hc=round(($hducone/3),2);
$pi = 3.14;
$volCylindre=round(($pi*$rayon*$rayon*$hducylindre),2);
$volCone=round(($pi*$rayon*$rayon*$hc),2);
$volTotale= $volCylindre+$volCone;
$hauteur= ($hducylindre+$hducone)*100;
$capacite =round(($volTotale*10*$densite),0);
$cyl =round(((100*$volCylindre)/$volTotale),0);
$conne =round(((100*$volCone)/$volTotale),0);
$sql="INSERT INTO silo_info(siloId,nomDuSilo ,contenu,numeroSerie,hauteurCylindre,diametreCylindre,hauteurCone,densite,clientId,capteur_mac_adresse,
            volDucylindre ,volDucone,volTotale,hauDuSilo,capacite,cylindre,cone ) 
  VALUES('$siloid','$nom','$contenu','$serie',$hducylindre,$dicylindre,$hducone,$densite,'$clientid','$macad',$volCylindre,$volCone,$volTotale,
  $hauteur,$capacite,$cyl,$conne);";
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