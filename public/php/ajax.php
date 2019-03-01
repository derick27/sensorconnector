<html>
<head>
</head>
<body>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
 
?>	
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // create an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php

if(!empty($_POST['id'])){
$id=$_POST['id'];
if($id==0){
	echo "<option>Selectionner un clientId</option>";
}
else{
	$sql = "SELECT * FROM silo_info WHERE clientId='$id'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
		echo '<option value="'.$row['siloId'].'">'.$row['nomDuSilo'].'</option>';
		}

	}
	
}
/* ------------------------------------------------///*/
if($_POST['silo']){
$silo=$_POST['silo'];
if($silo==0){
	echo "Selectionner un client";
}
else{
	$myquery= "SELECT * FROM silo_info where siloId='$silo' ";
	$myresults = mysqli_query($con,$myquery);
    $row1 = mysqli_fetch_array($myresults);
		echo ' <table class="table table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <th>Silo</th>
        <th>Client</th>
        <th>Capteur</th>
        <th> Hauteur Global</th>
        <th> Capacit&eacute du Silo</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <td>'.$row1["nomDuSilo"].'</td>
        <td>'.$row1["clientId"].'</td>
        <td>'.$row1["capteur_mac_adresse"].'</td>
        <td>'.$row1["hauDuSilo"].'cm</td>
        <td>'.$row1["capacite"].'kg</td>
      </tr>
      
    </tbody>
  </table>';
	$capaciteQuery ="SELECT * FROM logs_actuel,silo_info where capteur_mac_adresse=macAdresse  and siloId='$silo' ";
	$capaciteResults= mysqli_query($con,$capaciteQuery);
	$row2 =mysqli_fetch_array($capaciteResults);
	$tankLevel = $row2["tankLevels"]/100;
	$hauDuCy = $row2["hauteurCylindre"];
    $hauDuCone = $row2["hauteurCone"];
    $diameter=$row2["diametreCylindre"];
    $rayon =$row2["diametreCylindre"]/2;
    $volumeTotale =$row2["volTotale"];
    $hauDuSilo = $row2["hauDuSilo"]/100;
    $pourDuCone =$row2["cone"];
    $capacite=$row2["capacite"];
    $volumeDucone=$row2["volDucone"];
    if($tankLevel < $hauDuCy){
    	$volumeVide = 3.14*$rayon*$rayon*$tankLevel;
    	$pourcentage = round((($volumeVide * 100)/$volumeTotale),0);
    	$pourcentage = 100 -$pourcentage;
    	$capaciteEstimee= round((($capacite * $pourcentage)/100),0);
    }
    else if( $tankLevel>$hauDuCy && $tankLevel < $hauDuSilo){
    	$newheightOfCone=$hauDuSilo-$tankLevel;
    	$newdiameterOfCone=round((($diameter*$newheightOfCone)/$hauDuCone),2);
    	$newrayon = round(($newdiameterOfCone/2),2);
    	$volumeVide = round((3.14*$newrayon*$newrayon*($newheightOfCone/3)),2);
    	$pourcentage = round((($volumeVide * $pourDuCone)/$volumeDucone),0);
        $hauDutronc= round(($hauDuCone - $newheightOfCone),2);

    	$newvolumeCone =round((($hauDutronc*(3.14/3))*(($rayon*$rayon)+($newrayon*$newrayon)+($rayon*$newrayon))),2);
    	$pou=round((($newvolumeCone * $pourDuCone)/$volumeDucone),0);

    	$capaciteEstimee= round((($capacite * $pourcentage)/100),0);
   
    	 //echo"<br>";
    	 //echo $pou;
    }
    else{
    	$capaciteEstimee=0;
    	$pourcentage =0;
    }
     $capaci=$capaciteEstimee;
     $pour = $pourcentage;
     

    
	echo ' <table class="table table-bordered table-sm">
    <thead class="thead-dark">
      <tr>
        <th>Tank Level</th>
        <th>Contenu</th>
        <th>Capacite estime&eacute;</th>
        <th>Pourcentage</th>
        <th>Heure</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>'.$row2["tankLevels"].'cm</td>
        <td>'.$row2["contenu"].'</td>
        <td>'.$capaci.'kg</td>
        <td>'.$pour.'%</td>
        <td>'.$row2["updated_at"].'</td>
  
      </tr>
      
    </tbody>
  </table> ';
   
	}
	
}


?>
</body>
</html>