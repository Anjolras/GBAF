<?php include("header.php"); ?><link href="styles/bouton.css" rel="stylesheet" type="text/css" media="all" />
<link href="styles/commentaire.css" rel="stylesheet" type="text/css" media="all" />
<?php include("bdd.php");
$id_acteur=$_GET['id'];
$id_membre=$_SESSION['id'];
$infos=$bdd->prepare('SELECT id, nom, short, image, longimage, resume, description, site FROM acteurs WHERE id=:id');
$infos->bindValue(':id', $id_acteur);
$infos->execute();

while($i = $infos->fetch())
	{
	?>
	<body>
	<h1><b><?php echo $i['nom']?></b></h1>
	<div class="pres"> <!--Chercher les informations de chaque acteur-->
	<p><img class="longlogo>"
			src="<?php echo $i['longimage'];?>"
			alt="Logo de <?php echo $i['nom'];?>"
			width="800px" height="190px">
	<h2><p><a href=<?php echo $i['site'];?>>Site du groupe</a></h2></p>
	<h2><p><?php echo $i['description'];?></h2></p>
	</div>
	</br></br></br></br></br>

	<div class=commentaires>
	<div class=avis_com> <!--Transmetres l'ID de l'acteur pour les commentaires et les likes/dislikes-->
	<a href=commentaires.php?id=<?php echo $i['id'];?> class="button"><b>Ecrire un commentaire</b></a>
	<form id="like" action="actions/like.php?t=1&id=<?php echo $i['id'];?>" method="POST">
	<input type="image" src="images/good.png" value="J'aime cette entreprise" height="100px" width="100px">
	</form> 
	<form id="dislike" action="actions/like.php?t=2&id=<?php echo $i['id'];?>" method="POST">
	<input type="image" src="images/bad.png" value="Je n'aime pas cette entreprise" height="100px" width="100px">
	</form>
<?php
	}
?>
	<i class="fas fa-thumbs-up"></i>
	
	<?php /*Afficher le nombre de likes et de dislikes avec l'icone pouce en l'air/pouce en bas*/
$sql = "SELECT COUNT(*) FROM liq WHERE id_acteur=$id_acteur";
$res = $bdd->query($sql);
$count = $res->fetchColumn();

print  $count ;
	?>
	<i class="fas fa-thumbs-down"></i>
	<?php
		$sql = "SELECT COUNT(*) FROM disliq WHERE id_acteur=$id_acteur";
$res = $bdd->query($sql);
$count = $res->fetchColumn();

print  $count ;

?></div>

<?php /*Afficher les commentaires pour l'acteur designé*/
$commentaires=$bdd->prepare('SELECT id_acteur,prenom, texte,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr FROM commentaires WHERE id_acteur=:id');
$commentaires->bindValue(':id', $id_acteur);
$commentaires->execute();
while($c = $commentaires->fetch())
{
	?>
	<article class="commentaire"><b><?=$c['prenom'] ?></b>&nbsp;&nbsp;&nbsp;</br><i><?= $c['date_commentaire_fr'] ?></i></br><?=$c['texte'] ?></article>
	<?php
}?>
</div></body> 
<?php include("footer.php");
?>

</html>