<html> <!-- start html -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class Master{
 public function getBootstrap(){ ?>
<head><!--start head -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Silo Connecte</title>
         <link rel="shortcut icon" type="image/png" href="../images/logo.png">
         <link rel="stylesheet" type="text/css" href="../css4/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/master.css">

    
</head> <!--end head -->

<?php } //end gethead function()

 public function getHead(){ ?>
<div class="jumbotron jumbotron-fluid">
<div class="container">
<h1>La Coop Comax</h1>
<p>silo Connecté</p>
</div>
</div>
<?php }//end getHead
public function getFooter(){ ?>
<script type="text/javascript" src="../scripts/jquery.min.js"></script>
<script type="text/javascript" src="../scripts/bootstrap/js/bootstrap.min.js"></script>
<div id="divFooter" class="footerArea"> <!-- start divFooter --> 

        <div class="divPanel"> <!-- start divPanel -->

            
             <!-- Copyright -->
    <div class="footer-copyright">© 2018 Copyright: La Coop Comax Silo connecté
     
    </div>
    <!-- Copyright -->

        </div> <!-- end divPanel -->
    </div> <!-- end divFooter --> 
<?php } //end getFooter() function 
    }//end a class?>


 <?php 
  //$obj = new Master();
  //$obj->getBootstrap();
  //$obj->getHead();
 ?>
	<body><!-- start body-->

	</body><!--end body -->
	<?php
	//$footer = new Master();
	//$footer->getFooter(); 
	?>

</html><!-- end html -->