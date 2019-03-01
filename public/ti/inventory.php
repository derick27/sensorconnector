<!DOCTYPE html>
<html>
<head>
	 <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Inventory</title>
  <link rel="shortcut icon" type="image/png" href="images/logo.png">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/inventory.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/inventory.js"></script>
    <script type="text/javascript" src="js/validateForm.js"></script>
</head>
<body>
  <div class="container">
 <div class="jumbotron">
    <h1>Notre Inventaire service informatique</h1>      
  </div>
   <button type="button" id="scanOut" style="background: linear-gradient(to bottom, white, #808080);"> Add a new Item</button>
  <button type="button" id="scanIn" style=" background: linear-gradient(to top, white, #808080);">Scan out an Item</button>

  <div class="row" id="addItem"> 
    <h2> Add a new Item to the inventory</h2>
    <table>
 <form name="addnewitem" action="newitem.php" method="post" onsubmit="return check_form()">
  <tr><td>Serial Number</td><td><input type="text" name="serialn" placeholder="Scan in  a new item" style="width:200px;"></td>
    <td><span id="sn" style="color: red;"></span></td>
  </tr>
 <tr> <td >Category</td><td><select style="width:200px;" name="category">
   <option value="" hidden>Choose category</option>
    <option> Cartouche</option>
    <option> Unit&eacute; d&rsquo; imagerie</option>
  </select></td>
  <td><span id="cat" style="color: red;"></span></td>
</tr>
  <tr><td>Model</td>
    <td><select style="width:200px;" name="model">
    <option value="" hidden>Select model</option>
    <option>10N0202</option>
    <option>2975B001</option>
    <option>40X0453</option>
    <option>40X4540</option>
    <option>40X4724</option>
    <option>40X4769</option>
    <option>40X6247</option>
    <option>40X7593</option>
    <option>40X7713</option>
    <option>40X7743</option>
    <option>40X8420</option>
    <option>40X8443</option>
    <option>40X8736</option>
    <option>500ZA</option>
    <option>50F0Z00</option>
    <option>520Z</option>
    <option>845-462-IPW</option>
    <option>845-5HA-IPW</option>
    <option>845-650-IPW</option>
    <option>845-735-IPW</option>
    <option>845-H11-IPW</option>
    <option>B5L37A</option>
    <option>BCI-24 COLOR</option>
    <option>C2P05AN140</option>
    <option>C2P05AN140</option>
    <option>CE52567901BB</option>
    <option>CF287X</option>
    <option>CF410X</option>
    <option>CF411X</option>
    <option>CF412X</option>
    <option>CF413X</option>
    <option>DPC14DN</option>
    <option>E250A11A</option>
    <option>E260X22G</option>
    <option>GPR-18</option>
    <option>LU8233001</option>
    <option>Q2613A</option>
    <option>R1PO-236X984</option>
    <option>RAM1025B</option>
    <option>RAM1200X2</option>
    <option>RAM13202</option>
    <option>RAM20152</option>
    <option>RAM2015X2</option>
    <option>RAM20352</option>
    <option>RAM2055X2</option>
    <option>RAM2055X2</option>
    <option>RAM23002</option>
    <option>RAM3005X2</option>
    <option>RAM3015X2</option>
    <option>RAM3525B</option>
    <option>RAM363800B</option>
    <option>RAM3800C</option>
    <option>RAM3800M</option>
    <option>RAM42002</option>
    <option>RAM4250X2</option>
    <option>RAM81002</option>
    <option>RAMDR360</option>
    <option>RAMDR510</option>
    <option>RAMDR620</option>
    <option>RAME3502</option>
    <option>RAME4602</option>
    <option>RAMM401X2</option>
    <option>RAMMS7102</option>
    <option>RAMMS8112</option>
    <option>RAMMX4102</option>
    <option>RAMMX7102</option>
    <option>RAMMX8102</option>
    <option>RAMP30152</option>
    <option>RAMTN350</option>
    <option>RAMTN360</option>
    <option>RAMTN650</option>
    <option>RAMX3642</option>
    <option>T-170F</option>
    <option>T060120S</option>
    <option>T060220S</option>
    <option>T060320S</option>
    <option>T060420S</option>
    <option>TN570</option>
    <option>X340H11G</option>
    <option>X340H22G</option>
    <option>X651H11A</option>
    <option>ZB4156162001</option>
    <option>ZEB05586GS06407</option>
  </select></td>
  <td><span id="mod" style="color: red;"></span></td>
  </tr>
   <tr><td></td><td><button type="submit">Submit</button></td></tr>
</form>
</table>
  </div> <!-- end row div -->
 
  <div class="row" id="removeItem"> 
    <h2> Scan out Item from inventory </h2>
    <table >
 <form name="removeitem" action="remove.php" method="post" onsubmit="return check_removeform()">
  <tr>
    <td>Serial number</td>
    <td> <input type="text" name="serialnumber" style="width:200px;" placeholder="Serial Number"></td>
  </tr>
   <tr>
    <td>Category:</td>
    <td><select style="width:200px;" name="categories">
      <option value="" hidden>Choose category</option>
      <option> Cartouche</option>
    <option> Unit&eacute; d&rsquo; imagerie</option>
    </select></td>
  </tr>
   <tr>
    <td> Model:</td>
    <td><select style="width:200px;" name="models">
  <option value="" hidden>select model</option>
    <option>10N0202</option>
    <option>2975B001</option>
    <option>40X0453</option>
    <option>40X4540</option>
    <option>40X4724</option>
    <option>40X4769</option>
    <option>40X6247</option>
    <option>40X7593</option>
    <option>40X7713</option>
    <option>40X7743</option>
    <option>40X8420</option>
    <option>40X8443</option>
    <option>40X8736</option>
    <option>500ZA</option>
    <option>50F0Z00</option>
    <option>520Z</option>
    <option>845-462-IPW</option>
    <option>845-5HA-IPW</option>
    <option>845-650-IPW</option>
    <option>845-735-IPW</option>
    <option>845-H11-IPW</option>
    <option>B5L37A</option>
    <option>BCI-24 COLOR</option>
    <option>C2P05AN140</option>
    <option>C2P05AN140</option>
    <option>CE52567901BB</option>
    <option>CF287X</option>
    <option>CF410X</option>
    <option>CF411X</option>
    <option>CF412X</option>
    <option>CF413X</option>
    <option>DPC14DN</option>
    <option>E250A11A</option>
    <option>E260X22G</option>
    <option>GPR-18</option>
    <option>LU8233001</option>
    <option>Q2613A</option>
    <option>R1PO-236X984</option>
    <option>RAM1025B</option>
    <option>RAM1200X2</option>
    <option>RAM13202</option>
    <option>RAM20152</option>
    <option>RAM2015X2</option>
    <option>RAM20352</option>
    <option>RAM2055X2</option>
    <option>RAM2055X2</option>
    <option>RAM23002</option>
    <option>RAM3005X2</option>
    <option>RAM3015X2</option>
    <option>RAM3525B</option>
    <option>RAM363800B</option>
    <option>RAM3800C</option>
    <option>RAM3800M</option>
    <option>RAM42002</option>
    <option>RAM4250X2</option>
    <option>RAM81002</option>
    <option>RAMDR360</option>
    <option>RAMDR510</option>
    <option>RAMDR620</option>
    <option>RAME3502</option>
    <option>RAME4602</option>
    <option>RAMM401X2</option>
    <option>RAMMS7102</option>
    <option>RAMMS8112</option>
    <option>RAMMX4102</option>
    <option>RAMMX7102</option>
    <option>RAMMX8102</option>
    <option>RAMP30152</option>
    <option>RAMTN350</option>
    <option>RAMTN360</option>
    <option>RAMTN650</option>
    <option>RAMX3642</option>
    <option>T-170F</option>
    <option>T060120S</option>
    <option>T060220S</option>
    <option>T060320S</option>
    <option>T060420S</option>
    <option>TN570</option>
    <option>X340H11G</option>
    <option>X340H22G</option>
    <option>X651H11A</option>
    <option>ZB4156162001</option>
    <option>ZEB05586GS06407</option>

    </select></td>
  </tr>
   <tr>
    <td>Location</td>
    <td><select style="width:200px;" name="location">
      <option value="" hidden>Select location</option>
    <option value="4880" >4880</option>
    <option value="15100" > 15100</option>
    <option value="Meunerie" >Meunerie </option>
    <option value="Celubec" >C&eacute;lubec</option>
    <option value="CASH" >CASH </option>
    <option value="GSPA" >GSPA </option>
    <option value="GSSD" >GSSD</option>
    <option value="GSSB" >GSSB</option>
    <option value="GSNO" >GSNO</option>
    <option value="GSRO" >GSRO</option>
    <option value="GSPR" >GSPR</option>
    <option value="Q.St-Barnabe" >Q.St-Barnabé</option>
    <option value="Q.St-Denis" >Q.St-Denis</option>
    <option value="Q.St-Hyacinthe" >Q.St-Hyacinthe</option>
    <option value="Q.St-Nazaire" >Q.St-Nazaire</option>
    <option value="Q.St-Ours" >Q.St-Ours</option>
    <option value="Q. Vercheres" >Q.Verch&egrave;res</option>
    <option value="Ferme de recherche" >Ferme de recherche</option>
    <option value="CVCM St-Denis" >CVCM St-Denis</option>
    <option value="CVCM St-Hugues" >CVCM St-Hugues</option>
    <option value="CVCM Saint-Hyacinthe" >CVCM Saint-Hyacinthe</option>
    </select></td>
  </tr>
   <tr>
    <td>Person:</td>
    <td><input type="text" name="Person" style="width:200px;"></td>
  </tr>
   <tr>
    <td></td><td><button type="submit" id="submit">Submit</button></td></tr>
</form>
</table>
  </div> <!-- end row div -->
    
  </div>  <!-- end container div -->
  


<script type="text/javascript">
  $("#scanIn").click(function(){
        $("#removeItem").toggle();
    });
  $("#scanOut").click(function(){
        $("#addItem").toggle();
    });
</script>
</body>
</html>