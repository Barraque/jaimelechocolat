<?php

    session_start();
    if (!isset($_SESSION["admin"]) or !$_SESSION["admin"] == true) {
        header("Location: http://localhost/jaimelechocolat/accueil.php?msg=voous n avez pas le droit d etre ici");
    }

    include "../config.php";
    $stmt = $bdd->prepare("UPDATE produits SET nom = ? , prix = ? , marque = ? , description = ? , img_src = ? where id_produits = ?");
    $stmt->bindValue(1, $_POST["nom"]);
    $stmt->bindValue(2, $_POST["prix"]);
    $stmt->bindValue(3, $_POST["marque"]);
    $stmt->bindValue(4, $_POST["description"]);
    $stmt->bindValue(5, $_POST["img_src"]);
    $stmt->bindValue(6, $_POST["id_produits"]);
    $stmt->execute();

    $stmt = $bdd->prepare("UPDATE stock SET quantite = ? where id_produits = ?");
    $stmt->bindValue(1, $_POST["quantite"]);
    $stmt->bindValue(2, $_POST["id_produits"]);
    $stmt->execute();
    header('Location: http://localhost/jaimelechocolat/php/admin/admin.php');
    die()
?>