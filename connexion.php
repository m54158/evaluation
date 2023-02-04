
<?php include 'header.php'; ?>


<?php
// traitement du formulaire 
if (isset($_POST['login'])) {


   
 include 'connexion-bdd.php';

    // préparation de la requête 
    $requete = $connexion->prepare("SELECT * FROM utilisateurs  WHERE login = ? ");
    //  exécution de la requête 
    $requete->execute([$_POST['login']]);
    $utilisateur = $requete->fetch();
    // si l'utilisateur s'est trompé
    if ($utilisateur == false) {
        echo "Login inexistant";
    } else {
        // on récupère le mot de passe de la base de donnée
        $motDePasseBcrypt = $utilisateur['password'];
        $motDePasseenClair = $_POST['password'];
        //  si les mots de passes sont compatibles
        if(password_verify($motDePasseenClair, $motDePasseBcrypt)){
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['login'] = $utilisateur['login'];
            $_SESSION['administrateur'] = $utilisateur['administrateur'];



            // ex: dans la table de la session de l'utilisateur
            // on affecte à l'index id la valeure 42
            header('Location: index.php');
        } else {
            echo 'Mauvais mot de passe';
        }
        }


        
} ?>
<h2>Veuillez vous connecter pour modifier</h2>
<form method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit" value="connexion">
</form>