<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/produits.css">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <title>La chocolaterie - Nos produits</title>
</head>

<body>
    <header>
        <!-- Click sur image pour retourner à l'accueil -->
        <a href="accueil.php"> <img src="logo.png"> </a>
    </header>

    <nav id="mainTopNav" class="topnav">
        <a href="accueil.php">Accueil</a>
        <a class="active" href="produits.php">Nos produits</a>
        <a href="choco_perso.php">Mon chocolat personalisé</a>
        <a href="savoir-faire.html">Notre savoir faire</a>
        <a href="boutiques.html">Nos boutiques</a>
        <a href="about.html">À propos</a>
        <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <main>

        <div class="menu">
            <!-- Barre de recherche pour filtrer les produits  -->
            <input type="text" id="inputSearch" onkeyup="filterProduct()" placeholder="Rechercher un produit...">

            <!-- Bouton tri produit croissant et décroissant -->
            <button onclick="sortByPropertyTable('prix', 1)">Prix ▲</button>
            <button id="prix_desc" onclick="sortByPropertyTable('prix', -1)">▼</button>
            <button onclick="sortByPropertyTable('categorie')"> <i class="fa fa-times-circle"></i>
            </button>
        </div>


        <!-- table contenant les produits -->
        <table id="produits">

        </table>

        <p>Nos chocolats de haute qualité ne sont confectionnés qu’avec des ingrédients de haute qualité.<br>
            Chez Choc'Efrei, nous savons que le plaisir du chocolat se révèle une expérience sensorielle totale.
            C’est pourquoi nous nous attachons aux moindres détails à chacune des étapes de fabrication, du tempérage, jusqu’aux emballages élégants.
        </p>

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
<script src="js/produits.js"></script>

</html>