<!DOCTYPE html>
<html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
class Forms{ /*start class forms */
	public function getHead(){ ?> 
<head>
	<title>SYMAC</title>
  <link rel="shortcut icon" type="image/png" href="images/logo.png">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/table.js"></script>
     <script type="text/javascript" src="js/formvalidation.js"></script>
   <script type="text/javascript">

function showCommandeTable() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else document.getElementById('ifYes').style.display = 'none';

}
</script>
</head>

<?php } /*end getHead function() */
}/*end class forms */
?>
<?php 
$head = new Forms();
$title ="Symac";
$head->getHead();
 ?>
<body>
	
<div class="jumbotron jumbotron-fluid"> <!-- start jumbotron div -->
  <div class="container-fuid"> <!-- start conatainer div -->
  	<div class="row"> <!-- start row div -->
  		<div class="col-sm-4"> <!-- start col-sm-4 div -->
    <img src="logo.png">
    </div> <!-- end col-sm-4 div -->
      <div class="col-sm-4"> <!-- start col-sm-4 div -->
    <h2 style="color:#800000;">Groupe SYMAC </h2> 
    <h2 style="color:#800000;">Rougemont</h2>
    </div> <!-- end col-sm-4 div -->
       <div class="col-sm-4"> <!-- start col-sm-4 div -->
  
    </div> <!-- end col-sm-4 div -->
    </div><!-- end row div -->
  </div> <!-- end conatainer div -->
</div> <!-- end jumbotron div -->

<div class="conatainer"> <!-- start conatainer div -->
	<div class="row" style="background-color:#800000;color:white; text-align:center;height: 50px;">
		<div class="col-sm-4">
      
</div>
		
		<div class="col-sm-4" style="margin-left:10%;"> 
			<!-- <button type="button" class="btn btn-danger" onclick="div_show()">Créer un compte</button> -->
		</div>
		</div> <!-- end row class -->
<form action="receiveforms.php" class ="form" id="form" method="post" name="commande" onsubmit="return check_form()">
  <font color="#800000" size="6" >Type de commande:</font><strong> Commande client </strong>
   <input type="radio" onclick="javascript:showCommandeTable();" name="yesno" id="yesCheck" checked> 
      <strong>Création de compte</strong> <input type="radio" onclick="javascript:showCommandeTable();" name="yesno" id="noCheck">
 
	<table style="margin-top:10px" >
	<tbody>
	<tr >
      <td style="width:20%;"> Entreprise:</td><td><input type="text"  id="entreprise"  name="entreprise" value="<?php if(isset($_POST['entreprise'])) echo $_POST['entreprise']; ?>">
       </td> <td><span id="entErr" style="color: red;">*</span></td>
  </tr>
  <tr>
      <td>Nom:</td><td><input type="text"  id="nom"  name="nom"></td>
      <td><span id="nomErr" style="color: red;">*</span></td>
  </tr>
  <tr>
      <td>Adresse:</td><td><input type="text"  id="adresse"  name="adresse"></td>
      <td><span id="adErr" style="color: red;">*</span></td>
   </tr>
   <tr>
      <td>Ville:</td><td><input type="text"  id="ville"  name="ville"></td>
      <td><span id="viErr" style="color: red;">*</span></td>
   </tr>
    <tr>
      <td>Code Postal:</td><td><input type="text"  id="codepostal"  name="codepostal"></td>
      <td><span id="codeErr" style="color: red;">*</span></td>
    </tr>
    <tr>
      <td>No de Téléphone:</td><td><input type="text"  id="telephone"  name="telephone"></td>
      <td><span id="telErr" style="color: red;">*</span></td>
     </tr>
     <tr>
      <td>Date:</td><td><input type="text"  id="date"  name="date" placeholder="YYYY-MM-DD" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY-MM-DD" ></td>
      <td><span id="datErr" style="color: red;">*</span></td>
      </tr>
      <tr>
      <td>Référence:</td><td><input type="text"  id="reference"  name="reference"></td>
      <td><span id="refError" style="color: red;">*</span></td>
      </tr>
      <tr>
      <td>Status:</td><td><div class="form-check-inline">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Regulier" checked>Régulier 
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Urgent">Urgent
      </label></td>
      <td><span id="stErr" style="color: red;">*</span></td>
      </tr>
    </tbody>
    </table> <!--end first table -->

    
 
 <div class="row" id="ifYes" style="display: block;"><!-- start show table div -->	
	<TABLE id="dataTable" >
		<thead style="background-color:#800000;color:white;">
                    <tr>
                    	<th></th>
                        <th>No</th>
                        <th>Page</th>
                        <th>#</th>
                        <th>Quantité</th>
                        <th>Numéro Pièce</th>
                        <th>Fournisseur</th>
                        <th>Description</th>
                        <th>Prix/ch</th>
                       
                    </tr>
                </thead>
		<TR>
			<TD><INPUT type="checkbox" name="chk"/></TD>
			<TD> 1 </TD>
			<TD style ="text-align: center;"> <INPUT type="text" id="page"  name="page" /><span id="pagErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="numero"  name="numero" /><span id="numErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="quantite"  name="quantite" /><span id="quaErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="piece"  name="piece" /><span id="pieErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="fournisseur"  name="fournisseur" /><span id="fouErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="description"  name="description" /><span id="desErr" style="color: red;">*</span> </TD>
			<TD> <INPUT type="text" id="prix"  name="prix" /> <span id="priErr" style="color: red;">*</span> </TD>
		</TR>
    </table> <!-- end second table -->
    <INPUT type="button" value="Ajouter une ligne" style="background-color:#800000; color:white;margin-bottom:5px;" onclick="addRow('dataTable')" />
     <INPUT type="button" value="Suprimer la ligne" style="background-color:#800000; color:white;margin-bottom:5px;" onclick="deleteRow('dataTable')" />
    
    <table>
    	<tbody>
    		<tr>
    			<td>Status:</td>
    			<td>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="commisstatus" value="Journalière" checked>Journalière 
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="commisstatus" value="Hebdomadaire">Hebdomadaire
      </label>
    			</td>
    			<td><span id="" style="color: red;">*</span></td>
    		</tr>
      </tbody>
    </table>
    </div> <!-- end show table div -->
     <table>
      <tbody>
    		<tr>
    			<td>Commis :</td> <TD> <INPUT type="text" id="com"  name="com" /> </TD>
    			<td><span id="comErr" style="color: red;">*</span></td> </tr>
          <tr>
          <td>Courriel :</td> <TD> <INPUT type="text" id="comcourriel"  name="comcourriel" placeholder="Le préfixe pour le courriel" /> </TD>
          <td>@groupesymac.com</td>
          <td><span id="comcouErr" style="color: red;">*</span></td> </tr>

    		<tr><td></td> 
    			<td>
    				Envoyer à: <span id="couErr" style="color: red;">*</span><br>
    <div class="form-check">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="personne1" value="jbaribeault@comax.qc.ca">Johanne Baribeault
      </label><br>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="check2">
        <input type="checkbox" class="form-check-input" id="check2" name="personne2" value="etremblay-provost@comax.qc.ca">Éve Tremblay-Provost
      </label><br>
    </div>

    Autre:<input type="text"  id="courriel"  name="courriel" placeholder=" Le préfixe pour le courriel " style="width:100%;">
    
    		   </td> <td> <br>  <br>  <br> <br> @groupesymac.com</td>   </tr>

    	</tbody>
    </table><br>
    <button type="submit" name="register-user" style="width: 200px;background-color:#800000; margin-left:5%;color: white;border:2px solid gray;
border-radius:10px;" >Envoyer le formulaire</button>
 <button type="button"  name="annuler"  onclick="div_show()" style="width: 200px;background-color:#800000; margin-left:5%;color: white;border:2px solid gray;
border-radius:10px;" >Annuler</button> 

  </form> <!-- end  form -->
 
</div><!-- end conatainer div -->

<!-- **********************************New client************************************************************-->
<div id="clientform"> <!--  start div for client form-->
<div id="popupclient"> <!-- Popup Div Starts Here -->
<!--  start client form Form -->
<form action="gssh.php" class ="accountform" id="form" method="post" name="accountform" 
style="width:500px;
min-width:250px;
padding:10px 50px;
border:2px solid gray;
border-radius:0px;
font-family:raleway;
background-color:#fff;" onsubmit="return chek_account()">

<h5>Voulez-vous annuler?</h5>
<hr>
<button type="button" class="btn btn-primary" style="margin-left: 100px;margin-top:5px; background-color:#800000;">
  <a href="http://informations.comax.qc.ca/" style="color: white;text-decoration: none;" >Oui </a></button >
<button type="button"  class="btn btn-primary" style="background-color: #800000;color: white;margin-top:5px;" onclick ="div_hide()">No</button>
</form><!--  end client form Form -->
</div> <!-- end Popup Div  for client -->

</div> <!--  end div for client form-->
<!-- ***********************************end  new client*************************************************************-->

    
    
</body>
</html>