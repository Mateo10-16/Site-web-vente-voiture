<?php
include("bdd_connect.php");

$_POST["login"] = validation_donnees($_POST['login']);
$_POST["password"] = validation_donnees($_POST['password']);

if (isset($_POST["login"]) && isset($_POST["password"])) {
    try {
        $login = $_POST["login"];
        $conn = new PDO("mysql:host=".SERVER.";dbname=".BDD, LOGIN, MDP);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Récupérer les informations de l'utilisateur, y compris le statut admin
        $select = $conn->prepare("SELECT password, nom, prenom, admin FROM login WHERE login = :login;");
        $select->bindParam(':login', $login);
        $select->execute();
        $resultat = $select->fetch(PDO::FETCH_ASSOC);
        
        if (!$resultat) {
            echo '<h1>Nom d\'utilisateur incorrect</h1>';
            echo '<meta http-equiv="refresh" content="2; URL=index.php">';
        } else {
            if (password_verify($_POST['password'], $resultat['password'])) {
                session_start();
                $_SESSION["Nom"] = $resultat["nom"];
                $_SESSION["Prénom"] = $resultat["prenom"];
                $_SESSION["Admin"] = (int)$resultat["admin"]; // Conversion TINYINT vers entier
                
                $conn = NULL;
                
                // Redirection en fonction du statut admin
                if ($_SESSION["Admin"] == 1) {
                    echo '<meta http-equiv="refresh" content="0; URL=admin.php">';
                } else {
                    echo '<meta http-equiv="refresh" content="0; URL=espace-membre.php">';
                }
            } else {
                echo '<h1>Mot de passe incorrect</h1>';
                echo '<meta http-equiv="refresh" content="3; URL=index.php">';
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo '<meta http-equiv="refresh" content="3; URL=index.php">';
}
?>
