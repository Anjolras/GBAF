<?php include("header.php");
include("bdd.php");
if(isset($_POST['commentaire'])) 
{
	if(isset($_POST['commentaire']) AND !empty($_POST['commentaire']))
	{
		$prenom=($_SESSION['prenom']);
		$commentaire=($_POST['commentaire']);
		$date = date("Y-m-d H:i:s");
		$id_acteur = $_GET['id'];

		$ins = $bdd-> prepare('INSERT INTO commentaires(prenom, id_acteur, texte, date_commentaire) VALUES (?,?,?,?)');
		$ins->execute(array($prenom,$id_acteur,$commentaire,$date));
		$c_msg="<span style='color:green'>Votre commentaire a bien été posté</span>";
		header('Location:http://gbaf/acteurs.php?id=' . $id_acteur);
	}
	else
	{
		$c_erreur = "Il est impossible d'envoyer un commentaire vide";
	}
}


?>
<form method='POST'>
	<textarea name="commentaire" placeholder="Votre commentaire" rows="7" cols="80"></textarea><br />
	<input type="submit" value="Poster un commentaire" name="commentaire_post">
</form>
<?php if(isset($c_erreur)) {echo "Erreur: ". $c_erreur; } ?>
<?php if(isset($c_msg)) { echo $c_msg;}?>
<br/><div class="commentaires">
