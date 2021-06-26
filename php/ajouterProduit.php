<?php
session_start();
require_once 'config.php';
if(isset($_SESSION["id"]) and isset($_GET["quantity"]) and isset($_GET["idproduit"])){
    $stmt = $bdd->prepare("select count(id_panier) cmpt from panier where id_user =  ? and actif = 1");
    $stmt->bindValue(1, $_SESSION["id"]);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    if($res["cmpt"] != 0){
        echo "1";
        $stmt2 = $bdd->prepare("select max(id_panier) max from panier where id_user = ?");
        $stmt2->bindValue(1, $_SESSION["id"]);
        $stmt2->execute();
        $res2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $id_panier = $res2["max"];
        echo $id_panier ;
    }
    else{
        echo "2";
        $stmt2 = $bdd->prepare("select ifnull(max(id_panier),1) + 1 max from panier where id_user = ?");
        $stmt2->bindValue(1, $_SESSION["id"]);
        $stmt2->execute();
        $res2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $id_panier = $res2["max"];
    }
    $stmt3 = $bdd->prepare("select count(*) cmpt from panier where id_produit = ? and id_user = ? and id_panier = ?");
    $stmt3->bindValue(1, $_GET["idproduit"]);
    $stmt3->bindValue(2, $_SESSION["id"]);
    $stmt3->bindValue(3,$id_panier);
    $stmt3->execute();
    $res3 = $stmt3->fetch(PDO::FETCH_ASSOC);

    if($res3["cmpt"] != 0){
        echo "3";
        $stmt4 = $bdd->prepare("update panier set qte = qte + ? where id_produit = ? and id_user = ? and id_panier= ?");
        $stmt4->bindValue(1, $_GET["quantity"]);
        $stmt4->bindValue(2, $_GET["idproduit"]);
        $stmt4->bindValue(3, $_SESSION["id"]);
        $stmt4->bindValue(4,$id_panier);
    }else{
        echo "4";
        $stmt4 = $bdd->prepare("insert into panier (id_user, id_produit, qte, id_panier, actif) values (?,?,?,?,?)");
        $stmt4->bindValue(1, $_SESSION["id"]);
        $stmt4->bindValue(2, $_GET["idproduit"]);
        $stmt4->bindValue(3, $_GET["quantity"]);
        $stmt4->bindValue(4, $id_panier);
        $stmt4->bindValue(5, 1);
    }
    $stmt4->execute();
}

header("Location: http://localhost/jaimelechocolat/php/chocolat?id={$_GET["idproduit"]}&msg={$_GET["quantity"]} produits ont été rajouté à votre panier");
?>