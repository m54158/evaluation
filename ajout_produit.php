<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/materia/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout produit</title>
</head>
<body>


    <!-- <script defer src="assets/js/ajout-produit.js"></script> -->


    <?php
    session_start();

    // Vérifier si l'utilisateur est connecté avec une session d'administrateur
    if (!isset($_SESSION['administrateur'])) {
        header('Location: connexion.php');
        exit;
    } ?>

    Ajouter un  article
    <?php
    //     est-ce-que l'index "nom" existe dans le tableau $_POST ?
    // (autrement dit : si on a validé le formulaire)

    if (isset($_POST['nom'])) {

        $erreurNom = false;
        $messageErreurNom = 'max 10 caractères';
        if (strlen($_POST['nom']) > 10) {
            $erreurNom = true;
            $nombreCaractereEnTrop = strlen($_POST['nom']) - 10;
            $messageErreurNom .= '(' . $nombreCaractereEnTrop . ' en trop ) ';

            //afficher les erreurs en dessous du titre
            // echo '<b style="color:red">';
            // echo 'Le nom doit avoir 10 caractères maximum';
            // echo '</b>';

            //afficher une alerte en avascript
            // echo '<script>';
            // echo 'alert("Le nom doit avoir 10 caractères maximum")';
            // echo '</script>';
            // si il n'y a pas d'erreur dans le formulaire
        }
        if (!$erreurNom) {
            // connexion base de donnée 
            $connexion = new PDO(
                'mysql:host=localhost;dbname=evaluation_php',
                'root',
                ''
            );
            //préparation de  la requête
            $requete = $connexion->prepare(
                'INSERT INTO produits ( nom, description, prix, url_image) VALUES (?, ?, ?, ?)'
            );

            //execution de la requête
            $requete->execute([
                $_POST['nom'],
                $_POST['description'],
                $_POST['prix'],
                $_POST['url_image']
            ]);
        }
    }
    ?>

    <form method="POST" onsubmit="return validerFormulaire();" class="container mb-4">

        <div class="form-group <?php if ($erreurNom) echo 'has-danger' ?> ">
            <label class="col-form-label mt-4" for="inputNom">Nom</label>
            <input value="<?= $_POST['nom'] ?? '' ?>" name="nom" type="text" class="form-control <?php if ($erreurNom) echo 'is-invalid' ?>" placeholder="nom du produit" id="inputNom">
            <div id="messageErreurNom" class="invalid-feedback"></div>

        </div>


        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description</label>
            <textarea name="description" class="form-control" id="inputDescription" rows="3"></textarea>
            <div class="invalid-feedback">20 caractères minimum</div>

        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputPrix">Prix</label>
            <input name="prix" type="number" class="form-control" placeholder="Prix du produit (ex : 5.99)" id="inputPrix">
            <div class="invalid-feedback">uniquement nombre positif</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
            <input name="url_image" type="text" class="form-control" placeholder="URL de l'image (ex: http://monsite.com/image.jpg)" id="inputUrlImage">
            <div class="invalid-feedback"><?= $messageErreurNom ?></div>
        </div>
        <button id="bouton-ajouter" class="btn btn-primary mt-4"> Ajouter l'article </button>


    </form>
</body>

</html>
