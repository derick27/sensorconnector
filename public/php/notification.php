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
$query ="select clients.prenom , courriel, silo_info.nom, macAdresse,tankLevels from silo_info , capteur_data ,clients where silo_info.clientId = clients.clientId and capteur_mac_adresse =macAdresse";
$myresults = mysqli_query($con,$query);
while ($row=mysqli_fetch_array($myresults)) {
	$subject = "Information sur silo";
	$to = $row ["courriel"];
	$message = "Tank level c'est: ";
	$message .= $row["tankLevels"];
	
         $header = "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
}
   /*$to = "dusheric03@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>I'm testing my mail</b>";
         $message .= "<h1>Thank you Eric Dushimiyiman.</h1>";
         
    
         $header = "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         } */

?>
</body>
</html>