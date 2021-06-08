<?php
$nom=$_POST['lastname'];
$prenom=$_POST['firstname'];
session_start();
$id = $_SESSION["id"];
include('../bdd.php');
if(count($_POST)>0) 
{
$result = $bdd->query("SELECT * from membres WHERE id='" . $id . "'");
while ($row = $result->fetch())
	{
		$del = $bdd->prepare("UPDATE membres set nom='" . $nom . "' WHERE id='" . $id . "'");
		$del->execute(array());
		$del = $bdd->prepare("UPDATE membres set prenom='" . $prenom . "' WHERE id='" . $id . "'");
		$del->execute(array());
		$message = "L'adresse mail a bien été changée'";
		echo $message;
		header("Location:../index.php");
	}
}
?>