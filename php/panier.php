<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/produits.css">
    <link rel="shortcut icon" type="image/ico" href="../favicon.ico"/>
    <title>La chocolaterie - Nos produits</title>
</head>

<body>
<header>
    <!-- Click sur image pour retourner à l'accueil -->
    <a href="index.html"> <img src="../logo.png"> </a>

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

<main>
    <h1> Mon panier</h1>

    <?php

    if(isset($_SESSION["id"])){
        require_once 'traitement/config.php';
        $stmt = $bdd->prepare('select nom,prix,qte from produits inner join panier on panier.id_produit = produits.id_produits where id_user = ? and actif = 1;');
        $stmt->bindValue(1, $_SESSION["id"]);
        $stmt->execute();
        $res = $stmt->fetchAll();
        if(count($res) == 0){
            echo "<p>Ton panier est vide :(</p>";

        }
        else {
            foreach ($res as $row) {
                echo("<div class='produit'>");
                echo("<h3>" . $row['nom'] . "</h3>");
                echo("<p>Quantité : " . $row['qte'] . " - Prix par produit : " . $row['prix'] . " - Soit " . $row['qte'] * $row['prix'] . " € </p>");
                echo("</div>");
            }
            echo "<h1> Supprimer mon panier</h1>
                   <form action=\"traitement/effacerPanier.php\" method=\"get\">
                   <input type=\"submit\" id=\"delete\" value=\"Supprimer\">
                   </form>";

            echo '<a href="http://localhost/jaimelechocolat/php/payment.php"><button>Payer</button></a>';
        }
    }
    ?>



</main>

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
</body>

<script src="../js/script.js"></script>
<script src="../js/produits.js"></script>

</html>