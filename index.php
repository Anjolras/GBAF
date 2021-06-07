<?php include("header.php"); ?>
<?php include("bdd.php"); 
$infos=$bdd->query('SELECT id, nom, short, image, longimage, resume, site FROM acteurs');
?>
	<body>
 <?php
if(isset($_SESSION['prenom']) AND isset($_SESSION['nom'])) /*Vérification de session*/
{
	?>

			</br></br><p><h1>Le Groupement Banque-Assurance Français est l'assocation d'entreprises parmis les plus puissantes de France! </h1>

			<p><img class="illus"
			src="images/gbaf-banniere.png"
			alt="Illustration GBAF"></p>

			<p><h2>Cette collaboration s'effectue entre six pilliers du monde des banques et des assurances qui ont fait leur preuve et qui décideront de l'avenir de ces mondes en France.</h2></p>

	<section class="acteurs">
	<?php /*Récupération des données pour chaque acteur*/
	while($i = $infos->fetch()) 
	{
		?>
		<article class="module"><img class="logo"
		src="<?php echo $i['image'];?>"
		lt="Logo de <?php echo $i['nom'];?>"
		width="75" height="75">
		<img class="biglogo"
		src="<?php echo $i['longimage'];?>"
		lt="Logo de <?php echo $i['nom'];?>"
		width="160" height="50">
		<h3><?php echo $i['resume'];?> </br></h3>
		<a href=<?php echo $i['site'];?>>Site du groupe</a>

		<a href=acteurs.php?id=<?php echo $i['id'];?>><input class="INFO"
		type="button"
		value="Lire la suite"></a></article>
		<?php
	}
	?>
	</section>
	</body>
	<?php include("footer.php");
}
else
{
	echo '</br></br></br><p>Vous devez vous connecter pour accéder au contenu de ce site</p>';
}