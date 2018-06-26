<?php
/**
 * Created by PhpStorm.
 * User: aurelienantonio
 * Date: 26/06/2018
 * Time: 12:59
 */

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tests', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}
