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

<center><H1>NIKE</H1><img src="IMG/nike.jpg"><br></center>
<form method =get action=validation.php>
<input type="submit" class="submit1" alt="Submit button" name="modele" value="fly" />
<input type="hidden" name="prix" value="190">
</form>
<br>
FLY <br>190 €<br>
<form method =get action=validation.php>
<input type="submit" class="submit2" alt="Submit button" name="modele" value="pegasus" /><br>
<input type="hidden" name="prix" value="170">
</form>
PEGASUS <br>170 €<br>
<form method =get action=validation.php>
<input type="submit" class="submit3" alt="Submit button" name="modele" value="vapor" /><br>
<input type="hidden" name="prix" value="150">
VAPOR <br>150 €<br>


</form>
<a href="validation.php">VOIR LE PANIER</a>
<br>
<a href="deconnexion.php" >Déconnexion</a>
</br>
</body>
</html>