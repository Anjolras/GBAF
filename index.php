<?php
// Colors : Détails/menu (rouge) =  rgb(255,0,0) | Texte (noir) = rgb(0,0,0) | Background (vert-beige) = rgb(234, 244, 211) | background footer ? (gris argenté) = rgb(105, 116, 124) | texte important ? (beige marrant) = rgb(253, 232, 196)
session_start();
$connected = true;
$compte = false;
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- En tête -->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="style.css"/>
		<title>GBAF: Groupement Banque-Assurance Français</title>
	</head>
	<header>
		<img class="logo"
		src="logo.png"
		alt="Logo GBAF">
<nav>
			<a href="inscription.php">S'inscrire</a>
			<a href="connexion.php">Se connecter</a>
</nav>
	</header>
	<body>
<?php 
if ($connected)
{
	?>
</br></br>
			<p><h1>Le Groupement Banque-Assurance Français est l'assocation des plus grand groupes français! </h1></br></br></br></br></br></br>

			<!-- Illustration pour le site
			<img class="illustration"
			src="illust.png"
			alt="Illustration GBAF"> -->

			<p><h2>Cette collaboration s'effectue entre ces six pilliers du monde des banques et des assurances!</h2></p></br></br></br>
	<menu>
		<li><img class="Logo de BNP Paribas"
			src="bnp-logo.png"
			alt="Logo de BNP Paribas"
			width="300" height="50"></br>
	On ne présente plus le groupe BNP Paribas. Présent sur l'integralité du globe et couvrant aussi bien l'espace bancaire que celui des assurances, c'est le grand groupe français par excellence.</br>
	<a href=https://group.bnpparibas>Site du groupe</a>
		</li>
	<p></p>
		<li><img class="Logo de BPCE"
			src="bpce-logo.png"
			alt="Logo de BPCE"
			width="300" height="80"></br></br></br>
	Le nom de BPCE de nous dis rien? Si je commence à parler de la caisse d'épargne ou de la banque populaire, ce sera tout de suite plus clair, non? En effet, ce grand groupe possède 14 banques populaires et 15 Caisse d'Epagne. Sa banque d'investissement : Natixis a été élue la plus innovante du monde.</br>
	<a href=https://https://groupebpce.com>Site du groupe</a></li>
	<p></p>
		<li><img class="Logo du Crédit Agricole"
			src="creda-logo.png"
			alt="Logo du Crédit Agricole"
			width="300" height="80"></br></br></br>
	La réputation du Crédit Agricole n'est plus à refaire mais sachez cependant qu'il s'agit du plus grand réseau de banques coopératives et mutualistes au monde!</br>
	<a href=https://www.credit-agricole.fr>Site du groupe</a></li>
	<p></p>
		<li><img class="Logo du Crédit Mutuel"
			src="cremut-logo.png"
			alt="Logo du Crédit Mutuel"
			width="300" height="50 "></br></br></br>
	Téléphonie, monétique, télésurveillance résidentielle et des médias. Voilà tout ce que le crédit mutuel fait en plus d'être une assurance réputée et plusieurs fois gagnante du titre de meilleure banque de France.</a></br>
	<a href=https://https://www.creditmutuel.fr>Site du groupe</a></li>
	<p></p>
		<li><img class="Logo de la Société générale"
			src="sogenal-logo.png"
			alt="Logo de la Société générale"
			width="300" height="50 "></br></br></br>
	La société générale est une des banques les plus anciennes de France. C'est la banque qui vous conseille depuis 156 ans!</a></br>
	<a href=https://particuliers.societegenerale.fr>Site du groupe</a></li>
	<p></p>
		<li><img class="Logo de la Banque Postale"
			src="banqpo-logo.png"
			alt="Logo de la Banque Postale"
			width="300" height="50 "></br></br></br>
	Voilà une entreprise dont tout le monde est client. Assez récente sur le marché, la banque postale a cependant su devenir très appréciée auprès des français. Son service d'assurance est aussi très populaire au point d'être devenu en 2013 l'assurance numéro 1 des français </a></br>
	<a href=https://www.labanquepostale.fr>Site du groupe</a></li>
	</menu>
	</body>
	<footer>
		<p><a href=mentionslegales.html>| Mentions légales |</a><a href=contact.html> Contact |</a></p>
		</html>
	</footer>
	<?php
	;
}
else
	{
		?>
		Vous devez vous connecter pour accéder au contenu de ce site
	<?php
	;
	}
?>