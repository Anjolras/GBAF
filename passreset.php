<?php
include('header.php');
$id=$_SESSION['id'];
if(!isset($_POST["reponse"]) AND !isset($_POST['newPass']))
{
	?>
<form id="passreset" method="POST">
<fieldset>
	<legend>Changement de mot de passe</legend>
<?php
include('bdd.php');
$question=$bdd->prepare('SELECT id, question FROM membres WHERE id=:id');
$question->bindValue(':id', $id);
$question->execute();
	while($q = $question->fetch())
	{
		?> Votre question secrète est <?php echo $q['question'];
	}
?>
</br>
<label for="reponse">Réponse secrète</label>
<input type="text" name="reponse" id="reponse" />
<label for="mail2">Confirmez l'adresse e-mail</label>
<input type="text" name="mail2" id="mail2" />
<p><input type="submit" value="Changer l'adresse mail" /></p>
</fieldset>
<?php
}

elseif(isset($_POST["reponse"]) AND isset($_POST['newPass']))
{
$reponse=$_POST["reponse"];
$newpass=$_POST["newPass"];
$newpass2=$_POST["newPass2"];
session_start();
$id = $_SESSION["id"];
$con = mysqli_connect('localhost','root','','gbaf') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT * from membres WHERE id='" . $id . "'");
$row=mysqli_fetch_array($result);
if(row['reponse'] == $reponse) && $newpass == $newpass2
	{
mysqli_query($con,"UPDATE membres set pass='" . $pass_hache . "' WHERE id='" . $id . "'");
	$message = "Le mot de passe a bien été changé";
	echo $message;
	header("Location:connexion.php");
	} 
	else
	{
	 $message = "Le mot de passe ne correspond pas";
	 echo $message;
	}
}
?>