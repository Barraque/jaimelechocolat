<?php
session_start();
require_once 'config.php';
if(isset($_SESSION["id"]) and isset($_GET["quantity"]) and isset($_GET["idproduit"])){
    echo "lezdedol";
    $stmt = $bdd->prepare("select id_user,max(id_panier) from panier;");
    $res = $stmt->execute();
    if($res["id_user"] == $_SESSION["id"]){
        $id_panier = $res["id_panier"];
    }
    else{
        $id_panier = $res["id_panier"] + 1;
    }
    echo $id_panier;
    $stmt = $bdd->prepare("insert into panier (id_user, id_produit, qte, id_panier) values (?,?,?,?)");
    $stmt->bindValue(1, $_SESSION["id"]);
    $stmt->bindValue(2, $_GET["idproduit"]);
    $stmt->bindValue(3, $_GET["quantity"]);
    $stmt->bindValue(4, $id_panier);
    $stmt->execute();
}
?>