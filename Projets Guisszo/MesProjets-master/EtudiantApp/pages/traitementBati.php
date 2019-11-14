<?php
require "../autoload/Autoloader.php";
Autoloader::autoreg();

if (isset($_POST['ajouter'])) {
    if (!empty($_POST['batiment'])) {
        $etd = new EtudiantService();
        $con = $etd->getPDO();
        $pdostat = $con->prepare('INSERT INTO batiment (nom_bati) VALUE(:nom_bati)');
        $pdostat->bindParam(':nom_bati', $_POST['batiment']);
        $donnees = $pdostat->execute();

    }
}
$batiment=$_POST['bati'];
if(isset($_POST['ajouter']))
{
    if(!empty($_POST['bati'])){
        $etd = new EtudiantService();
        $con = $etd->getPDO();
        $pdostat = $con->prepare('INSERT INTO chambre (id_bati) VALUE(:id_bati)');
        $pdostat->bindParam(':id_bati', $batiment);
        $donnees = $pdostat->execute();
        header('Location: Ajoutchambre.php');

    }
}
