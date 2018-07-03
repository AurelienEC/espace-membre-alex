<?php session_start();
require_once ('controller/frontend.php');

switch ($_GET["action"]) {
    case "connexion":
        connexion();
        break;
    default:
        home();
        break;
    }
