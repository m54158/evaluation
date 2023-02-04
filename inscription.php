<?php
include 'header.php';

if (isset($_POST['login'])) {
    include 'connexion-bdd.php';

    //préparation de la requête
    $requete = $connexion->prepare(
        'INSERT INTO utilisateurs ( login, password) VALUES (?, ?)'
    );

    $motDePasseBcrypt = password_hash(
        $_POST['password'],
        PASSWORD_BCRYPT
    );

    try {
        $requete->execute([$_POST['login'], $motDePasseBcrypt]);
        header('Location: connexion.php');
    } catch (PDOException $erreur) {
        echo ('login déjà existant');
    }
}

?>
<h2> inscription </h2>
<form method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit" value="inscription">
</form>