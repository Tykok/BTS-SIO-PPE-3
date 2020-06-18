<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Maison des Sports Régionale de la Réunion</title>
        <link rel="stylesheet" title="Design" href="design.css" type="text/css" media="screen">
    </head>
    <body>
        <?php
        $info = "";
        if (isset($_POST['MPasse'], $_POST['login'])) {
            $login = $_POST['login'];
            $Mdp = $_POST['MPasse'];

            //Connexion à la BDD
            include("00_connexion.php");

            //Requête pour récupérer les mots de passe et login administrateur
            $req = $conn->query('SELECT *
							FROM admin');

            //Boucle pour vérifier si toutes les valeurs login et mdp que l'utilisateur as sasisi correspondent à une des valeurs dans la BDD
            while ($affichreq = $req->fetch()) {
                if ($login == $affichreq['LoginAdmin'] && $Mdp == $affichreq['Password']) {
                    //Sinon on l'envoie vers l'espace administrateur
                    $Acces = true;
                    break;
                } else {
                    //Si aucun ne correspon on le renvoie à la page d'authentification
                    $Acces = false;
                }
            }
            if ($Acces) {
                include("z_EspaceAdmin.php");
                $secure = true;
            } else {
                $info = "L'identification a �chou�, l'identifiatn ou le mot de passe est incorrect";
                include("z_Authentification.php");
            }
        } else {
            include("z_Authentification.php");
        }
        ?>
    </body>
</html>