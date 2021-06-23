<?php
require_once 'config.php';

if(isset($_POST["idpanier"]) and isset($_POST["iduser"])){
    echo "panir. ".$_POST["idpanier"];
    echo "uszr. ". $_POST["iduser"];
    $stmt = $bdd->prepare('update panier set actif = 0 where id_panier = ? and id_user = ?');
    $stmt->bindValue(1, $_POST["idpanier"]);
    $stmt->bindValue(2, $_POST["iduser"]);
    $stmt->execute();

    $stmt = $bdd->prepare('insert into commande (id_user,id_panier,date) values (?,?,?)');
    $stmt->bindValue(1, $_POST["iduser"]);
    $stmt->bindValue(2, $_POST["idpanier"]);
    $stmt->bindValue(3, date('Y-m-d H:i:s'));
    $stmt->execute();
}
//header("Location: http://localhost/jaimelechocolat/accueil.php");
