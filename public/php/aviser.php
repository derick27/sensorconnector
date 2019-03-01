<!DOCTYPE html>
<html>
<head>
	<title>Aviser</title>
</head>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();

?>
<body>
	<div class="container-fluid">
<table class="table table-bordered">
<thead>
<tr>
 <th>Client</th>
 <th>Nom du silo</th>
 <th>Contenu</th>
 <th>Capacite estime</th/>
 <th>Pourcentage</th/>
 <th>Heure</th>
 <th>Notes</th>
 </tr>
</thead>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$query ="select nom,nomDuSilo,contenu,tankLevels,hauteurCylindre,hauteurCone,diametreCylindre,volTotale,hauDuSilo,cone,capacite,volDucone,created_ats from silo_info,clients,logs_actuel where silo_info.clientId= clients.clientId and silo_info.capteur_mac_adresse = logs_actuel.macAdresse ";
$result =mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
	$tankLevel = $row["tankLevels"]/100;
	$hauDuCy = $row["hauteurCylindre"];
    $hauDuCone = $row["hauteurCone"];
    $diameter=$row["diametreCylindre"];
    $rayon =$row["diametreCylindre"]/2;
    $volumeTotale =$row["volTotale"];
    $hauDuSilo = $row["hauDuSilo"]/100;
    $pourDuCone =$row["cone"];
    $capacite=$row["capacite"];
    $volumeDucone=$row["volDucone"];
    $time =$row ["created_ats"];
    if($tankLevel < $hauDuCy){
    	$volumeVide = 3.14*$rayon*$rayon*$tankLevel;
    	$pourcentage = round((($volumeVide * 100)/$volumeTotale),0);
    	$pourcentage = 100 -$pourcentage;
    	$capaciteEstimee= round((($capacite * $pourcentage)/100),0);
    	$note ="Parfait";
    	$note= "<font color='blue'>".$note."</font>";
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
         $note ="A commander";
         $note= "<font color='green'>".$note."</font>";
    	 //echo"<br>";
    	 //echo $pou;
    }
    else{ 
    	$capaciteEstimee=0;
    	$pourcentage =0;
    	$note="A verifier";
    	$note= "<font color='red' font-style=''>".$note."</font>";
    }
     $capaci=$capaciteEstimee;
     $pour = $pourcentage;
     $date1 = $row ["created_ats"];
     $date2 = date("Y-m-d H:i:s");
      $diff = abs(strtotime($date2) - strtotime($date1));
      if($diff >86400){
      	$note="A verifier";
    	$note= "<font color='red' font-style=''>".$note."</font>";
      }


echo '<tbody><tr>
  <td> '.$row["nom"].'</td>  
 <td> '.$row ["nomDuSilo"].'</td> 
 <td> '.$row ["contenu"].'</td> 
 <td> '.$capaci.'kg </td>
 <td> '.$pour.'% </td> 
 <td> '.$row ["created_ats"].'</td> 
 <td> '.$note.' </td>
 
 </tr> </tbody> ';
}
?>
</table>
</div>
</body>
<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>
</html>