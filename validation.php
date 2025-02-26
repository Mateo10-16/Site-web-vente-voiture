<?php
session_start();
if(!isset($_SESSION['panier'])){      //si $_SESSION['panier'] n'existe pas !
$_SESSION['panier']=array();		  //Je crée les variables
$_SESSION['panier']['nom'] = array();
$_SESSION['panier']['prix'] = array();
}
?>

<html>
<head>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=utf-8" />
</head>
<body>
<center><H1>VOTRE PANIER</H1></center>
<?php
if(isset($_GET['modele']) && isset($_GET['modele'])){
	array_push($_SESSION['panier']['nom'],$_GET['modele']);
	array_push($_SESSION['panier']['prix'],$_GET['prix']);
	/*echo"<pre>";
	print_r($_SESSION['panier']);
	echo"</pre>";
	*/
}
if(isset($_SESSION['panier']['nom'][0])){
	//$tableau=array_combine($_SESSION['panier']['nom'],$_SESSION['panier']['prix']);
	$total=0;
	echo"<table>";
	echo"<tr><th>Désignation de l'article</th><th>Prix</th></tr>";
	for($j=0; $j<count($_SESSION['panier']['nom']);$j++)
	{
		$total+=$_SESSION['panier']['prix'][$j];
		echo"<tr><td>".$_SESSION['panier']['nom'][$j]."</td><td>".$_SESSION['panier']['prix'][$j]."€</td></tr>";
	}
	echo"<tr><td><Strong>TOTAL</td><td>".$total." € </Strong></td></tr>";
	echo"</table>";
}
else {
	echo"<br>Votre panier est vide<br>";
}
?>
<a href="espace-membre.php" >SOMMAIRE</a>
<br>
<a href="deconnexion.php" >Déconnexion</a>
</br>
<body>
</html>