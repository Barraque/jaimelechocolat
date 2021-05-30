<?php
print_r(PDO::getAvailableDrivers());
    try {
        /*
        $servername = "achetez.ml";
        $username = "user";
        $password = "jaimelechocolat";
        $dbname = "chocolat";

// Create connection
        $bdd= new mysqli($servername, $username, $password, $dbname);
*/
        $db="chocolat";
        $dbhost="achetez.ml";
        $dbport=3306;
        $dbuser="user";
        $dbpasswd="jaimelechocolat";

        $bdd = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
     //   $bdd = new PDO('mysql:achetez.ml:3306;chocolat;charset=utf8', 'user','jaimelechocolat');

}catch (Exception $e){
        die('Erreur'.$e->getMessage());
    }
}