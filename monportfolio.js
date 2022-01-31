

 function texte(){
 	let mytext= document.querySelector('#presentation1 p').innerHTML;
 	document.querySelector('#presentation1 p').innerHTML = "";
 	let myarray = mytext.split("");
 	let timelooper;
 	  
 	function loop(){
 		if(myarray.length>0){
 			document.querySelector('#presentation1 p').innerHTML += myarray.shift();

 		}else {
 			cleartimeout(timelooper);
 		}
 		 timelooper = setTimeout(loop,50);
 	}

 	loop();

 }
/* les images du portfolio */ 
function show( source){
	document.querySelector("#realsize").src = source.src;
	document.querySelector ("#legend").innerHTML = source.title;


}

/* vérification des champs du formulaire */
function emailInvalide(email) { 
	let i = email.indexOf ("@"); /* envoie le premier élément pour lequel on trouve un donné dans un tableau. Si l'élément recherché n'est pas présent
	 dans le tableau, la méthode renverra -1.*/
	if (i<1)
		return true;
	if (i!= lastindexOf ("@")) /* 'canal'.lastIndexOf('a');     // renvoie 3 si 
	i  est different du dernier indice @ trouvé */
		return true;
	let droite = emal.split ("@")[1];/* la chaine à droite de @ à gauche c'est  (" @ ")[0] */
	i = droite.lastindexOf (".");
	if ( i == -1)
		return true;
	droite = droite.substring(i);
	if (droite.length<3)
		return true;

	return false;
	

}


function verifier(){
	let nomElt = document.querySelector('#nom');
	let nom = nomElt.value.trim();
	if (nom.length ==0) {
		nomElt.value = "";
		nomElt.focus();
		alert ("nom invalide veuillez insérer votre nom");
		return false;
	}
	let prenomElt = document.querySelector('#prenom');
	let prenom = prenomElt.value.trim();
	if (prenom.length ==0) {
		prenomElt.value ="";
		nomElt .focus();
		alert ("prénom invalide veuillez insérer votre prénom");
		return false;
	}
	let emailElt = document.querySelector ("#email");
	let email = emailElt.value.trim();
	if (email.length ==0 || emailInvalide(email)){
		emailElt.value =email;
		emailElt.focus();
		alert ("email invalide veuillez insérer votre email");

	}
	let sujetElt = document.querySelector("#sujet");
	let sujet = sujetElt.value.trim();
	if (sujet.length ==0){ 
		sujetElt.value = "";
		sujetElt.focus();
		alert ("veuillez introduire l'objet de votre message");
		return false;

	}

return true;

}

 