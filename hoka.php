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

<center><H1>HOKA ONE ONE</H1><img src="IMG/hoka.jpg"><br></center>
<form method =get action=validation.php>
<input type="submit" class="submit7" alt="Submit button" name="modele" value="mafate" /><br>
<input type="hidden" name="prix" value="190">
MAFATE <br>190 €<br>
</form>
<form method =get action=validation.php>
<input type="submit" class="submit8" alt="Submit button" name="modele" value="bondi" /><br>
<input type="hidden" name="prix" value="170">
BONDI <br>170 €<br>
</form>
<form method =get action=validation.php>
<input type="submit" class="submit9" alt="Submit button" name="modele" value="clifton" /><br>
CLIFTON <br>150 €<br>
<input type="hidden" name="prix" value="150">

<br>
<a href="deconnexion.php" >Déconnexion</a>
</br>
<a href="validation.php">VOIR LE PANIER</a>
</form>
</body>
</html>