<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription - Espace Membres</title>
        <link rel="stylesheet" href="style.css" />

    </head>
    <body>
    <?php
    //Infos de session
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo 'Bonjour ' . $_SESSION['pseudo'];
        }
        else
        {
            echo 'Vous n\'êtes pas connecté <br />';
        }
    ?>
        <form action="inscription_post.php" method="post">
            <label for="nickname">Pseudo: </label>
            <input type="text" name="nickname" value="" /> <br />
            <label for="password">Mot de passe: </label>
            <input type="password" name="password"/> <br />
            <label for="password_confirmation">Retapez votre mot de passe: </label>
            <input type="password" name="password_confirmation"/> <br />
            <label for="mail">Adresse mail: </label>
            <input type="email" name="mail" value="" /> <br />
            <input type="submit" value="Envoyer"/>
        </form>
    </body>
</html>