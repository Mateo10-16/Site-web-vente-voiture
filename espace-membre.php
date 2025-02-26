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
	
<center><H1>SOMMAIRE</H1>
<a href=nike.php><img src=IMG/nike.jpg></a>
<a href=salomon.php><img src=IMG/salomon.png></a>
<a href=hoka.php><img src=IMG/hoka.jpg></a>
</center>

</body>
<br>
<a href="deconnexion.php" >Déconnexion</a>
</br>
<a href="validation.php">VOIR LE PANIER</a>
</html>