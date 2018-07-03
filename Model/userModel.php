<?php
/**
 * Created by PhpStorm.
 * User: aurelienantonio
 * Date: 03/07/2018
 * Time: 12:52
 */

function getMembre($nickname, $password){

    include('bdd_connection.php');

//récupération du user avec le bon nickname
    $req = $bdd->prepare('SELECT ID, password FROM membres WHERE nickname = :nickname');
    $req->execute(array(
        'nickname' => $nickname
    ));
    $resultat = $req->fetch();
    return $resultat;
}
