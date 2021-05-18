<?php
$pass=$_POST["pass"];
$newpass=$_POST["newPass"];
session_start();
$id = $_SESSION["id"];
$con = mysqli_connect('localhost','root','','gbaf') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT * from membres WHERE id='" . $id . "'");
$row=mysqli_fetch_array($result);
if(password_verify($pass, $row["pass"]) && $_POST["newPass"] == $_POST["newPass2"] ) {
	$pass_hache = password_hash($newpass, PASSWORD_DEFAULT);
mysqli_query($con,"UPDATE membres set pass='" . $pass_hache . "' WHERE id='" . $id . "'");
$message = "Le mot de passe a bien été changé";
echo $message;
header("Location:connexion.php");
} else{
 $message = "Le mot de passe ne correspond pas";
 echo $message;
}
}
?>