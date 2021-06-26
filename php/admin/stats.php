
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/icons.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/about.css">
    <link rel="shortcut icon" type="image/ico" href="../../favicon.ico"/>


    <title>Connexion</title>
</head>
<body>

<header>
    <nav id="mainTopNav" class="topnav">
        <a href="../../accueil.php">Accueil</a>
        <a class="active" href="../produits.php">Nos produits</a>
        <a href="../../choco_perso.php">Mon chocolat personalisé</a>
        <a href="../../savoir-faire.html">Notre savoir faire</a>
        <a href="../../boutiques.html">Nos boutiques</a>
        <a href="../../about.html">À propos</a>
        <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
            <i class="fa fa-bars"></i>
        </a>
        <?php
        session_start();
        if(isset($_SESSION["admin"]) and $_SESSION["admin"] == true){
            echo "<a href='./admin.php'>Admin</a>";
        } else {
            header("Location: http://localhost/jaimelechocolat/accueil.php?msg=voous n avez pas le droit d etre ici");
        }
        function function_alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }


        if(isset($_GET["msg"])){
            function_alert(htmlspecialchars($_GET["msg"]));
        }
        ?>
        <a href="./stats.php">Stats</a>
    </nav>

</header>
    <h1>Le produit le plus commandé</h1><br>
<?php
require_once '../config.php';

$stmt = $bdd->prepare("select count(*) cnt, nom from panier pa join produits p on p.id_produits = pa.id_produit group by id_produit order by cnt desc;");
$stmt->execute();

$resultat= $stmt->fetchAll();
echo ("<table style=\"border:1px solid black\", align=\"center\">");
echo (" <tr>
        
       <td><b>Nom du produit</b> </td>  
       <td><b>Nombre de de fois vendu</b></td>
       
   </tr>");
foreach ($resultat as $row){
    echo ("
    <tr>
       <td>{$row["nom"]}</td>
     
       <td>{$row["cnt"]}</td>
       
   </tr>");

}
echo ("</table>");


?>

    <h1>Le produit le plus acheté</h1><br>

<?php

$stmt = $bdd->prepare("select sum(qte) stock, nom from panier pp join produits pa where pp.id_produit = pa.id_produits group by id_produit order by stock desc;");
$stmt->execute();

$resultat= $stmt->fetchAll();
echo ("<table style=\"border:1px solid black\", align=\"center\">");
echo (" <tr>
        <b>
       <td><b>Nom du produit</b></td>
       <td><b>Nombre de quantité vendu </b></td>
       </b> 
   </tr>");
foreach ($resultat as $row){
    echo ("
    <tr>
        <td>{$row["nom"]}</td>
        <td>{$row["stock"]}</td>

    </tr>");

}
echo ("</table>");


?>

<footer>

    <span id="left">Choc'Efrei - Tous droits réservés</span>

    <span id="right">
          <ul>
            <li><a href="index.html"> <img src="../../data/logo-rond-twitter.png"> </a> </li>
            <li><a href="index.html"> <img src="../../data/fb-logo.png"> </a> </li>
            <li><a href="index.html"> <img src="../../data/logo-rond-insta.png"> </a> </li>
            <li><a href="about.html">A notre propos</a></li>
          </ul>
        </span>

</footer>


<style>
h1{
    text-align: center;
}
td{
    text-align: center;
}
</style>
</body>
</html>
