<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comax</title>
        <base href="{{URL:: asset('/')}}" target="_blank">
         <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap-responsive.min.css')}}">
         <link rel="stylesheet" type="text/css" href="{{url('css/mystyle.css')}}">
         <link rel="stylesheet" type="text/css" href="{{url('css/form.css')}}">
         <link rel="stylesheet" type="text/css" href="{{url('scripts/fontawesome/css/font-awesome.min.css')}}">
         <script type="text/javascript" src="{{url('js/form.js')}}"></script>
        
         </head>
        
       <body id="pageBody">

<div id="divBoxed" class="container-fluid">

    <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

    <div class="divPanel notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="index.html" id="divSiteTitle">La Coop Comax</a><br />
                        <a href="index.html" id="divTagLine">Silo Connect</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                    <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            MENU <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a onclick="div_show()">Client</a></li>
                            <li><a onclick="div_showCapteur()">Capteur</a></li>
                            <li><a onclick="div_showSilo()">Silo</a></li>
                            <li><a onclick="div_showSearch()">Rechercher</a></li>
                            </ul>
                            </div>
                    </div>
                    </div>

                </div>
            </div>

    </div>

    <div class="contentArea">

        <div class="divPanel notop page-content">
            

            <div class="row-fluid">
            <!--Edit Main Content Area here-->
                <div class="span12" id="divMain">
                    
                    
    <div class="row-fluid">
    <div class="span3">
            <div class="box">
                
            </div>
    </div> 
        
    <div class="span3">
            <div class="box">
                
            </div>
    </div> 
        
    <div class="span3">
            <div class="box">
                
            </div>
    </div> 
        
    <div class="span3">
            <div class="box">
                
            </div>
    </div>   
</div>
                    

    

                </div>
            <!--End Main Content-->
            </div>

            <div id="footerInnerSeparator"></div>
        </div>
    </div>

    <div id="footerOuterSeparator"></div>

    <div id="divFooter" class="footerArea">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span3" id="footerArea1">
                
                    <h3></h3>


                </div>
                <div class="span3" id="footerArea2">

                    <h3></h3> 
                    

                </div>
                <div class="span3" id="footerArea3">

                    

                </div>
                <div class="span3" id="footerArea4">

                    <h3></h3>  
                                                               
                   

                </div>
            </div>


        </div>
    </div>
</div>

<!-- **********************************New client************************************************************-->
<div id="clientform"> <!--  start div for client form-->
<div id="popupclient"> <!-- Popup Div Starts Here -->
<!--  start client form Form -->

<form action="{{url('php/client.php')}}" class ="clientform" id="form" method="post" name="clientform" onsubmit="return check_client()">
<button type="button" id="close" style="background-color: red;" onclick ="div_hide()">x</button>
<h4>Enregistrer un nouveau client</h4>
<hr>
 <label for="clientId" class="clientid" > Client ID:</label>
<input type="text" class="form-control" id="client_id" name="clientid" placeholder="Numero du client">
<label for="prenom" class="input_form">Pr&eacute;nom:</label>
<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
<label for="nom" class="input_form">Nom:</label>
<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
<label for="addresse" class="input_form">Adresse:</label>
<input type="text" class="form-control" id="youraddr" name="youraddr" placeholder="Addresse">
<label for="Courriel" class="input_form">Courriel:</label>
<input type="text" class="form-control" id="courriel" name="courriel" placeholder="Courriel">
<label for="telephone" class="input_form">T&eacute;l&eacute;phone:</label>
<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
<button type="submit" class="btn btn-primary" style="margin-left: 200px;">Enregistrer</button >
</form><!--  end client form Form -->
</div> <!-- end Popup Div  for client -->

</div> <!--  end div for client form-->
<!-- ***********************************end  new client*************************************************************-->

<div id="capteurform"> <!--  start div for client form-->
<div id="popupcapteur"> <!-- Popup Div Starts Here -->
<!--  start client form Form -->

<form action="{{url('php/capteur.php')}}" class ="capteurform" id="form" method="post" name="capteurform" onsubmit="return check_capteur()">
<button type="button" id="close" style="background-color: red;" onclick ="div_hideCapteur()">x</button>
<h4>Enregistrer un Capteur</h4>
<hr>
<label for="cserie" class="input_form">MAC Adresse </label>
<input type="text" class="form-control" id="macadresse" name="macadresse" placeholder="MAC Adresse">
 <label for="cmarque" class="input_form"> Marque</label>
<input type="text" class="form-control" id="cmarque" name="cmarque" placeholder=" Marque">
<label for="cmodele" class="input_form">Mod&eacute;le</label>
<input type="text" class="form-control" id="cmodele" name="cmodele" placeholder="Modele">
<label for="ctype" class="input_form">Type</label>
<input type="text" class="form-control" id="ctype" name="ctype" placeholder="Type">
<label for="fai" class="input_form">F.A.I</label>
<input type="text" class="form-control" id="fai" name="fai" placeholder="F.A.I">
<label for="lot" class="input_form">Lot</label>
<input type="text" class="form-control" id="lot" name="lot" placeholder="Lot">
<label for="initialisele" class="input_form">Initialis&eacute; le</label>
<input type="text" class="form-control" id="initialisele" name="initialisele" placeholder=" Initialisé le">
<label for="initialisea" class="input_form">Initialis&eacute; &agrave;(client ID)</label>
<input type="text" class="form-control" id="initialisea" name="initialisea" placeholder=" client ID">
<label for="initialisepar" class="input_form">Initialis&eacute; par</label>
<input type="text" class="form-control" id="initialisepar" name="initialisepar" placeholder=" Initialisé par">
<label for="siloid" class="clientid"> Silo ID</label>
<input type="text" class="form-control" id="siloid" name="siloid" placeholder=" Silo ID">
<button type="submit" class="btn btn-primary" style="margin-left: 200px;">Enregistrer</button>
</form><!--  end client form Form -->
</div> <!-- end Popup Div  for client -->

</div> <!--  end div for client form-->
<!-- ***********************************end  new capteur*************************************************************-->
<div id="siloform"> <!--  start div for client form-->
<div id="popupsilo"> <!-- Popup Div Starts Here -->
<!--  start client form Form -->

<form action="{{url('php/silo.php')}}" class ="siloform" id="form" method="post" name="siloform" onsubmit="return check_silo()">
<button type="button" id="close" style="background-color: red;" onclick ="div_hideSilo()">x</button>
<h4>Enregistrer un Silo</h4>
<hr>
 <label for="siloid" class="input_form"> Silo ID</label>
<input type="text" class="form-control" id="siloid" name="siloid" placeholder=" Silo ID">
<label for="nom" class="input_form">Nom</label>
<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom ">
<label for="contenu" class="input_form">Contenu</label>
<input type="text" class="form-control" id="contenu" name="contenu" placeholder="Contenu ">
<label for="marque" class="input_form">Marque</label>
<input type="text" class="form-control" id="marque" name="marque" placeholder="Marque ">
<label for="type" class="input_form">Type</label>
<input type="text" class="form-control" id="stype" name="stype" placeholder="Type">
<label for="modele" class="input_form">Mod&eacute;le</label>
<input type="text" class="form-control" id="modele" name="modele" placeholder=" Modele">
<label for="serie" class="clientid"> &#35; s&eacute;rie</label>
<input type="text" class="form-control" id="serie" name="serie" placeholder="# serie ">
<label for="hducylindre" class="input_form">Hauteur du cylindre</label>
<input type="text" class="form-control" id="hducylindre" name="hducylindre" placeholder=" Hauteur du cylindre ">
<label for="dicylindre" class="input_form">Diam&egrave;tre du cylindre</label>
<input type="text" class="form-control" id="dicyclindre" name="dicylindre" placeholder=" Diametre du cylindre ">
<label for="hducone" class="input_form">Hauteur du c&ocirc;ne</label>
<input type="text" class="form-control" id="hducone" name="hducone" placeholder=" Hauteur du cone">
<label for="pducone" class="input_form">Pente du c&ocirc;ne</label>
<input type="text" class="form-control" id="pducone" name="pducone" placeholder="Pente du cone">
<label for="hglobal" class="input_form">Hauteur globale</label>
<input type="text" class="form-control" id="hglobal" name="hglobal" placeholder="Hauteur globale ">
<label for="capacite" class="input_form">Capacit&eacute; estim&eacute;e</label>
<input type="text" class="form-control" id="capacite" name="capacite" placeholder="Capacite estimé ">
<label for="clientid" class="input_form">Numero du client</label>
<input type="text" class="form-control" id="clientid" name="clientid" placeholder="Numero du client">
<button type="submit" class="btn btn-primary" style="margin-left: 200px;">Enregistrer</button >
</form><!--  end client form Form -->
</div> <!-- end Popup Div  for client -->

</div> <!--  end div for client form-->
<!-- ***********************************end  new silo*************************************************************-->
<div id="searchform"> <!--  start div for client form-->
<div id="popupsearch"> <!-- Popup Div Starts Here -->
<!--  start client form Form -->

<form action="{{url('php/test.php')}}" class ="searchform" id="form" method="post" name="searchform" onsubmit="return check_empty()">
<button type="button" id="close" style="background-color: red;" onclick ="div_hideSearch()">x</button>
<h4> Rechercher les information du Silo</h4>
<hr>
 <div class="form-group">
<label for="client">Client:</label>
<select class="selectpicker" style="width:220px;">
  <option>select one</option>
  <option>3</option>
  <option>2</option>
</select>
    </div>
    <div class="form-group">
        <label for="client">De:</label>
      <input type="text" name="input" placeholder="YYYY-MM-DD" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY/MM/DD"/>
      
    </div>
       <div class="form-group">
        <label for="client">A:</label>
   <input type="text" name="input" placeholder="YYYY-MM-DD" required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter a date in this format YYYY/MM/DD"/>
</div>
<button type="submit" class="btn btn-primary" style="margin-left: 200px;">Search</button placeholder="">
</form><!--  end client form Form -->
</div> <!-- end Popup Div  for client -->

</div> <!--  end div for client form-->
<!-- ***********************************end  new search*************************************************************-->

<script type="text/javascript" src="{{url('scripts/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('scripts/bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>
