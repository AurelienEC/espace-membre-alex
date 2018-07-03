<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion - Espace Membres</title>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
<?php
if (isset($incorrectPassword ) and $incorrectPassword ){
    ?>
<div class="error"> Le mot de passe est incorrect !</div>
<?php } ?>

<form action="index.php?action=connexion" method="post">
    <label for="nickname">Pseudo: </label>
    <input type="text" name="nickname" value="" /> <br />
    <label for="password">Mot de passe: </label>
    <input type="password" name="password"/> <br />
    <label for="autoLogIn">Connexion automatique</label>
    <input type="checkbox" name="autoLogIn"/> <br />
    <input type="submit" value="Envoyer"/>
</form>
</body>
</html>