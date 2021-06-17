<?php
$mail=htmlspecialchars($_POST['mail']);
$mail2=htmlspecialchars($_POST['mail2']);
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
			if($mail == $mail2 ) 
			{
				$del = $bdd->prepare("UPDATE membres set mail=? WHERE id=?");
				$del->execute(array($mail,$id));
				$message = "L'adresse mail a bien été changée'";
				echo $message;
				header("Location:../index.php");
			} 
			else
			{
				$message = "Les adresses mails ne correspondent pas";
				echo $message;
				header("Location:../index.php");
			}
		}
	}
}
else
{
	echo 'Vous devez remplir les cases pour procéder';
}
?>