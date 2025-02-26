<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
        <title>Vérification</title>
    </head>
    <body>
    <?php
    include_once("bdd_connect.php");


    $_POST = array_map('validation_donnees', $_POST);

    if (
        !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['login']) &&
        !empty($_POST['password']) &&
        !empty($_POST['password_verif']) &&
        $_POST['password'] === $_POST['password_verif']
    ) {
        try {
            $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . BDD, LOGIN, MDP);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $select = $conn->prepare("SELECT login FROM login WHERE login = :login");
            $select->bindParam(':login', $_POST['login']);
            $select->execute();

            $user = $select->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                echo "<h1>Erreur : Ce nom d'utilisateur est déjà pris.</h1>";
                echo '<meta http-equiv="refresh" content="3; URL=inscription.php">';
            } else {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $insert = $conn->prepare("
                    INSERT INTO login (nom, prenom, login, password) 
                    VALUES (:nom, :prenom, :login, :password)
                ");
                $insert->bindParam(':nom', $_POST['nom']);
                $insert->bindParam(':prenom', $_POST['prenom']);
                $insert->bindParam(':login', $_POST['login']);
                $insert->bindParam(':password', $_POST['password']);
                $insert->execute();

                echo "<h1>Inscription réussie !</h1>";
                echo '<meta http-equiv="refresh" content="2; URL=index.php">';
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "<h1>Veuillez remplir tous les champs correctement.</h1>";
        echo '<meta http-equiv="refresh" content="3; URL=inscription.php">';
    }
    ?>
    </body>
</html>