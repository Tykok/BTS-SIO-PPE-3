<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Maison des Sports Régionale de la Réunion</title>
		<link rel="stylesheet" title="Design" href="design.css" type="text/css" media="screen">
	</head>
<body>
    <center> <h1>Espace Administrateur</h1>

    <?php
	include("z_menuAdmin.php");
			include("00_connexion.php");

			$req = $conn->query('SELECT *
    FROM membres');


			while ($affichreq = $req->fetch()) {
				$IdMembre = $affichreq['IdMembre'];
				$NomMembre = $affichreq['NomMembre'];
				$PrenomMembre = $affichreq['PrenomMenbre'];
				$Profession = $affichreq['Profession'];
				$Mail = $affichreq['Mail'];
				$Tel = $affichreq['Tel'];
				$Image = $affichreq['
				Image'];
				?>				
					<div id=staff>
						<div class="Guest">
							<div class="box">
								<div class="imgBox">
								<?php echo " <img src='Membres/photos/$Image'"; ?>
								</div>
								<div class="details" onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='Impossible'; return true;">
									<div class="content">
										<h2><?php echo $NomMembre . " " . $PrenomMembre; ?></h2>
										<h2><p><?php echo $Profession; ?></h2></p>
										<br />
										<h2><p><?php echo $Mail; ?></h2></p>
										<br />
										<h2><p><?php echo $Tel; ?></h2></p>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
					<?php echo "<form method='POST' action='04_ModificationEmploye.php?Id=$IdMembre'>";
				?>
					<input type="submit" value="Modifier" name="Modifier">
			</form>
					<?php echo "<form method='POST' action='08_Suppresion.php?Id=$IdMembre' onsubmit='return sure()'> ";
				?>
					<input type="submit" value="Supprimer" name="Supprimer">
			</form>
	</center>
	<?php

}
?>

</body>
</html>