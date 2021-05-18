<?php include("header.php"); ?><link href="bouton.css" rel="stylesheet" type="text/css" media="all" />
<?php include("bdd.php");
?>
<title>Paramètres de compte</title>

<body>
<h1>Paramètres de compte</h1>

<form id="mdpchange" action="change-pass.php" method="POST">
	<fieldset>

	<legend>Changement de mot de passe</legend>

<label for="pass">Mot de passe actuel</label>
<input type="password" name="pass" id="pass" maxlength="25" /></br>
<label for="newPass">Nouveau mot de passe</label>
<input type="password" name="newPass" id="newPass" />
<label for="newPass2">Confirmez le mot de passe</label>
<input type="password" name="newPass2" id="newPass2" />
<p><input type="submit" value="Changer le mot de passe" /></p>
</form>
</fieldset>

<form id="mailchange" action="change-mail.php" method="POST">
<fieldset>
	<legend>Changement d'adresse mail</legend>

<label for="mail">Nouvelle adresse e-mail</label>
<input type="text" name="mail" id="mail" />
<label for="mail2">Confirmez l'adresse e-mail</label>
<input type="text" name="mail2" id="mail2" />
<p><input type="submit" value="Changer l'adresse mail" /></p>
</fieldset>
</form>

</body>
</html>
