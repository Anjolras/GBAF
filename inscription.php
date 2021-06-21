<!DOCTYPE html>
<html lang = "fr">
<head>
	<!-- En tête -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/inscription.css"/>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato&family=Nova+Mono&display=swap');
	</style>
	<title>Génération d'un nouveau utilisateur</title>
</head>
<body>
<h1> Inscription </h1>
<div class ="Inscription">
<?php

if(!isset($_POST['pseudo']) AND !isset($_POST['mdp']))
{
	?>
	<form method="post" action="inscription.php">
	<fieldset>

		<legend>Vos informations de connexion</legend>
	<p>
		<label for="nom">Nom</label>
		<input type="text" name="nom" id="nom" maxlength="25" />
	</p>
	<p>
		<label for="prenom">Prenom</label>
		<input type="text" name="prenom" id="prenom" maxlength="25" />
	</p>
	<p>
		<label for="pseudo">Pseudonyme</label>
		<input type="text" name="pseudo" id="pseudo" maxlength="25" />
	</p>
	<p>
		<label for="mdp">Mot de passe</label>
		<input type="password" name="mdp" id="mdp" maxlength="25" />
	</p>
	<p>
		<label for="mdp2">Vérification du mot de passe</label>
		<input type="password" name="mdp2" id="mdp2" maxlength="25" />
	</p>
	<p>
	<label for="question">Question secrète</label>
	<select name="question" id="question-select">

	    <option value="Votre meilleur ami d'enfance">Votre meilleur ami d'enfance</option>
	    <option value="Le nom de votre premier professeur">Le nom de votre premier professeur</option>
	    <option value="Où êtes-vous parti en lune de miel ?">Où êtes-vous parti en lune de miel ? </option>
	    <option value="Quel est le nom de votre jouet d’enfant préféré ?">Quel est le nom de votre jouet d’enfant préféré ?</option>
	    <option value="Quel est le nom de jeune fille de votre grand-mère ?">Quel est le nom de jeune fille de votre grand-mère ?</option>
	</select>
	</p>
	<p>
		<label for="reponse_question">Réponse secrète</label>
		<input type="text" name="reponse_question" id="reponse_question" maxlength="50" />
	</p>
	<p>
		<input type="submit" value="Inscription" />
	</p>
	</fieldset>
	</form>
	</div>
	</body>
	</html>
	<?php
}
else
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$mdp = htmlspecialchars($_POST['mdp']);
	$mdp2 = htmlspecialchars($_POST['mdp2']);
	$question = htmlspecialchars($_POST['question']);
	$reponse_question = htmlspecialchars($_POST['reponse_question']);
	if(isset ($nom) AND isset ($prenom) AND isset ($pseudo) AND isset ($mdp) AND isset ($mdp2) AND isset ($question) AND isset ($reponse_question))
	{
		include("bdd.php");
		$stmt = $bdd->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ?');
		$stmt->execute(array($pseudo));
		if ($stmt->fetchColumn() != 0) /* Vérification de l'existance du pseudo dans la base de données*/
		{
			echo 'Ce pseudo est déjà utilisé';
		}
		else
		{
			if($mdp!=$mdp2) /* Vérification si les deux mots de passes entrés sont les mêmes*/
			{
					echo 'Les deux mots de passe ne sont pas identiques!';
			}
			else
			{
				$pass_hache = password_hash($mdp, PASSWORD_DEFAULT); /* Hachage du mot de passe avant entrée en bade de données */
				$req = $bdd->prepare('INSERT INTO membres(nom, prenom, pseudo, pass, question, reponse_question, date_inscription) VALUES(?, ?, ?, ?, ?, ?, CURDATE())');
				$req->execute(array(
				$nom,
				$prenom,
				$pseudo,
	    		$pass_hache,
	    		$question,
	    		$reponse_question));
				$message ='Le compte a bien été crée</br>';
				echo $message; 
				Header('Location:index.php');
			}

		}
	}
	else
	{
		echo 'Toutes les informations ne sont pas renseignées';
	}
}

