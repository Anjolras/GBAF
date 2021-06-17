<?php
include('header.php');
if (!isset($_POST["pseudo"]))
{
	?>
	<form id="pseudo" method="POST">
	<p><label for="pseudo">Votre pseudo</label></p>
	<input type="text" name="pseudo" id="pseudo" />
	<p><input type="submit" value="Changer le mot de passe" /></p>
	<?php
}
if(isset ($_POST["pseudo"]) AND !isset($_POST["reponse"]) AND !isset($_POST['newPass']))
{
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$_SESSION['pseudo'] = $pseudo;
		?>
	<form id="passreset" method="POST">
	<fieldset>
		<legend>Changement de mot de passe</legend>
	<?php
	include('bdd.php');
	$question=$bdd->prepare('SELECT id, question FROM membres WHERE pseudo=:pseudo');
	$question->bindValue(':pseudo', $pseudo);
	$question->execute();

	while($q = $question->fetch())
	{
		?><p>Votre question secrète est:</p> <span style="color:red"><b><?php echo $q['question']; ?> </b></span><?php
	}

	?>
	<p><label for="reponse">Réponse secrète</label></p>
	<input type="text" name="reponse" id="reponse" />
	<p><label for="newPass">Nouveau mot de passe</label></p>
	<input type="password" name="newPass" id="newPass" />
	<p><label for="newPass2">Confirmez le mot de passe</label></p>
	<input type="password" name="newPass2" id="newPass2" />
	<p><input type="submit" value="Changer le mot de passe" /></p>
	</fieldset>
	</form>
	<?php
}
elseif(isset($_POST["reponse"]) AND isset($_POST['newPass']))
{
	$pseudo=htmlspecialchars($_SESSION['pseudo']);
	$reponse=htmlspecialchars($_POST["reponse"]);
	$newpass=htmlspecialchars($_POST["newPass"]);
	$newpass2=htmlspecialchars($_POST["newPass2"]);
	include('bdd.php');
	if(count($_POST)>0) 
	{
		$result = $bdd->prepare("SELECT * from membres WHERE pseudo = :pseudo");
		$result->bindValue(':pseudo', $pseudo);
		$result->execute();
		while ($changepass = $result->fetch())
		{
			if($changepass["reponse_question"] == $reponse AND $newpass == $newpass2)
			{
				$pass_hache=password_hash($newpass, PASSWORD_DEFAULT);
				$change = $bdd->prepare("UPDATE membres set pass=? WHERE pseudo=?");
				$change->execute(array($pass_hache,$pseudo));
				$message = "Le mot de passe a bien été changé";
				echo $message;
				header("Location:connexion.php");
			}
		}
	}
		else
		{
		 $message = "Les mot de passe ne correspondent pas ou la réponse secrète n'est pas la bonne";
		 echo $message;
		}
}
