<?php
include("../header.php");
include("../bdd.php");
$id_acteur = (int) $_GET['id'];
$id_membre = (int) $_SESSION['id'];
$avis= (int) $_GET['t'];
if(isset($avis, $id_acteur, $id_membre) AND !empty ($avis) AND !empty ($id_acteur)){

	$ins = $bdd-> prepare('SELECT id from acteurs WHERE id = ?');
	$ins->execute(array($id_acteur));
	if ($ins->rowCount() == 1)
	{
		if ($avis == 1)
		{
			/*Récupération des données like pour l'acteur*/
			$repetition = $bdd->prepare('SELECT id FROM liq WHERE id_acteur = ? AND id_membre = ?');
			$repetition->execute(array($id_acteur,$id_membre));

			if($repetition->rowCount() >= 1)
			{
			/*Supression du like si il existe déjà avec le profil du membre*/
			$del = $bdd->prepare('DELETE FROM liq WHERE id_acteur = ? AND id_membre = ?');
			$del->execute(array($id_acteur,$id_membre));
			}
			else
			{
			/*Vérification de l'existence d'un dislike et supression si c'est le cas*/
			$repetition = $bdd->prepare('SELECT id FROM disliq WHERE id_acteur = ? AND id_membre = ?');
			$repetition->execute(array($id_acteur,$id_membre));

			if($repetition->rowCount() >= 1)
			{
			/*Supression du dislike si il existe déjà avec le profil du membre*/
			$del = $bdd->prepare('DELETE FROM disliq WHERE id_acteur = ? AND id_membre = ?');
			$del->execute(array($id_acteur,$id_membre));
			}
			/*Insertion du like si il n'y en a pas déjà avec le profil du membre*/
			$like = $bdd->prepare('INSERT INTO liq (id_acteur, id_membre) VALUES (?,?)');
			$like->execute(array($id_acteur,$id_membre));}
			}
		elseif ($avis == 2)
		{
			/*Récupération des données dislike pour l'acteur*/
			$repetition = $bdd->prepare('SELECT id FROM disliq WHERE id_acteur = ? AND id_membre = ?');
			$repetition->execute(array($id_acteur,$id_membre));

			if($repetition->rowCount() >= 1)
			{
			/*Supression du dislike si il existe déjà avec le profil du membre*/
			$del = $bdd->prepare('DELETE FROM disliq WHERE id_acteur = ? AND id_membre = ?');
			$del->execute(array($id_acteur,$id_membre));
			}
			else
			{
			/*Vérification de l'existence d'un like et supression si c'est le cas*/
			$repetition = $bdd->prepare('SELECT id FROM liq WHERE id_acteur = ? AND id_membre = ?');
			$repetition->execute(array($id_acteur,$id_membre));

			if($repetition->rowCount() >= 1)
			{
			/*Supression du like si il existe déjà avec le profil du membre*/
			$del = $bdd->prepare('DELETE FROM liq WHERE id_acteur = ? AND id_membre = ?');
			$del->execute(array($id_acteur,$id_membre));
			}
			/*Insertion du dislike si il n'existe pas déjà avec le profil du membre*/
			$like = $bdd->prepare('INSERT INTO disliq (id_acteur, id_membre) VALUES (?,?)');
			$like->execute(array($id_acteur,$id_membre));}
		}
	}
header("Location:../acteurs.php?id=$id_acteur");
}
else
{
	echo 'Erreur fatale.';
}

