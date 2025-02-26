<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8">
<html>
    <head>
    <link rel="stylesheet" href="style.css">
        <title>
            Inscription
        </title>
        <H1>Luxury Car</H1>
        <H5>(Veuillez vous connecter a votre espace client)</H5>
    </head>
    <body>
        <form action="connexion.php" method="POST">
            <table>
                <tr><th><label for='login'>Login :</label></th><th><input type="text" id="login" name="login" required pattern="[A-Za-z '\-]+" maxlength="30"></th></tr>
                <tr><th><label for="password">Password :</label></th><th><input type="password" id="password" name="password" required pattern=
                "(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[#?!@$%^&*_+\-]).{12,}"></th></tr>
            </table>
            <input type="submit" value="Connexion"/>
        <form>
    </body>
</html>
        <button onclick="document.location='inscription.php'">Inscription</button>
    </body>
</html>