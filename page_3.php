	<!doctype html> 
	<!-- Ceci est un commentaire -->
	<html lang="fr"> 
	<head> 						
		<title>KIP</title>
		<link rel="stylesheet" href="style.css" />
		<meta charset="utf-8">


	</head> 
	<body> 
		
		<h1>MOTO ÉCOLE KIP</h1>

		<div class="conteneur">

			<a href="page_1.html" class="bouton">HOME</a>

			<a href="page_2.html" class="bouton">Formation</a>

			<a href="page_3.php" class="bouton1">Inscription</a>

		</div>
		<?php
		//header("Refresh:1"); /////RECHARGER> LA PAGE
		//////////////////çA GARDE LA VARIABLE ////////
		if (isset($_POST['email']))
		{ 
			$email = $_POST['email']; 
		} 
		else { 
			$email = ""; 
		} 
		?>
		<!--<?php if (isset($_POST['pseudo']))
		{ 
			$pseudo = $_POST['pseudo']; 
		} 
		else { 
			$pseudo = "0"; 
		} 
		?>--->
		<?php if (isset($_POST['nom']))
		{ 
			$nom = $_POST['nom']; 
		} 
		else { 
			$nom = ""; 
		} 
		?>
		<?php if (isset($_POST['prenom']))
		{ 
			$prenom = $_POST['prenom']; 
		} 
		else { 
			$prenom = ""; 
		}
		
		?>
		
		<?php

		/*echo '<pre>';
		print_r($_POST);
		echo '<pre>';*//////DEBUGAGE
		?>


		
		<!-----------------------------------------------------FIN DE LA RECUP----------------------------------------->

		<div class="myphp">

			<form action="page_3.php" method="post">
				<h2> INFORMATIONS D'INSCRIPTION </h2>
				<?php echo '<br>'; ?>
				<p>Adresse mail : <input type="email" name="email" value="<?php echo $email; ?>" /></p>
				<p> Nom : <input type="text" name="nom" value="<?php echo $nom; ?>" />
					<?php echo "&nbsp"; ///// UN ESPACE ?> 
					Prénom : <input type="text" name="prenom" value="<?php echo $prenom; ?>" /></p>
					<!--	<p>Pseudo : <input type="text" name="pseudo" value="<?php echo $pseudo; ?>" /></p>-->

					<?php 

					echo 'Date de naissance : ';
					/////JOURS//////////

					$day= '';
					echo '<select name="jours">',"\n";
					for($i=1; $i<=31; $i++)
					{
						if($i == date('Y'))
						{
							$day = ' day="day"';
						}
						echo "\t",'<option value="', $i ,'"', $day ,'>', $i ,'</option>',"\n";
						$day='';
					}
					echo '</select>',"\n";

					/////MOIS//////
					$array = array(

						'0' => 'Janvier',
						'1' => 'Février',
						'2' => 'Mars',
						'3' => 'Avril',
						'4' => 'Mai',
						'5' => 'Juin',
						'6' => 'Juillet',
						'7' => 'Août',
						'8' => 'Septembre',
						'9' => 'Octobre',
						'10' => 'Novembre',
						'11' => 'Decembre'
					);
					$month = '';

					echo '<select name="mois">',"n";
					foreach($array as $numero => $mois)
					{
						if($mois === 'janvier')
						{
							$month = ' month="month"';
						}
						echo "\t",'<option value="', $numero ,'"', $month ,'>', $mois ,'</option>',"\n";
						$month='';
					}
					echo '</select>',"\n";
						///ANNNEEE////

					// Variable qui ajoutera l'attribut selected de la liste déroulante
					$years = '';

					// Parcours du tableau
					echo '<select name="annees">',"\n";
					for($i=1970; $i<=2019; $i++)
					{
							// L'année est-elle l'année courante ?
						if($i == date('Y'))
						{
							$years = ' selected="years"';
						}
							// Affichage de la ligne
						echo "\t",'<option value="', $i ,'"', $years ,'>', $i ,'</option>',"\n";
							// Remise à zéro de $selected
						$years='';
					}
					echo '</select>',"\n";
					?>
					<p>	
						<?php echo '<br>'; ?>
					</p>
					<p>
						<?php echo '<br>';?>

						Password : <input type="Password" name="Password" /></p>	
						<p> Confirmation Password : <input type="Password" name="Password1" /></p>	
						<div class="valid"><?php 

						if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', '$Password' ))
						{
							$Password = isset($_POST['Password']) ? $_POST['Password'] : NULL;
							
							if ($_POST['Password'] == $_POST['Password1'])
							{
								echo 'Mot de passe valide' ;
							}
							else
							{
								echo 'Retaper le Mot de passe s\'il vous plait ! Mot de passe éronner.' ;
							}
						}
						else
						{
							echo 'Entrer un mot de passe composé de minuscule + au moins une majuscule,un chiffre et un caractère!';
						}

						?>

						<p>
							<?php
							echo '<br>';
							$flag = isset($_POST['flag']) ? $_POST['flag'] : NULL;
							$empty = isset($_POST['empty']) ? $_POST['empty'] : NULL;
							if($nom=="" || $prenom=="" || $_POST['annees']=="2019" || $email=="" || $_POST['Password']==" "  ) 
							{
								$empty=1; 
							}
							if ($flag == $empty) 
							{
								echo("<b>Veuillez remplir tous les champs</b>"); 
							}
							
							?>
							<input type="hidden" name="flag" value="1">
							<input type="submit" value="OK"/>


						</p>
					</form>
					<?php echo '<br>';?>
					<form action="page_3.php" method="post">
						<input type="hidden" name="Effacer">
						<input type="submit" value="Effacer">
					</form>

				</div>


		<!--------DEBUG

		<?php $age=2019-$_POST['annees']; ?>
		Bonjour, <?php echo htmlspecialchars($_POST['nom'])." ".($_POST['prenom']); ?>.
		Tu as <?php echo $age; ?> ans.



		<?php

		/////////////////////////CHAMP VIDE ////////////////////////////////////////
		if (empty($_POST['email'])) {
			echo ' attention email vaut soit 0, vide, ou pas définie du tout ';echo '<br>';
		}
		if (empty($_POST['prenom'])) {
			echo ' attention prenom vaut soit 0, vide, ou pas définie du tout';echo '<br>';
		}
		if (empty($_POST['nom'])) {
			echo ' attention nom vaut soit 0, vide, ou pas définie du tout';echo '<br>';
		}
		
	//if (empty($_POST['pseudo'])) {
		//	echo ' attention pseudo vaut soit 0, vide, ou pas définie du tout';echo '<br>';
	//	}
		if (2019==$_POST['annees']) {
			echo ' attention annees vaut soit 0, vide, ou pas définie du tout';echo '<br>';
		}
		?>
		---->
	</div>
</body> 
</html> 