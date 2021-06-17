<?php include("header.php"); ?>
<?php include("bdd.php"); ?>
<?php
$infos=$bdd->query('SELECT id, nom, short, image, longimage, resume, site FROM acteurs');

if(isset($_SESSION['prenom']) AND isset($_SESSION['nom'])) /*Vérification de session*/
{
	?>

	<br><br><p><h1>Le Groupement Banque-Assurance Français est l'assocation d'entreprises parmis les plus puissantes de France! </h1>

	<p><img class="illus"
	src="images/gbaf-banniere.png"
	alt="Illustration GBAF"></p>

		<p><img class="illus-mobile"
	src="images/gbaf-banniere.png"
	alt="Illustration GBAF"
	width="400" height="100"></p>

	<h2>Cette collaboration s'effectue entre différents acteurs. Cette page vise à faire connaitre nos partenaires et recueillir les avis sur ceux-ci.</h2>

	<div class="acteurs">
	<?php /*Récupération des données pour chaque acteur*/
	while($i = $infos->fetch()) 
	{
		?>
		<article class="module"><img class="logo"
		src="<?php echo $i['image'];?>"
		alt="Logo de <?php echo $i['nom'];?>"
		width="180" height="75">
		<img class="biglogo"
		src="<?php echo $i['image'];?>"
		alt="Logo de <?php echo $i['nom'];?>"
		width="200" height="75">
		<h3><?php echo $i['resume'];?> <br></h3>
		<a href="<?php echo $i['site'];?>">Site du groupe</a>
		<a class="INFO" href="acteurs.php?id=<?php echo $i['id'];?>">
		Lire la suite</a></article>
		<?php
	}
	?>
	</div>
	<?php include("footer.php");
}
else
{
	echo '<br><br><br><p>Vous devez vous connecter pour accéder au contenu de ce site</p>';
}