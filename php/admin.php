
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="shortcut icon" type="image/ico" href="../favicon.ico"/>


    <title>Connexion</title>
</head>
<body>
<header>
    <!-- Click sur image pour retourner à l'accueil -->
    <nav id="mainTopNav" class="topnav">
        <a href="../accueil.php">Accueil</a>
        <a class="active" href="produits.php">Nos produits</a>
        <a href="../choco_perso.php">Mon chocolat personalisé</a>
        <a href="../savoir-faire.html">Notre savoir faire</a>
        <a href="../boutiques.html">Nos boutiques</a>
        <a href="../about.html">À propos</a>
        <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
            <i class="fa fa-bars"></i>
        </a>
        <?php
        session_start();
        if(isset($_SESSION["admin"]) and $_SESSION["admin"] == true){
            echo " <a href=\"./admin.php\">Admin</a>";
        } else {
            header("Location: http://localhost/jaimelechocolat/accueil.php?msg=voous n avez pas le droit d etre ici");
        }
        ?>
    </nav>

</header>
<div class="login-form">

    <form action="ajout_produit_traitement.php" method="post">
        <h2 class="text-center">Ajouter un produit</h2>
        <div class="form-group">
            <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="number" name="prix" class="form-control" placeholder="Prix" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="marque" class="form-control" placeholder="Marque" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="img_src" class="form-control" placeholder="Image" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Description" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Ajouter le produit</button>
        </div>
    </form>
</div>

<footer>

    <span id="left">Choc'Efrei - Tous droits réservés</span>

    <span id="right">
          <ul>
            <li><a href="index.html"> <img src="../data/logo-rond-twitter.png"> </a> </li>
            <li><a href="index.html"> <img src="../data/fb-logo.png"> </a> </li>
            <li><a href="index.html"> <img src="../data/logo-rond-insta.png"> </a> </li>
            <li><a href="about.html">A notre propos</a></li>
          </ul>
        </span>

</footer>


<style>
    .login-form {
    width: 500px;
        margin: 50px auto;
    }
    .login-form form {
    margin-bottom: 15px;
        background: rgba(78, 64, 64, 0.03);
        box-shadow: 0px 5px 5px rgba(0, 0, 0, 1);
        padding: 30px;
    }
    .login-form h2 {
    margin: 0 0 15px;
    }
    .form-control, .btn {
    min-height: 38px;
        border-radius: 2px;
    }
    .btn {
    font-size: 15px;
        font-weight: bold;
    }
</style>
</body>
</html>
