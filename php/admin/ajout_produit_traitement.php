<?php


if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['marque']) && !empty($_POST['img_src']) && !empty($_POST['description']) && !empty($_POST['quantite'])) {
    require_once 'config.php';
    foreach ($_POST as $key => $value) {
        $$key = htmlspecialchars($value);
    }
    $insert = $bdd->prepare('INSERT INTO produits ( nom, prix, marque, img_src, description) VALUES ( ?, ?, ?, ?, ?)');
    $insert -> bindValue(1, $_POST['nom']);
    $insert -> bindValue(2, $_POST['prix']);
    $insert -> bindValue(3, $_POST['marque']);
    $insert -> bindValue(4, $_POST['img_src']);
    $insert -> bindValue(5, $_POST['description']);
    $insert->execute();


    $recup_nom = $_POST['nom'];
    $id_produit = $bdd->lastInsertId();
    $quantite = htmlspecialchars($_POST['quantite']);
    $insert2 = $bdd->prepare('INSERT INTO stock (id_produits, quantite) VALUES ( ?, ?)');
    $insert2 -> bindValue(1, $id_produit);
    $insert2 -> bindValue(2, $quantite);
    $insert2->execute();

} else {
    header('Location: http://localhost/jaimelechocolat/php/admin/admin.php?reg_err=password');
    die();
}

?>