<?php

// récupération des données fournies dans la page 01
$login = $_POST['login'];
$Mdp = $_POST['MPasse'];
// Le mot de passe n'a pas été envoyé ou n'est pas bon
if (!isset($login) && !isset($Mdp)){
    ?>
    // Afficher le formulaire de saisie du mot de passe
    <center> <h1>Accès sécurisé à l'espace Administrateur</h1>
	
	<h3>Veuillez vous identifier</h3>
	<form method='POST' action='02_ControleAdmin.php' >  </br> </br> </br>
		<table>
			<tr>
				<td>Nom utilisateur : </td>
				<td><input type='text' name='login' required="required" placeholder="Login"></td> 
</tr>
			<tr>
				<td>Mot de passe : </td>
				<td><input type='password' name='MPasse' required="required" placeholder="Mot de passe"></td>
			</tr>
			<tr colspan='2'>
			</tr>
		</table>
		<br/>
				<td> </td> <td> <input type='submit' value='Accés Admin'></td>
		
	</form>
	<br/>
	</center>
    <?php
}
// Le mot de passe a été envoyé et il est bon
else
{ 
//Connexion à la BDD
include("00_connexion.php");

//Requête pour récupérer les mots de passe et login administrateur
$req = $conn->query('SELECT *
                        FROM admin');

                        //Boucle pour vérifier si toutes les valeurs login et mdp que l'utilisateur as sasisi correspondent à une des valeurs dans la BDD
while ($affichreq = $req->fetch()) {
    if ($login != $affichreq['LoginAdmin'] &&  $Mdp != $affichreq['Password']) {
        //Si aucun ne correspon on le renvoie à la page d'authentification
        header("Location: 01_Authentification.php?Id=1");
    } /*else {
        //Sinon on l'envoie vers l'espace administrateur
        header('Location: 03_EspaceAdmin.php');
    }*/
}
}

?>