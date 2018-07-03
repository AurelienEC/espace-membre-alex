<?php
/**
 * Created by PhpStorm.
 * User: aurelienantonio
 * Date: 03/07/2018
 * Time: 12:40
 */

function home(){
    require_once("View/connectionView.php");
}
function connexion(){
    require_once 'userModel.php';
    $password = htmlspecialchars($_POST['password']);
    $nickname = htmlspecialchars($_POST['nickname']);
    $membre = getMembre($nickname, $password);
    if (!$membre)
    {
        echo 'Mauvais identifiant ou mot de passe <br />';
    }
    else
    {
        $isPasswordCorrect = password_verify($password, $membre['password']);
        if($isPasswordCorrect)
        {
            $_SESSION['id'] = $membre['ID'];
            $_SESSION['pseudo'] = $nickname;
           require_once 'View/connectedView';
        }
        else
        {
            $incorrectPassword = true;
            require_once('View/connectionView.php');
        }
    }


}