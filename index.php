    <!DOCTYPE html>
    <html lang="fr">

    <head>
      <link rel="stylesheet" href="./assets/css/navbar.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="./assets/css/modale.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script defer src="assets/js/script.js"></script>
      <title>Collections de voitures</title>
      <style>

      </style>
    </head>


    <div id="buttonprecedent" class="button"> Précédent</div>1
    <div id="bouttonsuivant" class="button"> Suivant </div>


    <?php
    // connexion base de donnée 
    $connexion = new PDO(
      "mysql:host=localhost;dbname=evaluation_php",
      'root',
      '',
    );




    // préparation de la requête 
    $requete = $connexion->prepare("SELECT * FROM produits");
    //  exécution de la requête 
    $requete->execute();
    //  affectation du résultat dans la variable listeArticles 
    $listeArticles = $requete->fetchAll();
    foreach ($listeArticles as $article) { ?>

      <section class="section-voiture hidden">

        <h1 class="titre_voiture"> <?= $article['nom'] ?></h1>
        </div>
        <img src="<?= $article['url_image'] ?>" alt=" " height="520>
        <div class=" card-body">
        <p> <strong> <?= $article['description'] ?> son prix s'élève à <?= $article['prix'] ?> €</strong> </p>
        <a href="supprimer_article.php?id=<?= $article['id'] ?>">Supprimer</a>
        <a href="modifier_produit.php?id=<?= $article['id'] ?>">Modifier</a>
        <a href="ajout_produit.php"> ajouter</a>

        <a href="connexion.php"> connexion</a>
        <a href="inscription.php">Inscription</a>
        <a href="deconnexion.php">deconnexion</a>

        </div>
      </section>


    <?php }
    ?>
    <div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cookieModalLabel">Notre politique en matière de cookies</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant à utiliser notre site, vous acceptez notre utilisation des cookies.
            Pour en savoir plus sur notre politique en matière de cookies, veuillez consulter notre page dédiée</a>.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">J'ai compris</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./assets/js/modale.js"></script>

    </body>



    </html>