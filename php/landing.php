<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="shortcut icon" type="image/ico" href="../favicon.ico"/>


</head>
<header>

    <a href="../accueil.php"> <img src="../logo.png"> </a>

</header>

<nav id="mainTopNav" class="topnav">
    <a href="../accueil.php">Accueil</a>
    <a class="active" href="produits.php">Nos produits</a>
    <a href="../choco_perso.php">Mon chocolat personalisé</a>
    <a href="../savoir-faire.html">Notre savoir faire</a>
    <a href="../boutiques.html">Nos boutiques</a>
    <a href="../about.html">À propos</a>
    <a href="panier.php">Mon panier</a>
    <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
        <i class="fa fa-bars"></i>
    </a>
    <?php
    if(isset($_SESSION["admin"]) and $_SESSION["admin"] == true){
        echo" <a href=\"./admin/admin.php\">Admin</a>";
    }
    ?>
</nav>

<body>

<div class="container">
    <div class="col-md-12">
        <?php
        if(isset($_GET['err'])){
            $err = htmlspecialchars($_GET['err']);
            switch($err){
                case 'current_password':
                    echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                    break;

                case 'success_password':
                    echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                    break;
            }
        }
        ?>


        <div class="text-center">
            <h1 class="p-5">Bonjour  <?php echo $_SESSION['name']; ?></h1>
            <hr />
            <a href="traitement/deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_password">
                Changer mon mot de passe
            </button>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer mon mot de passe</h5>
                </button>
            </div>
            <div class="modal-body">
                <form action="layouts/change_password.php" method="POST">
                    <label for='current_password'>Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required/>
                    <br />
                    <label for='new_password'>Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required/>
                    <br />
                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required/>
                    <br />
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<footer>

    <span id="left">Choc'Efrei - Tous droits réservés</span>

    <span id="right">
          <ul>
            <li><a href="../accueil.php"> <img src="../data/logo-rond-twitter.png"> </a> </li>
            <li><a href="../accueil.php"> <img src="../data/fb-logo.png"> </a> </li>
            <li><a href="../accueil.php"> <img src="../data/logo-rond-insta.png"> </a> </li>
            <li><a href="../about.html">A notre propos</a></li>
          </ul>
        </span>

</footer>
</body>
</html>