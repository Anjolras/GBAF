<?php
session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
<head>
	<!-- En tête -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/connexion.css"/>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab&display=swap');
	</style>
	<title>Connexion</title>
</head>
<?php

if(!isset($_POST['pseudo']) AND !isset($_POST['mdp']))
{
	?>
	<form id="identifiants"  method="POST">
	<fieldset>

	<legend>Vos informations de connexion</legend>

	<label for="pseudo">Pseudo </label>
	<input type="text" name="pseudo" id="pseudo" maxlength="25" /><br>
	<label for="mdp">Mot de passe </label>
	<input type="password" name="mdp" id="mdp" />
	<p><input type="submit" value="Connexion" /></p>
	<a href="passreset.php">Réinitialiser mon mot de passe</a>
	</fieldset>

	</form>
	<?php
}
else
{
	$pseudo=$_POST["pseudo"];
	$mdp=$_POST["mdp"];

	include('bdd.php');

	$stmt = $bdd->prepare("SELECT id, prenom, nom, pseudo, pass FROM membres WHERE pseudo = ?");
	$stmt->execute(array($pseudo));
	if ($stmt->rowCount() == 1)
	{
		while ($i = $stmt->fetch())
		{
			if (password_verify($mdp, $i['pass'])) /*Vérification du mot de passe à travers un principe de hachage standard*/
			{
				$_SESSION['prenom'] = $i['prenom'];
				$_SESSION['nom'] = $i['nom'];
				$_SESSION['id'] = $i['id'];
				$_SESSION['connected'] = true;
				echo "L'identifiant est bon.<br> Connexion!";
				header('Location: index.php');
			}
			else
			{
				echo "Les indentifiants sont incorectes ou n'existent pas";
			}
		}
	}	
	else
	{
		session_destroy();
		echo "Les identifiants sont incorectes ou n'existent pas";
	}
}

