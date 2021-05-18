<?php include("header.php"); ?><link href="bouton.css" rel="stylesheet" type="text/css" media="all" />
<?php include("bdd.php");
$id_acteur=$_GET['id'];
$infos=$bdd->prepare('SELECT id, nom, short, image, longimage, resume, description, site FROM acteurs WHERE id=:id');
$infos->bindValue(':id', $id_acteur);
$infos->execute();
while($i = $infos->fetch())
	{
	?>
	<div class="pres">
		<p><img class="longlogo echo $i['nom']"
			src="<?php echo $i['longimage'];?>"
			alt="Logo de <?php echo $i['nom'];?>"
			width="800px" height="190px">
	<h2><p><a href=<?php echo $i['site'];?>>Site du groupe</a></h2></p>
	<h2><p><?php echo $i['description'];?></h2></p>
	</div>
	</br></br></br>	<a href=commentaires.php?id=<?php echo $i['id'];?> class="button">Ecrire un commentaire</a></br></br></br></br></br>

	<?php
	}
?>
<div class=commentaires>
<?php

$commentaires=$bdd->prepare('SELECT id_acteur,prenom, texte,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires WHERE id_acteur=:id');
$commentaires->bindValue(':id', $id_acteur);
$commentaires->execute();
while($c = $commentaires->fetch())
{
		?>
		<article class="commentaire"></br><?= $c['prenom'] ?></br><?= $c['date_commentaire_fr'] ?></br><?=$c['texte'] ?></article>
	<?php
;}?>
</div></body> 
	<?php include("footer.php");
?>

</body>
</html>