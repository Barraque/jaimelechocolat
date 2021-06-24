<?php
require_once 'config.php';

if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT id,pseudo, email, password, admin FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 1)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {

            if(password_verify($password, $data['password']))
            {
                session_start();

                $_SESSION['user'] = $data['email'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['pseudo'];
                if(isset($data["admin"]) && $data["admin"] == 1){
                    $_SESSION['admin'] = true;
                }
                header('Location: landing.php');
                die();
            }else{ header('Location: index.php?login_err=password'); die(); }
        }else{ header('Location: index.php?login_err=email'); die(); }
    }else{ header('Location: index.php?login_err=already'); die(); }
}