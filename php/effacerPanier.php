<?php
    session_start();
    if(isset($_SESSION["id"])){
        require_once 'config.php';
        $stmt = $bdd->prepare('delete from panier where id_user = ? and actif = 1');
        $stmt->bindValue(1, $_SESSION["id"]);
        $stmt->execute();
    }
    header("Location: http://localhost/jaimelechocolat/php/panier.php");
?>
