<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" title="Design" href="design.css" type="text/css" media="screen">
    </head>
    <body>
        <?php
        include('00_connexion.php');
        $Id = $_GET['Id'];

        if (isset($_POST['Nom'], $_POST['Prenom'], $_POST['Profession'], $_POST['Mail'], $_POST['Tel'])) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $profession = $_POST['Profession'];
            $mail = $_POST['Mail'];
            $tel = $_POST['Tel'];

            $req1 = $conn->prepare('UPDATE membres
				SET NomMembre = :nom ,
                                PrenomMembre = :prenom ,
                                Profession = :profession  ,
                                Mail = :mail ,
                                Tel = :tel
				WHERE IdMembre = :Id');
            
            $req1->execute(array('Id' => $Id, 
                'nom' => $nom, 
                'prenom' => $prenom, 
                'profession' => $profession, 
                'mail' => $mail, 
                'tel' => $tel));
        }

        $req2 = $conn->prepare("SELECT *
    FROM membres
    WHERE IdMembre = :id");
        $req2->execute(array('id' => $Id));

        $affichreq = $req2->fetch();
        $NomMembre = $affichreq['NomMembre'];
        $PrenomMembre = $affichreq['PrenomMembre'];
        $Profession = $affichreq['Profession'];
        $Mail = $affichreq['Mail'];
        $Tel = $affichreq['Tel'];
        $Image = $affichreq['Image'];


        echo "	<center> <h1>Modification de $NomMembre $PrenomMembre </h1>";

        echo "<form method='POST' enctype='multipart/form-data' action='04_ModificationEmploye.php?Id=$Id'>  </br> </br> </br>";
        ?>
        <table>
            <tr>
                <td>Nom : </td>
                <?php
                echo "<td><input type='text' value='$NomMembre' name='Nom' placeholder='Nom'></td> ";
                ?>
            <tr> 
            <tr>
                <td>Prénom  : </td>
                <?php
                echo "<td><input type='text' value='$PrenomMembre' name='Prenom' placeholder='Prenom'></td>";
                ?>
            </tr>
            <tr>
                <td>Profession : </td>
                <?php
                echo "<td><input type='text' value='$Profession' name='Profession' placeholder='Profession'></td>";
                ?>
            </tr>
            <tr>
                <td>Mail  : </td>
                <?php
                echo "<td><input type='text' value='$Mail' name='Mail' placeholder='Mail'></td>";
                ?>
            </tr>
            <tr>
                <td>Téléphone : </td>
                <?php
                echo "<td><input type='text' value='$Tel' name='Tel' placeholder='069...'></td>";
                ?>
            </tr>
            <tr>
                <td>Image  : </td>
                <?php
                echo "<td><input type='file' value='$Image' name='Image'></td>";
                ?>
            </tr>
            <tr colspan='2'>
            </tr>
        </table>
        <br/>
    <td> </td> <td> <input type='submit' value='Modification'></td>		
</form>
<br/>
</center>
<div id=staff>
    <div class="Guest">
        <div class="box">
            <div class="imgBox">
                <?php echo "<img src='Membres/photos/$Image'>"; ?>
            </div>
            <div class="details" onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status = 'Impossible';
                    return true;">
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
</body>
</html>