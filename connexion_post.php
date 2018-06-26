<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
    </head>
    <body>
    <?php
        // connexion BDD
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=tests', 'root', 'root');
        }
        catch (Exception $e)
        {
            die('Erreur : '. $e->getMessage());
        }

        //Variables
        $nickname = htmlspecialchars($_POST['nickname']);
        $password = htmlspecialchars($_POST['password']);

        //récupération du user avec le bon nickname
        $req = $bdd->prepare('SELECT ID, password FROM membres WHERE nickname = :nickname');
        $req->execute(array(
            'nickname' => $nickname
        ));
        $resultat = $req->fetch();

        echo $resultat;

        $isPasswordCorrect = password_verify($password, $resultat['password']);
        echo 'Password Correct: ' .$isPasswordCorrect;

        if (!$resultat) 
        {
            echo 'Mauvais identifiant ou mot de passe <br />';
        }
        else
        {
            if($isPasswordCorrect)
            {
                $_SESSION['id'] = $resultat['ID'];
                $_SESSION['pseudo'] = $nickname;
                echo 'Vous êtes connecté !';
            }
            else
            {
                echo 'Mauvais identifiant ou mot de passe';
            }
        }

    ?>
    </body>
</html> 
