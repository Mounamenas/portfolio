<?php

include('include.php');
include('traduction.php');
$pdo = getPDO();

if ( isset ($_GET['lang'] ) ) 
    $lang = $_GET['lang'];
else
   	$lang = "fr";



?>
<!DOCTYPE html>
<html lang="<?php echo($lang); ?>">
  <head>
    <title>Portfolio -Mouna</title>
    <meta charset="UTF-8" />
    <meta name ="viewport" content="width=device-width , initial scale=1">
    <link rel="stylesheet" href="reset.css"/>
    <link href="style3.css" rel="stylesheet" type="text/css"/>
    <script src="monportfolio.js"> </script>
</head>
<body onload="texte();">
	<div class="div_conteneur" >

	<section id="aboutme">

	<header>

		<nav class="navbar">
			<label for="menu-mobile" class="menu-mobile"> Menu </label>
			<input type="checkbox" id="menu-mobile" >
			<ul id="langue">
				
					
						<?php
						$lgs=lang ($pdo,$lang) ;
						foreach ($lgs as $lg) {
							echo li_langue($lg);
						}
						?>
							

					
				</ul>
				<ul id="menu">

					<li> <a href="#aboutme"><?php print_r($trad[$lang] ['a propos de moi'] ) ; ?> </a> </li>
					<li> <a href="#competence"> <?php print_r($trad[$lang] ['Compétences'] ) ; ?> </a>  </li>
					<li> <a href="#experience"> <?php print_r($trad[$lang] ['Expériences professionnelle'] ) ; ?> </a> </li>
					<li> <a href="#formations"> <?php print_r($trad[$lang] ['Formations'] ) ; ?> </a> </li>
					<li> <a href="#realisation"> <?php print_r($trad[$lang] ['Portfolio'] ) ; ?> </a> </li>
					<li> <a href="#contact"><?php print_r($trad[$lang] ['Me contacter'] ) ; ?> </a></li>
				</ul>


			
			
		</nav>
		<article id="presentation">
			<h2> <?php print_r($trad[$lang] ['Menasria Mouna'] ) ; ?> </h2>
			<h4>  <?php print_r($trad[$lang] ['Développeuse Web'] ) ; ?></h4>
			
				 
		
		</article>
		<article id="presentation1">
		<h3 > <?php print_r($trad[$lang] ['Acceuil'] ) ; ?> </h3> 
		<p> <?php echo presentation($pdo,$lang); ?> </p>


		<a id="buttoncv" href="doc/CV-Mouna-Menasria.pdf" download> <?php print_r($trad[$lang] ['télécharger mon cv'] ) ?> </a>

	</article>
	</header>
	
	</section>
	

	
	
	<section id="competence" >
		<h3> <?php print_r($trad[$lang] ['Compétences'] ) ; ?></h3>
		
		<article >
			<?php
			 $cat=categoriepr($pdo,$lang);
			 echo "<h4>".$cat['categorie']."</h4>"; 
			 ?>
			 <ul>
			 	<?php
			 	$progs=programmation($pdo,$lang);
			 	foreach ($progs as $prog ) {
				echo li_programmation($prog);
					
				}

			 	?>
			 </ul>

		
		
	</article>
	<article >
		<?php
		$cat=categoriebdd($pdo,$lang);
		echo "<h4>".$cat['categorie']."</h4>";
		?>
		<ul>
			<?php
			$bdds = bdd($pdo,$lang);
			foreach ($bdds as $bdd) {
				echo li_bdd($bdd);
					
				}

			 	?>
			 </ul>
		 
		
		</article>
		<article >
			<?php 
			$cat=categoriebur($pdo,$lang);
			echo "<h4>".$cat['categorie']."</h4>";
			 ?>
			 <ul>
			 	<?php
			 	$burs = bur($pdo,$lang);
			 	foreach ($burs as $bur) {
			 		echo li_bur($bur);
			 	}

			 	
			 	?>
			 </ul>
		
		</article>
		<article >
			<?php 
			$cat=categoriedes($pdo,$lang);
			echo "<h4>".$cat['categorie']."</h4>";
			?>

			<ul>
				<?php
				$dess = des($pdo,$lang);
				foreach ($dess as $des) {
					echo li_des($des);
				}

				?>
			 </ul>
		
			
		</article>
		<article >
			<?php 
			$cat=categoriejp($pdo,$lang);
			echo "<h4>".$cat['categorie']."</h4>";
			?>

			<ul>
				<?php
				$jps = jp($pdo,$lang);
				foreach ($jps as $jp) {
					echo li_jp($jp);
			 	}

			 	?>
			 </ul>
		
		</article>
		<article >
			<?php 
			$cat=categorielg($pdo,$lang);
			echo "<h4>".$cat['categorie']."</h4>";
			?>

			<ul>
				<?php
				$lgs = lg($pdo,$lang);
				foreach ($lgs as $lg) {
			 		echo li_lg($lg);
			 	}

			 	?>
			 </ul>
		
		 
		</article>
	</section>
	<section id="experience">
		<h3> <?php print_r($trad[$lang] ["Expériences professionnelle"] ) ; ?></h3>

		<article class='timeline'>

		<ul>
			<?php
			$exps = experiences($pdo,$lang);

			foreach ($exps as $exp){
				echo li_experience($exp);
			}

			?>


		</ul>
	</article>
		
			
	</section>

	<section id="formations">
		<h3> <?php print_r($trad[$lang] ["Formations"] ) ; ?></h3> 
		<article class='timeline'>
		<ul> 
			<?php
			$forms =formations($pdo,$lang);
			foreach ($forms as $form) {
				echo li_formation($form);
				
			}

			?>
		</ul>
	</article>
		
	</section>
	
	<section id="realisation">
		<h3> <?php print_r($trad[$lang] ["Portfolio"] );?> </h3>
		<article id="portfolio">
			
				<ul > 

					<li class="line">
											<?php
					$reals = realisations($pdo,$lang);
					$i = 0;
					foreach ($reals as $real) {
						if ($i % 5== 0){ 
							echo " \n</li> \n <li class='line'>";
						echo li_realisation($real)."\n";
						$i++;
						} else {
							echo li_realisation($real);
							$i++;
							}
					
					}
					 ?>
					</li>
				</ul>
 			
			<img id="realsize" src ="images/realisations/teamimapp.jpg" alt=""/> 
			<p id="legend"> Team LP IMApp </p>
		</article>
		







	</section>
	<section id="contact">
		<h3> <?php print_r($trad[$lang] ["Me contacter"] ) ; ?></h3>
		
	<article id="formulaire">
  <form  method="post" onsubmit="return verifier()">
  <p>
    <label><?php print_r($trad[$lang] ["Nom"] ) ; ?>:</label> <input id="nom" name="nom" type="text" />
  </p>
  <p>
    <label><?php print_r($trad[$lang] ["Prénom"] ) ; ?>:</label> <input id="prenom" name="prenom" type="text" />
  </p>
  <p>
    <label><?php print_r($trad[$lang] ["email"] ) ; ?>:</label><input id="email" name="email" type="text" />
  </p>
  <p>
    <label><?php print_r($trad[$lang] ["sujet"] ) ; ?>:</label><input id="sujet" name="sujet" type="text" />
  </p>
  <p> 
  	<label><?php print_r($trad[$lang] ["message"] ) ; ?>:</label> <TEXTAREA id="textarea" name="message" > </TEXTAREA> 
  </p>
  <p>
    <input type="reset"  name ="annuler" value="<?php print_r($trad[$lang] ["annuler"] ) ; ?>" />
    <input type="submit"  name ="envoyer" value="<?php print_r($trad[$lang] ["envoyer"] ) ; ?>" />
  </p>
</form>
<?php 


   if (isset($_POST['envoyer'])){ 
   	if (!empty(trim($_POST['nom'])) && !empty(trim($_POST['prenom'])) && !empty( trim($_POST['email'])) && !empty(trim($_POST['sujet'])) &&!empty(trim($_POST['message']))){ 
   		$nom = $_POST['nom'];
   		$prenom = $_POST['prenom'];
   		$email = $_POST['email'];
   		$sujet = $_POST['sujet'];
   		$message = $_POST['message'];
   		formulaire ($pdo,$nom,$prenom,$email,$sujet,$message);
     echo " le message a été envoyé";
   	 }

   }

  

?> 
</article>
 </section>

	<footer>
		<p> e-mail : touta.menas@gmail.com</p>
		<p> N°tel: 07.67.49.47.51 <p>
		<p>  copiright <a href="PortfolioModeleBO/choixtable.php">2021/2022 </a></p>
	</footer>
	


	</div>
</body>
</html>