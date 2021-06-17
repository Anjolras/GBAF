<?php include("header.php"); ?><link href="styles/bouton.css" rel="stylesheet" type="text/css" media="all" />
<link href="styles/commentaire.css" rel="stylesheet" type="text/css" media="all" />
<?php include("bdd.php");
if(isset($_SESSION['prenom']) AND isset($_SESSION['nom'])) /*Vérification de session*/
{
	$id_acteur=$_GET['id'];
	$id_membre=$_SESSION['id'];
	$infos=$bdd->prepare('SELECT id, nom, short, image, longimage, resume, description, site FROM acteurs WHERE id=:id');
	$infos->bindValue(':id', $id_acteur);
	$infos->execute();
	while($i = $infos->fetch())
	{
		?>
		<h2><b><?php echo $i['nom']?></b></h2>
		<div class="pres"> <!--Chercher les informations de chaque acteur-->
		<img class="longlogo>"
		src="<?php echo $i['longimage'];?>"
		alt="Logo de <?php echo $i['nom'];?>"
		width="800" height="190">
		<h2><a href="<?php echo $i['site'];?>">Site du groupe</a></h2>
		<?php echo $i['description'];?>
		</div>
		<br><br><br><br><br>

		<div class=commentaires>
		<div class=avis_com> <!--Transmetres l'ID de l'acteur pour les commentaires et les likes/dislikes-->
		<a href="commentaires.php?id=<?php echo $i['id'];?>" class="button"><b>Ecrire un commentaire</b></a>
		<form id="like" action="actions/like.php?t=1&id=<?php echo $i['id'];?>" method="POST">
		<input type="image" src="images/good.png" alt="J'aime cette entreprise" height="100" width="100">
		</form> 
		<form id="dislike" action="actions/like.php?t=2&id=<?php echo $i['id'];?>" method="POST">
		<input type="image" src="images/bad.png" alt="Je n'aime pas cette entreprise" height="100" width="100">
		</form><?php
	}
	?>
	<i class="fas fa-thumbs-up"></i>
	
	<?php /*Afficher le nombre de likes et de dislikes avec l'icone pouce en l'air/pouce en bas*/
	$like=$bdd->prepare('SELECT COUNT(*) FROM liq WHERE id_acteur=:id_acteur');
	$like->bindValue(':id_acteur', $id_acteur);
	$like->execute();
	$count = $like->fetchColumn();
	print  $count ;
	?>
	<i class="fas fa-thumbs-down"></i>
	<?php
	$like=$bdd->prepare('SELECT COUNT(*) FROM disliq WHERE id_acteur=:id_acteur');
	$like->bindValue(':id_acteur', $id_acteur);
	$like->execute();
	$count = $like->fetchColumn();
	print  $count ;

	?></div>

	<?php /*Afficher les commentaires pour l'acteur designé*/
	$commentaires=$bdd->prepare('SELECT id_acteur,prenom, texte,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires WHERE id_acteur=:id');
	$commentaires->bindValue(':id', $id_acteur);
	$commentaires->execute();
	while($c = $commentaires->fetch())
	{
		?>
		<div class="commentaire"><b><?=$c['prenom'] ?></b>&nbsp;&nbsp;&nbsp;<br><i><?= $c['date_commentaire_fr'] ?></i><br><?=$c['texte'] ?></div>
		<?php
	}
	?>
	</div>
	<?php include("footer.php");
}
else
{
	echo "Vous devez être connecté pour accéder au contenu du site";
}