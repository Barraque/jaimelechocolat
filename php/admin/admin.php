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
    <!-- Click sur image pour retourner à l'accueil -->
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
        require_once '../traitement/config.php';
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

    <?php

    $test ="<div class=\"top_header\" ><br><br><h1>Bonjour " . $_SESSION['name'] . "</h1><button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/traitement/deconnexion.php' \"> Deconnexion </button></div> ";
    echo $test;

    ?>

</header>
<div class="login-form">
    <form action="ajout_produit_traitement.php" method="post">
        <h2 class="text-center">Ajouter un produit
        </h2>
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
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Ajouter le produit
            </button>
        </div>
    </form>
</div>
<div class="login-form">
    <table style="border:1px solid black">
        <tr><b><td>Nom</td><td>Marque</td><td>Description</td><td>Prix</td><td>Quantite</td><td>Url de l'image</td><td>Modifier</td><td>Supprimer</td></b></tr>
        <?php
        $stmt = $bdd->prepare('select p.id_produits id,nom,prix,marque,description,img_src,quantite from produits p join stock s on p.id_produits = s.id_produits;');
        $stmt->execute();
        $res = $stmt->fetchAll();
        foreach ($res as $row){
            echo ("<tr>
                        <form action='modifProduit.php' method='POST'>
                            <input type='hidden' name='id_produits' value='{$row["id"]}'>
                            <td><input type='text' name='nom' value='{$row["nom"]}'></td>
                            <td><input type='text' name='marque' value='{$row["marque"]}'></td>
                            <td><input type='text' name='description' value='{$row["description"]}'></td>
                            <td><input type='text' name='prix' value='{$row["prix"]}'></td>
                            <td><input type='text' name='quantite' value='{$row["quantite"]}'></td>
                            <td><input type='text' name='img_src' value='{$row["img_src"]}'></td>
                            <td><input type='submit' value='Modifier'></td>
                        </form>
                            
                        <form action='supprimerProduit.php' method='POST'>
                            <input type='hidden' name='id_produits' value='{$row["id"]}'>  
                            <td><input type='submit' value='Supprimer'></td>
                        </form>
                        </tr>");
        }

        ?>
    </table>
</div>



<style>
    .login-form {
        width: 50%;
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