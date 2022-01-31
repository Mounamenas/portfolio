<?php
include("include/_connexion.php");
    /* login = login, mdp = mdp */
	
	$login = "";
	$mdp = "";
	$msg ="";
	if(isset($_POST['validelogin'])) {
		if(isset($_POST['login']))
			$login = $_POST['login'];
		if(isset($_POST['mdp']))
			$mdp = $_POST['mdp'];
	} 
	if(isset($_POST['Deco'])){
		unset($_SESSION['login']);
	}
	else {
	    if(isset($_SESSION['login']))
		  $checklogin = $_SESSION['login'];
	    else
		  $checklogin = false;
        // A peaufiner sur le plan sécurité ... ca pique un peu!
	    //echo password_hash("admin12", PASSWORD_DEFAULT);
	    if(isset($_POST['validelogin'])){
	    	$userExiste = $bdd->query("SELECT * FROM utilisateur WHERE id_utilisateur = '$login'")->fetch();
	    	if (!$userExiste) {
	    		$msg = "L'utilisateur n'éxiste pas";
	    		/*echo "L'utilisateur n'éxiste pas";*/
	    	}

	    	else{
	    		if (!password_verify($mdp, $userExiste["mdp"])) {
	    			$msg = " Mot de passe incorrect";
	    			/*echo "le mot de passe est incorrect";*/
	    		}
	    		else{
	    			/*$msg ="Bonjour utilisateur $login <BR/>\n";*/
	    			 echo "Bonjour utilisateur $login <BR/>\n";
					  $checklogin=true;
					  $_SESSION['login'] = true;
	    		}
	    	}	

	    }
	    }
		 
        if(!$checklogin) {
?>
	<h3> Espace adminstrateur </h3>
	
	<form id ='form1' method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
		<label>Identifiant :</label> <input type="text" name='login'/>
		<label> Mot de passe :</label> <input type="password" name='mdp'/>
		<input type='submit' name='validelogin' value='Se connecter'>
	</form>
</body>
</html>
<?php
echo " <p id='erreur'> $msg </p> ";
	exit(0);
	} 
?>
