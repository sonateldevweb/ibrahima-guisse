<?php
require "../autoload/Autoloader.php";
Autoloader::autoreg();
if(!empty($_GET['id']))
{
$id_etu=$_GET['id'];
}

$Service= new EtudiantService();
$Service->supprimerEtu($id_etu);
 ?>
