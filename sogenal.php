<?php include("header.php"); ?>
<body>
<div class="image_middle"><img class="logo"
		src="longlogsogenal.png"
		alt="Logo de la sogenal"
		width="470" height="100"></div>

<div class="pres">
<h2><a href=https://particuliers.societegenerale.fr>Site du groupe</a></h2>
<h2>La société générale est une des banques les plus anciennes de France. C'est la banque qui vous conseille depuis 156 ans!</h2>
</div>

<?php
$bdd= new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','');
$commentaires=$bdd->query('SELECT prenom, texte ,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires_sogenal');
?>

Commentaires
<?php
if(isset($_POST['commentaire'])) 
{
	if(isset($_POST['commentaire']) AND !empty($_POST['commentaire']))
	{
		$prenom=($_SESSION['prenom']);
		$commentaire=($_POST['commentaire']);
		$date = date("Y-m-d H:i:s");

		$ins = $bdd-> prepare('INSERT INTO commentaires_sogenal (prenom, texte, date_commentaire) VALUES (?,?,?)');
		$ins->execute(array($prenom,$commentaire,$date));
		$c_msg="<span style='color:green'>Votre commentaire a bien été posté</span>";
	}
	else
	{
		$c_erreur = "Il est impossible d'envoyer un commentaire vide";
	}
}
?>
<form method='POST'>
	<textarea name="commentaire" placeholder="Votre commentaire"></textarea><br />
	<input type="submit" value="Poster un commentaire" name="commentaire_post">
</form>
<?php if(isset($c_erreur)) {echo "Erreur: ". $c_erreur; } ?>
<?php if(isset($c_msg)) { echo $c_msg;}?>
<br/><div class="commentaires">
<?php while($c = $commentaires->fetch())
{
	?>
	<article><p><?= $c['prenom'] ?></p> <p><?= $c['date_commentaire_fr'] ?></p> <p><?=$c['texte'] ?></p></article>
<?php
}?>
</div>
</body>