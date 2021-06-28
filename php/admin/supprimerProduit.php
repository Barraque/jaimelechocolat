<?php
    session_start();
if (!isset($_SESSION["admin"]) or !$_SESSION["admin"] == true) {
    header("Location: http://localhost/jaimelechocolat/accueil.php?msg=voous n avez pas le droit d etre ici");
    die();
}
require_once '../traitement/config.php';
    $stmt = $bdd->prepare("delete from stock where id_produits = ?");
    $stmt->bindValue(1, $_POST["id_produits"]);
    $stmt->execute();

    $stmt = $bdd->prepare("delete from produits where id_produits = ?");
    $stmt->bindValue(1, $_POST["id_produits"]);
    $stmt->execute();
    header('Location: http://localhost/jaimelechocolat/php/admin/admin.php');
    die()
?>
