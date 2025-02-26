<?php
session_start();
include("bdd_connect.php");

// Vérifier si l'utilisateur est admin
if (!isset($_SESSION["Admin"]) || $_SESSION["Admin"] != 1) {
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
    exit();
}

$conn = new PDO("mysql:host=".SERVER.";dbname=".BDD, LOGIN, MDP);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Suppression d'un utilisateur
if (isset($_POST['delete_user'])) {
    try {
        $delete_user = validation_donnees($_POST['delete_user']);
        
        // Vérifier si l'utilisateur est un admin
        $check_admin = $conn->prepare("SELECT admin FROM login WHERE login = :login;");
        $check_admin->bindParam(':login', $delete_user);
        $check_admin->execute();
        $admin_status = $check_admin->fetch(PDO::FETCH_ASSOC);
        
        if ($admin_status && $admin_status['admin'] == 1) {
            echo '<h1>Impossible de supprimer un administrateur</h1>';
        } else {
            $delete = $conn->prepare("DELETE FROM login WHERE login = :login;");
            $delete->bindParam(':login', $delete_user);
            $delete->execute();
            
            echo '<h1>Utilisateur supprimé avec succès</h1>';
        }
        echo '<meta http-equiv="refresh" content="2; URL=admin.php">';
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupérer la liste des utilisateurs
$select = $conn->prepare("SELECT login, nom, prenom, admin FROM login");
$select->execute();
$users = $select->fetchAll(PDO::FETCH_ASSOC);
if (isset($_SESSION["Prénom"]) && isset($_SESSION["Nom"])) {
    echo 'Bonjour ' . $_SESSION["Prénom"] . " " . $_SESSION["Nom"];
    echo "<br><p>Bienvenue sur votre espace administrateur</p>";
    echo "<br><p>Voulez-vous vous déconnecter ?</p>";
    echo '<button onclick="document.location=\'deconnexion.php\'">Déconnexion</button>';
} 
else {
    echo 'Veuillez vous connecter.';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des utilisateurs</title>
</head>
<body>
    <h1>Gestion des utilisateurs</h1>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['login']); ?></td>
                <td><?php echo htmlspecialchars($user['nom']); ?></td>
                <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                <td><?php echo ($user['admin'] == 1) ? 'Admin' : 'Utilisateur'; ?></td>
                <td>
                    <?php if ($user['admin'] != 1): ?>
                        <form method="POST" action="admin.php" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            <input type="hidden" name="delete_user" value="<?php echo htmlspecialchars($user['login']); ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    <?php else: ?>
                        <span>Suppression interdite</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>