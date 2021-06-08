<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/payment.css">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <title>La chocolaterie</title>
</head>

<body>
    <header>
        <!-- Click sur image pour retourner à l'accueil -->
        <a href="../accueil.php"> <img src="logo.png"> </a>

        <?php
            session_start();
                if(!isset($_SESSION['user'])){
                     $test = "<button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/index.php';\"> Connexion </button>";
                }
            else{
                 $test ="<h1 class=\"p-5\">Bonjour " . $_SESSION['user'] . "</h1> <button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/deconnexion.php' \"> Deconnexion </button>";
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

      <form>

     <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Adresse de payment</h3>
            <label for="fname"><i class="fa fa-user"></i> Nom complet </label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresse</label>
            <input type="text" id="adr" name="address" placeholder="23 rue jean jean">
            <label for="city"><i class="fa fa-institution"></i> Ville</label>
            <input type="text" id="city" name="city" placeholder="Paris">

            <div class="row">
              <div class="col-50">
                <label for="state">Pays</label>
                <input type="text" id="state" name="state" placeholder="Paris">
              </div>
              <div class="col-50">
                <label for="zip">Code postal</label>
                <input type="text" id="zip" name="zip" placeholder="75011">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Nom sur la carte</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Numéro de carte de credit</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Expiration mois</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Octobre">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Expiration année</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Payer" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">

    <?php

    if(isset($_SESSION["id"])) {
        require_once 'config.php';

        $stmt = $bdd->prepare('select nom,prix,qte from produits inner join panier on panier.id_produit = produits.id_produits where id_user = ?;');
        $stmt->bindValue(1, $_SESSION["id"]);
        $stmt->execute();

        $res = $stmt->fetchAll();
        if (count($res) == 0) {
            echo "<p>Ton panier est vide :(</p>";

        } else {
            $tot = 0;
            echo("<h4>Cart
        <span class=\"price\" style=\"color:black\">
          <i class=\"fa fa-shopping-cart\"></i>" . count($res) . "</h4>");
            foreach ($res as $row) {

                echo("<p><b>" . $row['nom'] . "</b><br>" . "<p>Quantité : </p>" . $row['qte'] . "<span class= \"price\">" . $row['prix'] . " €</span> </p>");
                $tot += $row['qte'] * $row['prix'];
            }
            echo("<hr><p>Total : <span class = \"price\" style = \"color:black\"><b>" . $tot . " €</b></span>");
        }
    }
    ?>
        </span>
      </h4>

    </div>
  </div>
</div>


      </form>

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



</html>
