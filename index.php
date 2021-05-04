<?php
// Colors : Détails/menu (rouge) =  rgb(255,0,0) | Texte (noir) = rgb(0,0,0) | Background (vert-beige) = rgb(234, 244, 211) | background footer ? (gris argenté) = rgb(105, 116, 124) | texte important ? (beige marrant) = rgb(253, 232, 196)
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- En tête -->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css"/>
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab&display=swap');
</style>
		<title>GBAF: Groupement Banque-Assurance Français</title>
	</head>
	<header>
		<img class="logo"
		src="logo.png"
		alt="Logo GBAF"
		width="130" height="150">
<?php
	if(!isset($_SESSION['prenom']) AND !isset($_SESSION['nom']))
	{
	?>
	<nav>
				<a href="inscription.php">S'inscrire     </a>
			</br>
				<a href="connexion.php">     Se connecter</a>
	<?php
	}

	else
	{
	echo '</br>Bienvenue, ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
	}
?>
</nav>
	</header>
	<body>
 <?php
if(isset($_SESSION['prenom']) AND isset($_SESSION['nom']))
{
	?>
</br></br>
			<p><h1>Le Groupement Banque-Assurance Français est l'assocation d'entreprises parmis les plus puissantes de France! </h1></br></br></br></br>

			<!-- Illustration pour le site
			<img class="illustration"
			src="illust.png"
			alt="Illustration GBAF"> -->

			<p><h2>Cette collaboration s'effectue entre six pilliers du monde des banques et des assurances qui ont fait leur preuve et qui décideront de l'avenir de ces mondes en France.</h2></p></br></br></br>

<section class="acteurs">

		<article class="module"><img class="Logo de BNP Paribas"
			src="bnp-logo.png"
			alt="Logo de BNP Paribas"
			width="150" height="150"><h3>BNP Paribas</h3>
	On ne présente plus le groupe BNP Paribas. Présent sur l'integralité du globe et couvrant aussi bien l'espace bancaire que celui des assurances, c'est le grand groupe français par excellence.</br>
	<a href=https://group.bnpparibas>Site du groupe</a>

	<a href=bnp.php><input class="INFO_BNP"
       type="button"
       value="Lire la suite"></a></article>

		<article class="module"><img class="Logo de BPCE"
			src="bpce-logo.png"
			alt="Logo de BPCE"
			width="150" height="150"><h3>BPCE</h3>
	Le nom de BPCE de nous dis rien? Si je commence à parler de la caisse d'épargne ou de la banque populaire, ce sera tout de suite plus clair, non? En effet, ce grand groupe possède 14 banques populaires et 15 Caisse d'Epagne. Sa banque d'investissement : Natixis a été élue la plus innovante du monde.</br>
	<a href=https://https://groupebpce.com>Site du groupe</a>

<a href=bpce.php><input class="INFO_BPCE"
       type="button"
       value="Lire la suite"></a>
</article>


		<article class="module"><img class="Logo du Crédit Agricole"
			src="creda-logo.png"
			alt="Logo du Crédit Agricole"
			width="150" height="150"><h3>Crédit agricole</h3>
	La réputation du Crédit Agricole n'est plus à refaire mais sachez cependant qu'il s'agit du plus grand réseau de banques coopératives et mutualistes au monde!</br>
	<a href=https://www.credit-agricole.fr>Site du groupe</a>

<a href=creda.php><input class="INFO_CREDA"
       type="button"
       value="Lire la suite"></a></article>
</article>

		<article class="module"><img class="Logo du Crédit Mutuel"
			src="cremut-logo.png"
			alt="Logo du Crédit Mutuel"
			width="150" height="150 "><h3>Crédit Mutuel</h3>
	Téléphonie, monétique, télésurveillance résidentielle et des médias. Voilà tout ce que le crédit mutuel fait en plus d'être une assurance réputée et plusieurs fois gagnante du titre de meilleure banque de France.</a></br>
	<a href=https://https://www.creditmutuel.fr>Site du groupe</a>

<a href=credimut.php><input class="INFO_CREDIMUT"
       type="button"
       value="Lire la suite"></a></article>

		<article class="module"><img class="Logo de la Société générale"
			src="sogenal-logo.png"
			alt="Logo de la Société générale"
			width="150" height="150 "><h3>Société générale</h3>
	La société générale est une des banques les plus anciennes de France. C'est la banque qui vous conseille depuis 156 ans!</a></br>
	<a href=https://particuliers.societegenerale.fr>Site du groupe</a>

<a href=banqpo.php><input class="INFO_BANQPO"
       type="button"
       value="Lire la suite"></a></article>

		<article class="module"><img class="Logo de la Banque Postale"
			src="banqpo-logo.png"
			alt="Logo de la Banque Postale"
			width="150" height="150 "><h3>La banque postale</h3>
	Voilà une entreprise dont tout le monde est client. Assez récente sur le marché, la banque postale a cependant su devenir très appréciée auprès des français. Son service d'assurance est aussi très populaire au point d'être devenu en 2013 l'assurance numéro 1 des français </a></br>
	<a href=https://www.labanquepostale.fr>Site du groupe</a>

<a href=banqpo.php><input class="INFO_BANQPO"
       type="button"
       value="Lire la suite"></a></article>

</section>
	</body>
	<footer>
		<p><a href=mentionslegales.html>| Mentions légales |</a><a href=contact.html> Contact |</a></p>
		</html>
	</footer>
	<?php
}
else
{
		echo '</br></br></br><p>Vous devez vous connecter pour accéder au contenu de ce site</p>';
}