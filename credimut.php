<?php include("header.php"); ?>
<body>
<div class="image_middle"><img class="logo"
		src="longlogcredimut.png"
		alt="Logo de la credimut"
		width="429" height="65"></div>

<div class="pres">
<h2><a href=https://https://www.creditmutuel.fr>Site du groupe</a></h2>
<h2>Téléphonie, monétique, télésurveillance résidentielle et des médias. Voilà tout ce que le crédit mutuel fait en plus d'être une assurance réputée et plusieurs fois gagnante du titre de meilleure banque de France.</h2>
</div>

<?php
$bdd= new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','');
$commentaires=$bdd->query('SELECT prenom, texte ,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires_credimut');
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

		$ins = $bdd-> prepare('INSERT INTO commentaires_credimut (prenom, texte, date_commentaire) VALUES (?,?,?)');
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
</div></body>