<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <title>La chocolaterie</title>
</head>

<body>
    <header>
        <!-- Click sur image pour retourner à l'accueil -->
        <a href="accueil.php"> <img src="logo.png"> </a>

        <?php
            function function_alert($msg) {
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }


            if(isset($_GET["msg"])){
                function_alert(htmlspecialchars($_GET["msg"]));
            }

            session_start();
                if(!isset($_SESSION['user'])){
                     $test = "<button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/index.php';\"> Connexion </button>";
                }
            else{
                $test ="<div class=\"top_header\" <h1>Bonjour " . $_SESSION['name'] . "</h1><br><br><button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/traitement/deconnexion.php' \"> Deconnexion </button></div> ";
                }

            echo $test;


        ?>

    </header>

    <nav id="mainTopNav" class="topnav">
        <a href="./accueil.php">Accueil</a>
        <a class="active" href="./php/produits.php">Nos produits</a>
        <a href="./choco_perso.php">Mon chocolat personalisé</a>
        <a href="./savoir-faire.html">Notre savoir faire</a>
        <a href="./boutiques.html">Nos boutiques</a>
        <a href="./about.html">À propos</a>
        <a href="./php/panier.php">Mon panier</a>
        <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
            <i class="fa fa-bars"></i>
        </a>
        <?php
        if(isset($_SESSION["admin"]) and $_SESSION["admin"] == true){
            echo" <a href=\"./php/admin/admin.php\">Admin</a>";
        }
        ?>
    </nav>

    <main>

        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="data/slider/1.jpg"></div>
                <div class="slide"><img src="data/slider/2.jpg"></div>
                <div class="slide"><img src="data/slider/3.jpg"></div>
            </div>
        </div>


        <div class="Grid--1of2">
            <div class="Grid">
                <div class=" Grid-cell">
                    <a href="php/produits.php">
                        <div class="container"> <img src="data/img/produits.jpg">
                            <div class="center">Nos produits</div>
                        </div>
                    </a>
                </div>
                <div class=" Grid-cell">
                    <a href="choco_perso.php">
                        <div class="container"> <img src="data/img/chocolat_perso.jpg">
                            <div class="center">Votre chocolat personalisé</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="Grid--1of3">
            <div class="Grid">
                <div class=" Grid-cell">
                    <a href="savoir-faire.html">
                        <div class="container"> <img src="data/img/savoir_faire.jpg">
                            <div class="center">Notre savoir faire</div>
                        </div>
                    </a>
                </div>
                <div class=" Grid-cell">
                    <a href="boutiques.html">
                        <div class="container"> <img src="data/img/boutiques.jpg">
                            <div class="center">Nos boutiques</div>
                        </div>
                    </a>
                </div>
                <div class=" Grid-cell">
                    <a href="about.html">
                        <div class="container"><img src="data/img/a_propos.jpg">
                            <div class="center">A propos de nous</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

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
