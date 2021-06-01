<?php
$pass=$_POST["pass"];
$newpass=$_POST["newPass"];
session_start();
$id = $_SESSION["id"];
include('bdd.php');
if(count($_POST)>0) 
{
	$result = $bdd->query("SELECT * from membres WHERE id='" . $id . "'");
	while ($row = $result->fetch())
	{
	if(password_verify($pass, $row["pass"]) && $_POST["newPass"] == $_POST["newPass2"] ) 
		{
			$pass_hache = password_hash($newpass, PASSWORD_DEFAULT);
		$del = $bdd->prepare("UPDATE membres set pass='" . $pass_hache . "' WHERE id='" . $id . "'");
		$del->execute(array());
		$message = "Le mot de passe a bien été changé";
		echo $message;
		session_unset(); 
session_destroy();
session_commit();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

header('location: connexion.php');
		}
	}
} 
else
{
 $message = "Le mot de passe ne correspond pas";
 echo $message;
}
?>