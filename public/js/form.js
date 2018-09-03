//Function To Display Popup
function div_show() {
document.getElementById('clientform').style.display = "block";
}

//Function to Hide Popup
function div_hide(){
document.getElementById('clientform').style.display = "none";
}

//Function To Display Popup
function div_showCapteur() {
document.getElementById('capteurform').style.display = "block";
}
//Function to Hide Popup
function div_hideCapteur(){
document.getElementById('capteurform').style.display = "none";
}
//Function To Display Popup
function div_showSilo() {
document.getElementById('siloform').style.display = "block";
}
//Function to Hide Popup
function div_hideSilo(){
document.getElementById('siloform').style.display = "none";
}
//Function To Display Popup
function div_showSearch() {
document.getElementById('searchform').style.display = "block";
}
//Function to Hide Popup
function div_hideSearch(){
document.getElementById('searchform').style.display = "none";
}
function check_client(){
	var clientid = document.forms["clientform"]["clientid"].value;
	var prenom = document.forms["clientform"]["prenom"].value;
	var nom = document.forms["clientform"]["nom"].value;
	var youraddr = document.forms["clientform"]["youraddr"].value;
	var courriel = document.forms["clientform"]["courriel"].value;
	var telephone = document.forms["clientform"]["telephone"].value;
	if(clientid ==""){
		alert("Client ID est requis");
		return false;
	}
	if(prenom ==""){
		alert("Prenom est requis");
		return false;
	}
if(nom==""){
		alert("Nom  est requis");
		return false;
	}
	if(youraddr ==""){
		alert("Addresse est requis");
		return false;
	}
	if(courriel ==""){
		alert("Courriel est requis");
		return false;
	}
	if(telephone ==""){
		alert("Telephone  est requis");
		return false;
	}
	
}
function check_capteur(){
	 var macadresse = document.forms["capteurform"]["macadresse"].value;
	 var cmarque = document.forms["capteurform"]["cmarque"].value;
	 var cmodele = document.forms["capteurform"]["cmodele"].value;
	 var ctype = document.forms["capteurform"]["ctype"].value;
	 var fai = document.forms["capteurform"]["fai"].value;
	 var lot = document.forms["capteurform"]["lot"].value;
	 var initialisele = document.forms["capteurform"]["initialisele"].value;
	 var initialisea = document.forms["capteurform"]["initialisea"].value;
	 var initialisepar = document.forms["capteurform"]["initialisepar"].value;
	 var siloid = document.forms["capteurform"]["siloid"].value;
	 if(macadresse ==""){
	 	alert("MAC Adresse is requis");
	 	return false;
	 }
	 if(cmarque==""){
	 	alert("Marque is requis");
	 	return false;
	 }
	  if(cmodele ==""){
	 	alert("Modele is requis");
	 	return false;
	 }
	  if(ctype ==""){
	 	alert("Type is requis");
	 	return false;
	 }
	  if(fai==""){
	 	alert("F.A.I is requis");
	 	return false;
	 }
	  if(lot ==""){
	 	alert("Lot is requis");
	 	return false;
	 }
	  if(initialisele ==""){
	 	alert(" Initialise le is requis");
	 	return false;
	 }
	  if(initialisea ==""){
	 	alert("Entrer numero du client");
	 	return false;
	 }
	  if(initialisepar ==""){
	 	alert("votre nom is requis");
	 	return false;
	 }
	  if(siloid ==""){
	 	alert(" Silo ID is requis");
	 	return false;
	 }
}

function check_silo(){
 var siloid = document.forms["siloform"]["siloid"].value;
 var nom = document.forms["siloform"]["nom"].value;
 var contenu = document.forms["siloform"]["contenu"].value;
 var marque = document.forms["siloform"]["marque"].value;
 var stype = document.forms["siloform"]["stype"].value;
 var modele = document.forms["siloform"]["modele"].value;
 var serie = document.forms["siloform"]["serie"].value;
 var hducylindre = document.forms["siloform"]["hducylindre"].value;
 var dicylindre = document.forms["siloform"]["dicylindre"].value;
 var hducone = document.forms["siloform"]["hducone"].value;
 var pducone = document.forms["siloform"]["pducone"].value;
 var hglobal = document.forms["siloform"]["hglobal"].value;
 var capacite = document.forms["siloform"]["capacite"].value;
 var clientid = document.forms["siloform"]["clientid"].value;

 if(siloid ==""){
 	alert("Entrer Silo ID");
 	return false;
 }
 if(nom ==""){
 	alert("Entrer Nom");
 	return false;
 }
 if(contenu ==""){
 	alert("Entrer Contenu");
 	return false;
 }
 if(marque ==""){
 	alert("Entrer Marque");
 	return false;
 }
 if(stype ==""){
 	alert("Entrer Type");
 	return false;
 }
 if(modele ==""){
 	alert("Entrer  Modele");
 	return false;
 }
 if(serie ==""){
 	alert("Entrer # serie");
 	return false;
 }
 if(hducylindre ==""){
 	alert("Entrer  hauteur du cylindre");
 	return false;
 }
 if(dicylindre ==""){
 	alert("Entrer  diametre du cylindre");
 	return false;
 }
 if(hducone ==""){
 	alert("Entrer hauteur du cone");
 	return false;
 }
 if(pducone ==""){
 	alert("Entrer pente du cone");
 	return false;
 }
 if(hglobal ==""){
 	alert("Entrer hauteur global");
 	return false;
 }
 if(capacite ==""){
 	alert("Entrer capacite estimé");
 	return false;
 }
 if(clientid ==""){
 	alert("Entrer Client ID");
 	return false;
 }
}