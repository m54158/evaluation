<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Super site</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"></a>
                </li>
                <?php if (isset($_SESSION['administrateur']) && $_SESSION['administrateur'] == 1) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="ajout_produit.php">Ajout produit</a>
                    </li>
                <?php } ?>
                <?php if (!isset($_SESSION['id'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">connexion</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">inscription</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">

                        <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                    </li>



                <?php

                }

                ?>



            </ul>
            <div>
                <span> Langage:</span>
                <a href="change-langage.php?langue=fr">🥐</a>
                <a href="change-langage.php?langue=en">🥓</a>

            </div>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>