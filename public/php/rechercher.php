<html>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();
?>
<head>
</head>
<body>
  <div class="container-fluid">  <!-- start container div -->

  <div class="row">  <!-- start row Div -->
    <div class="col-sm-4"> <!-- start col div -->

      <div id="searchdiv" style="margin-left: 40px;"> <!-- start  search div -->
  <table><!-- start table -->
  <form method="post" action="rechercher.php" name="searchfast"> <!-- start  search form -->
<tr> <td>Clients:</td> <td><select name="client" class="client">
<option value="0" >Selectionner un client</option>
 <?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
 $find="select * from clients";
 $result = mysqli_query($con,$find);
 while($row=mysqli_fetch_array($result))
 {
  echo '<option value="'.$row['clientId'].'">'.$row['nom'].'</option>';
 }
 ?>
</select> </td> </tr>
<tr> <td>Silo:</td><td><select name="silo" class="silo">
<option>Selectionner un silo</option>
</select></td></tr>
<tr><td>Nombre de ligne:</td><td>
<input type="text" class="form-control" id="nombre" name="nombre" placeholder="entrer un chiffre" style="height:30px; width: 220px;"></td></tr>
   <tr> 
    
     <td> De:</td><td>
      <input type="text" name="inputa" placeholder="YYYY-MM-DD" style="height:30px;width: 220px;" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY-MM-DD"/> </td></tr>
      
   <tr><td>A:</td><td>
   <input type="text" name="inputb" placeholder="YYYY-MM-DD" style="height:30px;width: 220px;" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY-MM-DD"/></td></tr>
<tr><td></td>
<td><button type="submit" name="submit"  style="background-color:#556b2f;" >Search</button></td></tr>
</form> <!-- end  search form -->
</table><!-- end  table -->
</div> <!-- end  search div -->
 </div> <!-- end col div -->
    
    <div class="col-sm-4" id="capaciteestime"> <!-- start col div -->
      <h3>Capacite estime&eacute; du silo</h3>  
    </div>  <!-- end col div -->
   
 
  </div> <!-- end row div -->
</div> <!-- end container div -->

<table class="table">
<?php  
 if(isset($_POST["submit"])){
  $client = $_POST["client"];
  $silo = $_POST["silo"];
  $nombre = $_POST["nombre"];
  $inputa = $_POST["inputa"];
  $inputb = $_POST["inputb"];
  $query1="select  nom from clients where clientId='$client'";
  $query2="select nomDuSilo,capteur_mac_adresse from silo_info where siloId='$silo'";

  $result1 = mysqli_query($con,$query1);
  $result2 = mysqli_query($con,$query2);
  $row1=mysqli_fetch_array($result1);
  $row2=mysqli_fetch_array($result2);
  $capteur=$row2["capteur_mac_adresse"];
  $query3 ="select * from logs where  loraDevEui='$capteur' and created_at BETWEEN '$inputa%' and '$inputb%' order by created_at desc limit $nombre";
   $result3 = mysqli_query($con,$query3);
  
   echo '<tbody><tr>
    <td> Client:
   <td> '.$row1["nom"].'   
   </tr> 
   <tr>
   <td>Silo:
   <td> '.$row2["nomDuSilo"].'
   </tr>
   <tr>
   <td>Capteur:
   <td> '.$row2["capteur_mac_adresse"].'
   </tr>
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
 </tr>';
 while($row = mysqli_fetch_array($result3)){
echo '<tr>
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
  
 }
?>
</table>
 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".client").change(function()
{
var client_id=$(this).val();
var post_id = 'id='+ client_id;
 
$.ajax
({
type: "POST",
url: "ajax.php",
data: post_id,
cache: false,
success: function(silos)
{
$(".silo").html(silos);
} 
});
  
});

});
</script> 

<script type="text/javascript">
$(document).ready(function()
{
$(".silo").click(function()
{
var silo_id=$(this).val();
var post_silo = 'silo='+ silo_id;
 
$.ajax
({
type: "POST",
url: "ajax.php",
data: post_silo,
cache: false,
success: function(capaciteestime)
{
$("#capaciteestime").html(capaciteestime);

} 
});
  
});

});
</script> 


<a href="http://cvcmsr.ddns.net/php/aviser.php" style="margin-left:150px; font-size:40px;"> Voir tout</a>
</body>
<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>
 
</html>