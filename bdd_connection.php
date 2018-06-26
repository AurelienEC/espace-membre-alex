<?php
/**
 * Created by PhpStorm.
 * User: aurelienantonio
 * Date: 26/06/2018
 * Time: 12:59
 */
require_once ('config.php');
try
{
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $pwd);
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}
