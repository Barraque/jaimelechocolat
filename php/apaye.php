<?php
require_once 'config.php';

if(isset($_POST["idpanier"]) and isset($_POST["iduser"])){

    $stmt = $bdd->prepare('update panier set actif = 0 where id_panier = ? and id_user = ?');
    $stmt->bindValue(1, $_POST["idpanier"]);
    $stmt->bindValue(2, $_POST["iduser"]);
    $stmt->execute();

    $stmt = $bdd->prepare('select id_produit,qte from panier where id_panier = ?');
    $stmt->bindValue(1, $_POST["idpanier"]);
    $stmt->execute();
    $res = $stmt->fetchAll();
    foreach($res as $row){
        $stmt = $bdd->prepare('update stock set quantite = quantite - ? where id_produits = ?');
        echo "qte".$row["qte"];
        echo "peo".$row["id_produit"];
        $stmt->bindValue(1, $row["qte"]);
        $stmt->bindValue(2, $row["id_produit"]);
        $res = $stmt->execute();
    }

    $stmt = $bdd->prepare('insert into commande (id_user,id_panier,date) values (?,?,?)');
    $stmt->bindValue(1, $_POST["iduser"]);
    $stmt->bindValue(2, $_POST["idpanier"]);
    $stmt->bindValue(3, date('Y-m-d H:i:s'));
    $stmt->execute();
}
header("Location: http://localhost/jaimelechocolat/accueil.php?msg=merci d avoir acheté chez nous");
