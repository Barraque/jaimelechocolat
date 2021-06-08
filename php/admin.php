
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
    <a href="../accueil.php"> <img src="../logo.png"> </a>

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
            <input type="number" name="quantite" class="form-control" placeholder="quantite" required="required" autocomplete="off">
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
