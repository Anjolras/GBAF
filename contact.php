<?php include("header.php");
if (!isset ($_POST['nom']) OR !isset($_POST['prenom']) OR !isset($_POST['mail']) OR !isset($_POST['message']))
{
	?>
	<form method="post" action="contact.php">
<fieldset>

	<legend>Contactez nous</legend>
<p>
	<label for="nom">Nom</label>
	<input type="text" name="nom" id="nom"/>
</p>
<p>
	<label for="prenom">Prenom</label>
	<input type="text" name="prenom" id="prenom"/>
</p>
<p>
	<label for="mail">Votre adresse email</label>
	<input type="password" name="mail" id="mail"/>
</p>
<p>
	<label for="subject">Sujet</label>
	<input type="password" name="subject" id="subject"/>
</p>
<p>
	<textarea id="message" name="message">Votre message</textarea>
</p>
<p>
<input type="submit" value="Envoyer" />
</p>
<?php
}
elseif ((isset ($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mail']) AND isset($_POST['message']))
{
$to = "contact@gbaf.fr";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$subject = $_POST['subject'];
$message = $_POST['message']); 
$from = $_POST['mail'];

// Envoi d'email
if(mail($to, $nom, $prenom, $subject, $message)){
    echo 'Votre message a été envoyé avec succès!';
} else{
    echo 'Impossible d\'envoyer des emails. Veuillez réessayer.';
}
}