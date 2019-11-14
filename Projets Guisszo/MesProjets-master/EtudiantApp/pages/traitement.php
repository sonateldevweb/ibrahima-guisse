<?php
    require "../autoload/Autoloader.php";
    Autoloader::autoreg();
    

    $matricule=$_POST['matricule'];
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $datenais=$_POST['datenais'];
     $adresse=$_POST['adresse'];
    $chambre=$_POST['chambre'];
    $typeBourse=$_POST['typeBourse'];
if(isset($_POST['ajouter'])){

    if(!empty($adresse) && $typeBourse=="" && $chambre=="")
    {
        //insertion du nonBoursier
        $servi = new EtudiantService();
        $bour= new NonBoursier($matricule,$nom,$prenom,$email,$phone,$datenais,$adresse);
        $sq=$servi->add($bour);

    }elseif(empty($adresse) && !empty($typeBourse) && $chambre=="")
    {
       //insertion du boursier si la condition est remplie               
        $serv = new EtudiantService();

        $bou= new Boursier($matricule,$nom,$prenom,$email,$phone,$datenais,$typeBourse);
        $sc=$serv->add($bou);

    }elseif($adresse=="" && !empty($typeBourse) && !empty($chambre))
    {
        $etd= new EtudiantService();
      
        
        $loger= new Loger($matricule,$nom,$prenom,$email,$phone,$datenais,$typeBourse,$chambre);
        $sc=$etd->add($loger);
    }
    header('Location: ../index.php');
}
     
  

?>