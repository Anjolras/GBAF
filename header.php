<?php
// Colors : Détails/menu (rouge) =  rgb(255,0,0) | Texte (noir) = rgb(0,0,0) | Background (vert-beige) = rgb(234, 244, 211) | background footer ? (gris argenté) = rgb(105, 116, 124) | texte important ? (beige marrant) = rgb(253, 232, 196)
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<!-- En tête -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="styles/style.css"/>
	<script src="https://kit.fontawesome.com/47cf681e63.js" crossorigin="anonymous"></script>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab&display=swap');
	</style>
	<title>GBAF: Groupement Banque-Assurance Français</title>
</head>
<header>
	<img class="logogbaf"
	src="/images/logo.png"
	alt="Logo GBAF"
	width="130" height="150">
	<?php /*Récupération du nom et prénom de l'utilisateur et menu paramètres de compte et déconnexion*/
	if(isset($_SESSION['prenom']) AND isset($_SESSION['nom']))
	{
		?> 
		<div class="bienvenue">
		<br>Bienvenue, <?=$_SESSION['prenom']?> <?=$_SESSION['nom']?>.</div>
		<nav><br><a href = "parametres-compte.php">Paramètres de compte</a><br>
		<a href="actions/deconnexion.php">Se déconnecter</a></nav>
		<?php
	}
	
	else
	{
		?>
		<nav>
		<ul>
		<li><a href="inscription.php">S'inscrire     </a></li>
		<br>
		<li><a href="connexion.php">     Se connecter</a></li>
		</ul>
		</nav>
		<?php
	}
?>
</header>
