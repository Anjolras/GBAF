<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- En tête -->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="connexion.css"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab&display=swap');
</style>
		<title>Connexion</title>
	</head>
<?php

if(!isset($_POST['pseudo']) AND !isset($_POST['mdp']))
{
	echo '<form id="identifiants" action="connexion.php" method="POST">
	<fieldset>

	<legend>Vos informations de connexion</legend>

	<label for="pseudo">Pseudo </label>
	<input type="text" name="pseudo" id="pseudo" maxlength="25" /></br>
	<label for="mdp">Mot de passe </label>
	<input type="password" name="mdp" id="mdp" />
	<p><input type="submit" value="CONNEXION" /></p>
</fieldset>
</form>';
}
else
{
$pseudo=$_POST["pseudo"];
$mdp=$_POST["mdp"];

	$mysqli = new mysqli("localhost", "root", "", "gbaf");

	$stmt = $mysqli->prepare("SELECT id, prenom, nom, pseudo, pass FROM membres WHERE pseudo = ?");
	$stmt->bind_param("s", $pseudo);

	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($uid, $prenom, $nom, $uname, $pw);
	if ($stmt->num_rows == 1)
		{
			$stmt->fetch();
			if (password_verify($mdp, $pw))
			{
				$_SESSION['prenom'] = $prenom;
				$_SESSION['nom'] = $nom;
				$_SESSION['connected'] = true;
				echo "L'identifiant est bon.<br> Connexion!";
				header('Location: index.php');
			}
			else
			{
				echo "Les indentifiants sont incorectes ou n'existent pas";
			}
		}
	else
		{
			session_destroy();
			echo "Les identifiants sont incorectes ou n'existent pas";
		}
}

