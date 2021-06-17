<?php
$pass=htmlspecialchars($_POST["pass"]);
$newpass=htmlspecialchars($_POST["newPass"]);
session_start();
$id = $_SESSION["id"];
include('../bdd.php');
if(!empty($pass) AND !empty($newpass))
{
	if(count($_POST)>0) 
	{
		$result = $bdd->prepare("SELECT * from membres WHERE id=:id");
		$result->bindValue(':id', $id);
		$result->execute();
		while ($row = $result->fetch())
		{
		if(password_verify($pass, $row["pass"]) && $_POST["newPass"] == $_POST["newPass2"] ) /*Verification de la concordance du mot de passe enregistré (crypté) avec le mot de passe entré*/
			{
				$pass_hache = password_hash($newpass, PASSWORD_DEFAULT);/*Hachage du nouveau mot de passe avant entrée dans la base de données*/
				$del = $bdd->prepare("UPDATE membres set pass=? WHERE id=?");
				$del->execute(array($pass_hache,$id));
				$message = "Le mot de passe a bien été changé";
				echo $message;
				session_unset(); 
				session_destroy();
				session_commit();
				setcookie(session_name(),'',0,'/');
				session_regenerate_id(true);

			header('location: ../connexion.php');
			}
		}
	} 
	else
	{
	 $message = "Le mot de passe ne correspond pas";
	 echo $message;
	}
}
else
{
	echo 'Vous devez remplir les cases pour procéder';
}
?>