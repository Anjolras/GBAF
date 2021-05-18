<?php
$mail=$_POST['mail'];
$mail2=$_POST['mail2'];
session_start();
$id = $_SESSION["id"];
$con = mysqli_connect('localhost','root','','gbaf') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT * from membres WHERE id='" . $id . "'");
$row=mysqli_fetch_array($result);
if($mail == $mail2 ) {
mysqli_query($con,"UPDATE membres set mail='" . $mail . "' WHERE id='" . $id . "'");
$message = "L'adresse mail a bien été changée'";
echo $message;
header("Location:index.php");
} else{
 $message = "Les adresses mails ne correspondent pas";
echo $message;
header("Location:index.php");
}
}
?>