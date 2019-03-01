function check_form(){
	var entreprise = document.forms["commande"]["entreprise"].value;
	var nom  = document.forms["commande"]["nom"].value;
	var adresse  = document.forms["commande"]["adresse"].value;
	var ville = document.forms["commande"]["ville"].value;
	var codepostal  = document.forms["commande"]["codepostal"].value;
	var codeformat =/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
	var telephone = document.forms["commande"]["telephone"].value;
	var date = document.forms["commande"]["date"].value;
	var reference = document.forms["commande"]["reference"].value;
	/*var page = document.forms["commande"]["page"].value;
	var numero = document.forms["commande"]["numero"].value;
	var quantite = document.forms["commande"]["quantite"].value;
	var piece = document.forms["commande"]["piece"].value;
	var fournisseur = document.forms["commande"]["fournisseur"].value;
	var description = document.forms["commande"]["description"].value;
	var prix = document.forms["commande"]["prix"].value;*/
	var com = document.forms["commande"]["com"].value;
	var comcourriel = document.forms["commande"]["comcourriel"].value;
	var courriel = document.forms["commande"]["courriel"].value;
	var re =/\D+/g;
    var cleanphone = telephone.replace(re,"");
	if(entreprise ==""){
		 document.getElementById("entErr").innerHTML="Nom d'entreprise est requis ";
		return false;
	}
	if( nom==""){
		 document.getElementById("nomErr").innerHTML="Nom  est requis ";
		return false;
	}
	if( adresse==""){
		 document.getElementById("adErr").innerHTML="Adresse est requis ";
		return false;
	}
	if( ville==""){
		 document.getElementById("viErr").innerHTML="Ville est requise ";
		return false;
	}
	if( codepostal==""){
		 document.getElementById("codeErr").innerHTML="Code Postal est requis ";
		return false;
	}
	if(!codepostal.match(codeformat)){
		 document.getElementById("codeErr").innerHTML="Code Postal n'est pas valide ";
		return false;
	}
	if( telephone==""){
		 document.getElementById("telErr").innerHTML="No de Téléphone  est requis ";
		return false;
	}
	if (cleanphone.length < 10  ){
		document.getElementById("telErr").innerHTML="No de Téléphone  est invalide ";
		return false;
	}
	
	if( date==""){
		 document.getElementById("datErr").innerHTML="Date est requis ";
		return false;
	}
	if( reference==""){
		 document.getElementById("refError").innerHTML="Reference est requis ";
		return false;
	}
	/*if(page ==""){
		 document.getElementById("pagErr").innerHTML="page ? ";
		return false;
	}
	if(numero ==""){
		 document.getElementById("numErr").innerHTML="# ? ";
		return false;
	}
	if(quantite ==""){
		 document.getElementById("quaErr").innerHTML="Quantite ? ";
		return false;
	}
	if(piece ==""){
		 document.getElementById("pieErr").innerHTML="Piece ? ";
		return false;
	}
	if(fournisseur ==""){
		 document.getElementById("fouErr").innerHTML="fournisseur ? ";
		return false;
	}
	if(description ==""){
		 document.getElementById("desErr").innerHTML="description ? ";
		return false;
	}
	if(prix ==""){
		 document.getElementById("priErr").innerHTML="Prix ? ";
		return false;
	}*/
	if(com ==""){
		 document.getElementById("comErr").innerHTML="Nom du commis est requis ";
		return false;
	}
	if(comcourriel ==""){
		 document.getElementById("comcouErr").innerHTML="Courriel du commis est requis ";
		return false;
	}
	if(document.commande.personne1.checked == false ){
		 document.getElementById("couErr").innerHTML="sélectionnez Johanne Baribeault ";
		return false;
	}
	if(document.commande.personne2.checked == false ){
		 document.getElementById("couErr").innerHTML="sélectionnez Éve Tremblay-Provost ";
		return false;
	}

}
//Function To Display Popup
function div_show() {
document.getElementById('clientform').style.display = "block";
}

//Function to Hide Popup
function div_hide(){
document.getElementById('clientform').style.display = "none";
}
function chek_account(){
	var entreprise1 = document.forms["accountform"]["entreprise1"].value;
	var nom1 = document.forms["accountform"]["nom1"].value;
	var adresse1 = document.forms["accountform"]["adresse1"].value;
	var ville1 = document.forms["accountform"]["ville1"].value;
	var codepostal1 = document.forms["accountform"]["codepostal1"].value;
	var telephone1 = document.forms["accountform"]["telephone1"].value;
	var date1 = document.forms["accountform"]["date1"].value;
	if(entreprise1==""){
		document.getElementById("entErr1").innerHTML=" est requis";
		return false;
	}
	if(nom1==""){
		document.getElementById("nomErr1").innerHTML=" est requis";
		return false;
	}
	if(adresse1==""){
		document.getElementById("adrErr1").innerHTML=" est requise";
		return false;
	}
	if(ville1==""){
		document.getElementById("vilErr1").innerHTML=" est requis";
		return false;
	}
	if(codepostal1==""){
		document.getElementById("codErr1").innerHTML=" est requis";
		return false;
	}
	if(telephone1==""){
		document.getElementById("telErr1").innerHTML=" est requis";
		return false;
	}
	if(date1==""){
		document.getElementById("datErr1").innerHTML=" est requise";
		return false;
	}
	if(document.accountform.personne11.checked == false){
		 document.getElementById("couErr1").innerHTML="Selecter Johanne Baribeault ";
		return false;
	}
	if(document.accountform.personne22.checked == false){
		 document.getElementById("couErr1").innerHTML="Selecter Eve Tremblay Provost ";
		return false;
	}
}