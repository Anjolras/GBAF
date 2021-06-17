<?php
$nom=htmlspecialchars($_POST['lastname']);
$prenom=htmlspecialchars($_POST['firstname']);
session_start();
$id = $_SESSION["id"];
include('../bdd.php');

if(count($_POST)>0 AND !empty($nom) AND !empty($prenom))
{
	$result = $bdd->prepare("SELECT * from membres WHERE id=:id");
	$result->bindValue(':id', $id);
	$result->execute();
	while ($row = $result->fetch())
	{
		$del = $bdd->prepare("UPDATE membres set nom=? WHERE id=?");
		$del->execute(array($nom,$id));
		$del = $bdd->prepare("UPDATE membres set prenom=? WHERE id=?");
		$del->execute(array($prenom,$id));
		$message = "L'adresse mail a bien été changée'";
		echo $message;
		$_SESSION['prenom'] = $prenom;
		$_SESSION['nom'] = $nom;
		header("Location:../index.php");
	}
}
else
{
	echo 'Vous devez remplir les cases pour procéder';
}
?>