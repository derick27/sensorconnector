<head>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$query ="SELECT * FROM  logs";
$results = mysqli_query($con,$query);
$loaddata ="SELECT * FROM capteur_data";
$caresults = mysqli_query($con,$loaddata);
$count = mysqli_num_rows($results);
echo $count .'<br>';
while($row = mysqli_fetch_array($results)){
	$id= $row["id"];
	$version =$row ["version"];
	$mac= $row["loraDevEui"];
	$lora= $row["loraPacketSequenceNumber"];
	$packettime= $row["packetTimestamp"];
	$devicesn= $row["deviceSerialNumber"];
	$tank= $row["tankLevel"];
	$battery= $row["batteryVoltage"];
	$temp= $row["temperature"];
	$rawpay= $row["rawPayloadBytes"];
	$created= $row["created_at"];
	$updated=$row["updated_at"];

    	$sql="INSERT INTO capteur_data( version,macAdresse,loraPacketSequenceNumbers,packetTimestamps,deviceSerialNumbers,tankLevels,batteryVoltages,temperatures,rawPayloadBytess,ids,created_ats) 
    VALUES('$version','$mac','$lora','$packettime','$devicesn','$tank','$battery','$temp','$rawpay','$id','$created')";
$myresults = mysqli_query($con,$sql);

}



?>
</body>
</html>