<?php
session_start();

// Vérifier si l'utilisateur est connecté avec une session d'administrateur
if (!isset($_SESSION['administrateur'])) {
    header('Location: connexion.php');
    exit;
} ?>
<?php

$connexion = new PDO(
    'mysql:host=localhost;dbname=evaluation_php',
    'root',
    ''
);
// si l'utilisateur a soumis le formulaire
if (isset($_POST['nom'])) {

    //on enregistre les modifications
    $requete = $connexion->prepare(
        "UPDATE produits 
         SET nom = ?, 
             description = ?, 
             prix = ?,
             url_image = ?
         WHERE id = ?"
    );

    $requete->execute([
        $_POST['nom'],
        $_POST['description'],
        $_POST['prix'],
        $_POST['url_image'],
        $_GET['id'],
    ]);

    //Redirection vers la page d'accueil
    header('Location: index.php');
}
$requete = $connexion->prepare("SELECT * FROM produits WHERE id = ? ");

$requete->execute([$_GET["id"]]);
$produit = $requete->fetch();
//  echo '<pre>';
//  var_dump($produit);
//  echo '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/materia/bootstrap.min.css">

    <script src="assets/js/script.js"></script>
    <title>Modification des noms</title>
    <style>

    </style>
</head>

<body>


    <form method="POST" class="container mb-4">
        <div class="form-group">
            <label class="label" for="inputNom">Nom</label>

            <input name="nom" value="<?= $produit['nom'] ?>" type="text" class="form-control" placeholder="Nom du produit" id="inputNom">
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description</label>
            <textarea name="description" class="form-control" id="inputDescription" rows="3"><?= $produit['description'] ?></textarea>
            <div class="invalid-feedback">20 caractères minimum</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputPrix">Prix</label>
            <input name="prix" value="<?= $produit['prix'] ?>" type="number" class="form-control" placeholder="Prix du produit (ex : 5.99)" id="inputPrix">
            <div class="invalid-feedback">Le prix doit être positif</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
            <input name="url_image" value="<?= $produit['url_image'] ?>" type="text" class="form-control" placeholder="URL de l'image (ex: http://mon-site.com/image.jpg)" id="inputUrlImage">
            <div class="invalid-feedback"></div>
        </div>

        <input type="submit" value="Modifier l'article" class="btn btn-primary mt-4">






    </form>
</body>

</html>