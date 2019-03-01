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
$macadresse = $_POST["macadresse"];
$cmarque = $_POST["cmarque"];
$cmodele = $_POST["cmodele"];
$ctype = $_POST["ctype"];
$fai = $_POST["fai"];
$lot = $_POST["lot"];
$initialisele = $_POST["initialisele"];
$initialisepar = $_POST["initialisepar"];
$sql="INSERT INTO capteur_info(macAdresse,capteurMarque,capteurModele,capteurType,fai,lot,initialiseLe,initialisepar) 
    VALUES('$macadresse','$cmarque','$cmodele','$ctype','$fai','$lot','$initialisele','$initialisepar')";
$results = mysqli_query($con,$sql);
if($results){
echo " successfully inserted";
}
else{
    echo "not inserted";
}
 $query="INSERT INTO capteur_data( version,macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids,created_ats) 
    VALUES('000','$macadresse','000','000','000','0','0','0','000','0','$initialisele')";
$myresults = mysqli_query($con,$query);
?>
</div><!-- end  container div-->
</body>
<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>
</html>