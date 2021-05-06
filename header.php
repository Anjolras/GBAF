<?php
// Colors : Détails/menu (rouge) =  rgb(255,0,0) | Texte (noir) = rgb(0,0,0) | Background (vert-beige) = rgb(234, 244, 211) | background footer ? (gris argenté) = rgb(105, 116, 124) | texte important ? (beige marrant) = rgb(253, 232, 196)
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- En tête -->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab&display=swap');
</style>
		<title>GBAF: Groupement Banque-Assurance Français</title>
	</head>
	<header>
		<a href=index.php><img class="logo"
		src="logo.png"
		alt="Logo GBAF"
		 width="130" height="150"></a>
<?php
	if(!isset($_SESSION['prenom']) AND !isset($_SESSION['nom']))
	{
	?>
	<nav>
				<a href="inscription.php">S'inscrire     </a>
			</br>
				<a href="connexion.php">     Se connecter</a>
	<?php
	}

	else
	{
	echo '<div class="bienvenue">';
	echo '</br>Bienvenue, ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
	echo '</div>';
	}
?>
</nav>
	</header>
