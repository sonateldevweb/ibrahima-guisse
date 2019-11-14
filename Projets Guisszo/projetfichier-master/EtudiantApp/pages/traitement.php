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

if(isset($_POST['ajouter'])){

    if(!empty($adresse) && $_POST['typeBourse']=="" &&$_POST['chambre']=="")
    {
        //insertion du nonBoursier
        $servi = new EtudiantService();
        $bour= new NonBoursier($matricule,$nom,$prenom,$email,$phone,$datenais,$adresse);
        $sq=$servi->add($bour);

    }elseif(empty($adresse) && !empty($_POST['typeBourse']) && $_POST['chambre']=="")
    {
       //insertion du boursier si la condition est remplie               
        $serv = new EtudiantService();
        //$donnees  = $serv->findAll('type_boursier');
        $bou= new Boursier($matricule,$nom,$prenom,$email,$phone,$datenais,$_POST['typeBourse']);
        $sc=$serv->add($bou);

    }elseif($adresse=="" && !empty($_POST['typeBourse']) && !empty($_POST['chambre']))
    {
        $etd= new EtudiantService();
       // var_dump($_POST['chambre']);die;
        //$data= $etd->findAll('loger');
        
        $loger= new Loger($matricule,$nom,$prenom,$email,$phone,$datenais,$_POST['typeBourse'],$_POST['chambre']);
        $sc=$etd->add($loger);
    }
    header('Location: register.php');
}
     
  

?>