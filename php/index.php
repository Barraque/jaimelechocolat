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

<body>
<header>
    <!-- Click sur image pour retourner à l'accueil -->
    <a href="../accueil.php"> <img src="../logo.png"> </a>
</header>

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
</nav>

<main>

    <div class="login-form">
        <?php
        if(isset($_GET['login_err']))
        {
            $err = htmlspecialchars($_GET['login_err']);

            switch($err)
            {
                case 'password':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> mot de passe incorrect
                    </div>
                    <?php
                    break;

                case 'email':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> email incorrect
                    </div>
                    <?php
                    break;

                case 'already':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> compte non existant
                    </div>
                    <?php
                    break;
            }
        }
        ?>

</main>

<footer>

    <span id="left">Choc'Efrei - Tous droits réservés</span>

    <span id="right">
          <ul>
            <li><a href="accueil.php"> <img src="data/logo-rond-twitter.png"> </a> </li>
            <li><a href="accueil.php"> <img src="data/fb-logo.png"> </a> </li>
            <li><a href="accueil.php"> <img src="data/logo-rond-insta.png"> </a> </li>
            <li><a href="about.html">A notre propos</a></li>
          </ul>
        </span>

</footer>
</body>

<script src="js/script.js"></script>

</html>



    <form action="connexion.php" method="post">
        <h2 class="text-center">Connexion</h2>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
        </div>
    </form>
    <p class="text-center"><a href="inscription.php">Inscription</a></p>
</div>

<footer>

    <span id="left">Choc'Efrei - Tous droits réservés</span>

    <span id="right">
          <ul>
            <li><a href="accueil.php"> <img src="../data/logo-rond-twitter.png"> </a> </li>
            <li><a href="accueil.php"> <img src="../data/fb-logo.png"> </a> </li>
            <li><a href="accueil.php"> <img src="../data/logo-rond-insta.png"> </a> </li>
            <li><a href="about.html">A notre propos</a></li>
          </ul>
        </span>

</footer>

<style>
    .login-form {
        box-sizing : border-box;
        font-family: 'Courgette', cursive;
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #ffd7d1;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
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
        box-sizing : border-box;
        font-family: 'Courgette', cursive;
        font-size: 15px;
        font-weight: bold;
    }
</style>
</body>
</html>