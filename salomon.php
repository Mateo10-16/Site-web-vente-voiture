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
<link href="myStyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<center><H1>SALOMON</H1><img src="IMG/salomon.png"><br></center>
<form method =get action=validation.php>
<input type="submit" class="submit4" alt="Submit button" name="modele" value="speedcross" /><br>
<input type="hidden" name="prix" value="190">
</form>
speedcross <br>190 €<br>
<form method =get action=validation.php>
<input type="submit" class="submit5" alt="Submit button" name="modele" value="slab" /><br>
<input type="hidden" name="prix" value="170">
</form>
SLAB <br>170 €<br>
<form method =get action=validation.php>
<input type="submit" class="submit6" alt="Submit button" name="modele" value="xapro3d" /><br>
XA Pro 3D <br>150 €<br>
<input type="hidden" name="prix" value="150">

</form>
<a href="validation.php">VOIR LE PANIER</a>
<br>
<a href="deconnexion.php" >Déconnexion</a>
</br>
</body>
</html>