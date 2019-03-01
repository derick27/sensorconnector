<html>
<head>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');  // display errors
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$query ="select clients.nom, nomDuSilo, contenu, hauDuSilo,tankLevels, capteur_mac_adresse,hauteurCylindre, hauteurCone,cylindre,cone from clients, silo_info,logs_actuel  where silo_info.clientId = clients.clientId and capteur_mac_adresse = macAdresse;"; // query to get tank level
$myresults = mysqli_query($con,$query); //execute a query
while ($row=mysqli_fetch_array($myresults)) {
	$subject = "information sur ".$row["nomDuSilo"];   
	$to = "dusheric03@gmail.com";
  // $phone =$row["telephone"]."@vmobile.ca";
    $hsilo=$row["hauDuSilo"];
    $hcylindre =$row["hauteurCylindre"] *100;
    $hcone =$row["hauteurCone"]*100;
    $tanklevel = $row["tankLevels"];
    $pourCylindre =$row["cylindre"];
    $pourCone = $row["cone"];
    $ferme =$row["nom"];
    $contenu =$row["contenu"];
    $pourcentage ;
     if($tanklevel >= $hcylindre){
        $hestimeCone = $hsilo-$tanklevel;
        $pourtank =round((($hestimeCone *  $pourCone)/$hcone),0);
        $pourcentage = $pourtank;
     }
     else{
        $pourtank =round((($tanklevel *  $pourCylindre)/$hcylindre),0);
        $pourcentage = ($pourCylindre -  $pourtank)+$pourCone;
     }
	$message = "Ferme: ".$ferme."<br>"."Nom du silo:".$row["nomDuSilo"]."<br>"."Contenu du silo:".$contenu."<br>"."Hauteur total du silo:".$hsilo." cm"."<br>";
	$message .= "Hauteur du parti vide:".$tanklevel."cm <br>"."Pourcentage estime du silo est  ".$pourcentage."%";
	
         $header = "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         /*  send email*/
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
  /*send sms */
  /*$retvalphone = mail ($phone,$subject,$message,$header);
         
         if( $retvalphone == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }*/

}
   

?>
</body>
</html>