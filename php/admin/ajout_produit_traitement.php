<?php
require_once '../config.php';

if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['marque']) && !empty($_POST['img_src']) && !empty($_POST['description'])) {
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
} else {
    header('Location: http://localhost/jaimelechocolat/php/admin/admin.php?reg_err=password');
    die();
}

?>