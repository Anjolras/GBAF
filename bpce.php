<?php include("header.php"); ?>
<body>
<div class="image_middle"><img class="logo"
		src="longlogbpce.png"
		alt="Logo de la BPCE"
		width="324" height="129"></div>

<div class="pres">
<h2><a href=https://https://groupebpce.com>Site du groupe</a></h2>
<h2>Le nom de BPCE de nous dis rien? Si je commence à parler de la caisse d'épargne ou de la banque populaire, ce sera tout de suite plus clair, non? En effet, ce grand groupe possède 14 banques populaires et 15 Caisse d'Epagne. Sa banque d'investissement : Natixis a été élue la plus innovante du monde.</h2>
</div>

<?php
$bdd= new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8','root','');
$commentaires=$bdd->query('SELECT prenom, texte ,DATE_FORMAT(date_commentaire, \'%d/%m/%Y\') AS date_commentaire_fr, avis FROM commentaires_bpce');
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
		$avis = ($_POST['avis']);


		$ins = $bdd-> prepare('INSERT INTO commentaires_bpce(prenom, texte, date_commentaire, avis) VALUES (?,?,?,?)');
		$ins->execute(array($prenom,$commentaire,$date,$avis));
		$c_msg="<span style='color:green'>Votre commentaire a bien été posté</span>";
	}
	else
	{
		$c_erreur = "Il est impossible d'envoyer un commentaire vide";
	}
}
	
	if ($avis = 0)
	{
		$c['avis']='<img class="thbas"
		src="thbas.png"
		width="100" height="100">' ;
	}

?>
<form method='POST'>
	<textarea name="commentaire" placeholder="Votre commentaire"></textarea><br />
	Votre expérience avec cet acteur est plutôt:
	<input type="radio" name="avis" value="true" /> Bonne <input type="radio" name="avis" value="false" /> Mauvaise</br>
	<input type="submit" value="Poster un commentaire" name="commentaire_post">
</form>
<?php if(isset($c_erreur)) {echo "Erreur: ". $c_erreur; } ?>
<?php if(isset($c_msg)) { echo $c_msg;}?>
<br/><div class="commentaires">
<?php while($c = $commentaires->fetch())
{
		?>
		<article class="commentaire"><p><?= $c['prenom'] ?></p> <p><?= $c['date_commentaire_fr'] ?></p> <p><?=$c['texte'] ?></p><p><?= $c['avis']?></p></article>
	<?php
;}?>
</div></body> 
	<?php include("header.php");