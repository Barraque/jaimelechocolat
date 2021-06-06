<html
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/boutiques.css">
    <link rel="stylesheet" type="text/css" href="../css/produit.css">
    <link rel="shortcut icon" type="image/ico" href="../favicon.ico"/>
    <title>La chocolaterie - Nos boutiques</title>
</head>
<body>
<header>
    <!-- Click sur image pour retourner à l'accueil -->
    <a href="index.html"> <img src="../logo.png"> </a>
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
<?php
require_once 'config.php';

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


if(isset($_GET["msg"])){
    function_alert(htmlspecialchars($_GET["msg"]));
}
if(isset($_GET["id"])) {
    $id = htmlspecialchars($_GET["id"]);
    if ($id) {
        $stmt = $bdd->prepare("select produits.id_produits,nom,prix,marque,description,img_src,quantite from produits join stock on produits.id_produits = stock.id_produits where produits.id_produits = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $res["nom"];
    ?>


        <div class='containercss'>
        <div class='gauche'>
            <img src=' <?=$res["img_src"] ?>'/>
        </div>
        <div class='droite'>
            <h1> <?=$res["nom"]?></h1>
            <h2>Marque : <?=$res["marque"]?></h2>
            <p><?=$res["description"]?></p>
            <br>
            <p><?=$res["prix"]?>€</p>
            <p><?=$res["quantite"]?> restants </p>
            <form action="ajouterProduit.php" method="get">
                <p> Quantité : </p>
                <input type="number" id="quantity" name="quantity" min="0">
                <input type="hidden" id="idproduit" name="idproduit" value="<?=$id?>"/>
                <input type="submit" id="submit" value="Ajouter">
            </form>
        </div>

</div>

<?php
}
    else{
        header("Location : /404.html");
    }
}
else{
    header("Location : /404.html");
}


?>
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
</html>