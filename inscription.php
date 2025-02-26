<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <form action="verification.php" method="post">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required />
            
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required />
            
            <label for="login">Nom d'utilisateur</label>
            <input type="text" id="login" name="login" placeholder="Nom d'utilisateur" required />
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required />
            
            <label for="password_verif">Retapez votre mot de passe</label>
            <input type="password" id="password_verif" name="password_verif" placeholder="Retapez votre mot de passe" required />
            
            <input type="submit" value="S'inscrire" />
        </form>
    </div>
</body>
</html>
