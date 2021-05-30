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
</header>

<nav id="mainTopNav" class="topnav">
    <a href="index.html">Accueil</a>
    <a class="active" href="produits.html">Nos produits</a>
    <a href="choco_perso.html">Mon chocolat personalisé</a>
    <a href="savoir-faire.html">Notre savoir faire</a>
    <a href="boutiques.html">Nos boutiques</a>
    <a href="about.html">À propos</a>
    <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
        <i class="fa fa-bars"></i>
    </a>
</nav>

<main>
    <h1> Mon panier</h1>

    <?php
    session_start();

    if(isset($_SESSION["id"])){
        require_once 'config.php';
        $stmt = $bdd->prepare('select nom,prix,qte from produits inner join panier on panier.id_produit = produits.id_produits where id_user = ?;');
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
            echo " <h1> Supprimer mon panier</h1>
                   <form action=\"effacerPanier.php\" method=\"get\">
                   <input type=\"submit\" id=\"delete\" value=\"Supprimer\"><br>
                   </form>";
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