<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/choco_perso.css">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <title>La chocolaterie - Nos chocolats personalisés</title>
</head>

<body>
    <header>
        <!-- Click sur image pour retourner à l'accueil -->
        <a href="accueil.php"> <img src="logo.png"> </a>

        <?php
        function function_alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }


        if(isset($_GET["msg"])){
            function_alert(htmlspecialchars($_GET["msg"]));
        }

        session_start();
        if(!isset($_SESSION['user'])){
            $test = "<button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/index.php';\"> Connexion </button>";
        }
        else{
            $test ="<div class=\"top_header\" <h1>Bonjour " . $_SESSION['name'] . "</h1><br><br><button onclick=\"window.location.href = 'http://localhost/jaimelechocolat/php/deconnexion.php' \"> Deconnexion </button></div> ";
        }

        echo $test;


        ?>

    </header>

    <nav id="mainTopNav" class="topnav">
        <a href="./accueil.php">Accueil</a>
        <a class="active" href="./php/produits.php">Nos produits</a>
        <a href="./choco_perso.php">Mon chocolat personalisé</a>
        <a href="./savoir-faire.html">Notre savoir faire</a>
        <a href="./boutiques.html">Nos boutiques</a>
        <a href="./about.html">À propos</a>
        <a href="javascript:void(0);" class="icon" onclick="topnavManager()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <main>
         <!-- Modal Windows pour afficher que la commande n'a pu aboutir -->
         <div id="error" class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>La commande n'a pu aboutir</p>
          </div>

        <div  class="Grid">
            <form id="form" class="Grid--1of2 Grid-cell">
                <div class="tab">
                    <h3> Etape 1</h3>
    
                    <label for="type-select">Choisir un type de chocolat :</label>
    
                    <select name="type" id="type_chocolat">
                        <option value="">--Please choose an option--</option>
                        <option value="Blanc">Blanc</option>
                        <option value="Au lait">Au lait</option>
                        <option value="Noir">Noir</option>
                    </select>
                </div>
    
                <div class="tab">
                    <h3> Etape 2</h3>
    
                    <label for="forme-select">Choisir la forme du chocolat :</label>
    
                    <select name="forme" id="forme_chocolat">
                        <option value="">--Please choose an option--</option>
                        <option value="Rond">Rond</option>
                        <option value="Rectangle">Rectangle</option>
                        <option value="Ligne">Ligne</option>
                    </select>
                </div>
    
                <div class="tab">
                    <h3> Etape 3</h3>
    
                    <label for="supplement-select">Ajouter des suppléments :</label>
    
                    <select name="supplement" id="supplement">
                        <option value="">--Please choose an option--</option>
                        <option value="Pépites">Pépites</option>
                        <option value="Beurre de cacahuète">Beurre de cacahuète</option>
                        <option value="Pâte d'amande">Pâte d'amande</option>
                    </select>
                </div>
    
                <div class="tab">
                    <h3> Etape 4</h3>
    
                    <label for="boite-select">Choisir la boîte :</label>
    
                    <select name="boite" id="boite">
                        <option value="">--Please choose an option--</option>
                        <option value="Coeur rose">Coeur rose</option>
                        <option value="Rond gold">Rond gold</option>
                        <option value="Rectangle classique">Rectangle classique</option>
                    </select>
                </div>
    
                <div style="overflow:auto;">
                    <div style="float:right; margin-top:40px;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                      <button type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                    </div>
                </div>
    
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center; margin-top:10px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
    
            </form>
    
            <div class="Grid--1of2 Grid-cell" style="border-left : 10px solid transparent;">
                <table id="tabCommande" >
                    <caption>Votre commande</caption>
                    <tbody>
                        <tr>
                            <th>Type de chocolat</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Forme de chocolat</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Supplément</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Boîte</th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
        
                <div class="Commander" style="margin-top:10px;">
                    <button id="order" type="button" style="width:100%;" onclick="commander()">COMMANDER</button>
                </div>
            </div>
        </div>
       
    </main>

    <footer>
    
        <span id="left">Choc'Efrei - Tous droits réservés</span>
    
        <span id="right">
          <ul>
            <li><a href="index.html"> <img src="data/logo-rond-twitter.png"> </a> </li>
            <li><a href="index.html"> <img src="data/fb-logo.png"> </a> </li>
            <li><a href="index.html"> <img src="data/logo-rond-insta.png"> </a> </li>
            <li><a href="about.html">A notre propos</a></li>
          </ul>
        </span>
    
      </footer>
</body>

<script src="js/script.js"></script>

<script src="js/choco_perso.js"></script>

</html>