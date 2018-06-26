<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription POST - Espace Membres</title>
    </head>
    <body>
    <?php
            // Booléen à vrai par défaut, passe à faux si le nickname est déjà utilisé pour un autre compte.
            $nicknameCreationAuthorized = true;
            $mailCreationAuthorized = true;
            $passwordCreationAthorized = true;

            // connexion BDD
            include('bdd_connection.php');

            //Récupération des nicknames en base
            $nickname = htmlspecialchars($_POST['nickname']);
            $req = $bdd->prepare('SELECT * FROM membres WHERE `nickname`=:nickname');
            $req -> execute(array(
                'nickname' => $nickname
            ));

            //Si nickname existe déjà, on bloque la création
            while ($donnees = $req->fetch())
            {
                echo 'Merci de choisir un autre pseudo. <br />' ;
                $nicknameCreationAuthorized = false;
            }

            //Comparaison des 2 mots de passe
            $password = htmlspecialchars($_POST['password']);
            $password_confirmation = htmlspecialchars($_POST['password_confirmation']);

            if (strcmp($password, $password_confirmation) !== 0)
            {   
                echo 'Les 2 mdp sont différents <br />';
                $passwordCreationAthorized = false;
            }
            else
            {
                //On hashe le mdp, pour prepa avant de créer le pseuod en BDD
                $passwordHashed = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
            }

            //Récupération des mails dans la base
            $mail = htmlspecialchars($_POST['mail']);
            $req2 = $bdd->prepare('SELECT * FROM membres WHERE `mail`=:mail');
            $req2 -> execute(array(
                'mail' => $mail
            ));

            //Si mail existe déjà, on bloque la création
            while ($donnees = $req2->fetch())
            {
                echo 'Merci de choisir un autre mail. <br />' ;
                $mailCreationAuthorized = false;
            }

            //Validité de l'adresse mail renseignée
            if (isset($_POST['mail']))
            {
            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
            {
                echo 'Adresse mail non valide';
                $mailCreationAuthorized = false;
            }
        }

        //Création d'un nouveau membre si tout est OK
        if ($nicknameCreationAuthorized AND $mailCreationAuthorized AND $passwordCreationAthorized)
        {
            $req = $bdd->prepare('INSERT INTO membres (nickname, password, mail) VALUES(:nickname, :password, :mail)');
            $req -> execute(array(
                'nickname' => $nickname,
                'password' => $passwordHashed,
                'mail' => $mail
            ));
            echo 'Votre profil a bien été créé, merci !';
        }
        else
        {
            echo 'Votre profil n\'a pas pu être créé.';
        }


    ?>

    </body>
</html>