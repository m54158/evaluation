<?php
session_start();

// Vérifier si l'utilisateur est connecté avec une session d'administrateur
if (!isset($_SESSION['administrateur'])) {
    header('Location: connexion.php');
    exit;
} ?>

<?php


if (isset($_GET['confirme'])) {

    // connexion base de donnée
    $connexion = new PDO(
        'mysql:host=localhost;dbname=evaluation_php',
        'root',
        ''
    );
    //préparation de la requête
    $requete = $connexion->prepare(
        'DELETE FROM produits WHERE id = ?'
    );


    //execution de la requête
    $requete->execute([$_GET['id']]);
    // on redirige vers la page index.php
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un article</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/delete.css">
        <title>Supprimer un article</title>
    </head>

    <body>

    </body>

    </html>
</body>

</html>
<a href="supprimer-article.php?id=<?= $_GET['id'] ?>&confirme=1"> Confirmer la supression?
</a>
<a href="index.php">Annuler</a>