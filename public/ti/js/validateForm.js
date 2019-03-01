function check_form(){
	var serialn =document.forms["addnewitem"]["serialn"].value;	
	var category = document.forms["addnewitem"]["category"].value;
	var model = document.forms["addnewitem"] ["model"].value;
	if (serialn!="") {
        document.getElementById("sn").innerHTML="";
        
    } 
    else if (serialn=="") {
        document.getElementById("sn").innerHTML="Please enter SN ";
        return false;
    } 
    if (category=="") {
        document.getElementById("cat").innerHTML="Please choose a category ";
        return false;
    } 
    else if (category!="") {
        document.getElementById("cat").innerHTML=" ";
       
    } 
    if (model=="") {
        document.getElementById("mod").innerHTML="Please choose a model ";
        return false;
    } 
    else if (model!="") {
        document.getElementById("mod").innerHTML=" ";
       
    } 
}

function check_removeform(){
	var serialnumber = document.forms["removeitem"]["serialnumber"].value;
}