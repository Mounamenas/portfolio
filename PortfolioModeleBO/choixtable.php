<?php

include "include/_session.php";
include "include/_connexion.php";
$stylesheet="css/portfolio.css";
?>
<!DOCTYPE html>
<html lang="fr">
<?php
include "include/head.php";
?>
<body>
<?php
include "veriflogin.php";
?>



<form method="POST" action="editable.php">
<?php
	echo "<p>Sélectionnez une table : <br/>";
	$tables_req = $bdd->query("SHOW TABLES;");
	$lignes_tables = $tables_req->fetchAll();
	$retour_ligne = 0;
	foreach($lignes_tables as $ligne) {
			$retour_ligne++;
			if($retour_ligne%3==0)
				echo "<br/>\n";
			echo "\t<input type='submit' name='valider' value='".$ligne[0]."' style='height:100px;'>"."\n"; // $ligne[0] contient le nom de la table
	}
?>
</form>
<form id= "deco" method="POST" action="deconnexion.php">
<input type='submit' name='Deco' value='Déconnexion'/>
</form>
</body>
</html>
