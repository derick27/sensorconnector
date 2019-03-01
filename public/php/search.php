<html>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();
?>
<body>
<div class="container-fluid"><!-- start container div ****************************** -->
	<table class="table">
<thead>
<tr>
 <th>ID</th>
 <th>Version</th>
 <th>loraDevEui</th>
 <th>LoraPacketSequenceNUmber</th/>
 <th> PacketTimeStamp</th>
 <th>Device SN</th>
 <th>Tank level</th>
 <th>Voltage du batterie</th>
 <th>Temperature</th>
 <th>rawPayloadBytes</th>
 <th>date de creation</th>
 </tr>
</thead>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$capteur =$_POST["producteur"];
$nombre = $_POST["nombre"];
$datee = $_POST["inputa"];
$datede = $_POST["inputb"];
$query ="select * from logs where  loraDevEui='$capteur' and created_at BETWEEN '$datee%' and '$datede%' order by created_at desc limit $nombre";
$results = mysqli_query($con,$query);
while($row = mysqli_fetch_array($results)){
echo '<tbody><tr>
  <td> '.$row["id"].'  
 <td> '.$row ["version"].' 
 <td> '.$row ["loraDevEui"].' 
 <td> '.$row["loraPacketSequenceNumber"].'  
 <td> '.$row["packetTimestamp"].'  
 <td> '.$row["deviceSerialNumber"].'  
 <td> '.$row["tankLevel"].' 
 <td> '.$row["batteryVoltage"].'  
 <td> '.$row["temperature"].'  
 <td> '.$row["rawPayloadBytes"].'  
 <td> '.$row["created_at"].'  
 </tr> </tbody>';
 
}
?>
</table>
</div> <!--End div container ************************************************** -->
</body>
<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>

</html>