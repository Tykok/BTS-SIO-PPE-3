<?php
 //On informe les valeurs à entrer dans PDO pour ce connecter dans des variables pour mieux ce repérer
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ms2r";
try {
     //On teste la connexion et on l'effectue si celle-ci fonctionne
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (Exception $e) {
                    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>