<?php include("header.php"); ?>
<?php include("bdd.php"); 
$infos=$bdd->query('SELECT id, nom, short, image, resume, site FROM acteurs');
?>
	<body>
 <?php
if(isset($_SESSION['prenom']) AND isset($_SESSION['nom']))
{
	?>

			<p><h1>Le Groupement Banque-Assurance Français est l'assocation d'entreprises parmis les plus puissantes de France! </h1>

			<!-- Illustration pour le site
			<img class="illustration"
			src="illust.png"
			alt="Illustration GBAF"> -->

			<p><h2>Cette collaboration s'effectue entre six pilliers du monde des banques et des assurances qui ont fait leur preuve et qui décideront de l'avenir de ces mondes en France.</h2></p>

<section class="acteurs">
	<?php
	while($i = $infos->fetch())
	{
		?>
				<article class="module"><img class="logo-<?php echo $i['nom'];?>"
					src="<?php echo $i['image'];?>"
					alt="Logo de <?php echo $i['nom'];?>"
					width="75" height="75">
			<h3><?php echo $i['resume'];?> </br></h3>
			<a href=<?php echo $i['site'];?>>Site du groupe</a>

			<a href=bnp.php><input class="INFO"
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