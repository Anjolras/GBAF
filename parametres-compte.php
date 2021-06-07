<?php include("header.php"); ?><link href="styles/bouton.css" rel="stylesheet" type="text/css" media="all" />
<?php include("bdd.php");
?>
<title>Paramètres de compte</title>

<body>
<h1>Paramètres de compte</h1>

<form id="namechange" action="actions/change-name.php" method="POST">
<fieldset>
	<legend><b>Changement de nom</b></legend>

<label for="lastname">Nom de famille</label></br>
<input type="text" name="lastname" id="lastname" /></br>
<label for="firstname">Prénom</label></br>
<input type="text" name="firstname" id="firstname" /></br>
<p><class id="button"><input type="submit" value="Changer le nom" /></class></p>
</fieldset>
</form>

<form id="mdpchange" action="actions/change-pass.php" method="POST">
	<fieldset>

	<legend><b>Changement de mot de passe</b></legend>

<label for="pass">Mot de passe actuel</label></br>
<input type="password" name="pass" id="pass" maxlength="25" /></br>
<label for="newPass">Nouveau mot de passe</label></br>
<input type="password" name="newPass" id="newPass" /></br>
<label for="newPass2">Confirmez le mot de passe</label></br>
<input type="password" name="newPass2" id="newPass2" /></br>
<p><class id="button"><input type="submit" value="Changer le mot de passe" /></class></p>
</fieldset>
</form>


<form id="mailchange" action="actions/change-mail.php" method="POST">
<fieldset>
	<legend><b>Changement d'adresse mail</b></legend>

<label for="mail">Nouvelle adresse e-mail</label></br>
<input type="text" name="mail" id="mail" /></br>
<label for="mail2">Confirmez l'adresse e-mail</label></br>
<input type="text" name="mail2" id="mail2" /></br>
<p><class id="button"><input type="submit" value="Changer l'adresse mail" /></class></p>
</fieldset>
</form>

</body>
</html>
