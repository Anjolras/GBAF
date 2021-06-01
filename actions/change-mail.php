<?php
$mail=$_POST['mail'];
$mail2=$_POST['mail2'];
session_start();
$id = $_SESSION["id"];
include('bdd.php');
if(count($_POST)>0) 
{
$result = $bdd->query("SELECT * from membres WHERE id='" . $id . "'");
while ($row = $result->fetch())
{
if($mail == $mail2 ) {
$del = $bdd->prepare("UPDATE membres set mail='" . $mail . "' WHERE id='" . $id . "'");
$del->execute(array());
$message = "L'adresse mail a bien été changée'";
echo $message;
header("Location:index.php");
} else{
 $message = "Les adresses mails ne correspondent pas";
echo $message;
header("Location:index.php");
}
}
}
?>