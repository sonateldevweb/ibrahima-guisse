
<?php
session_start();
if(!isset($_SESSION['nom']))
{
    header('Location: index.php');
    exit();
}
$_SESSION["ouvert"]=true;
       $nom=$_SESSION['nom'];
       $statut=$_SESSION['statut'];
?>

<?php
    //traitement
   
        $newligne='';

        $login=$_GET['login'];
    $id_file=fopen("user2.txt","r");
    while(!feof($id_file)){

        $ligne=fgets($id_file);
        $tab=explode(";",$ligne);
        
        if($login==$tab[1]){
          if($tab[6]=='actif')
          {
              $tab[6]='bloqué';
          
        }
            else
            {
                $tab[6]='actif';

            }
        
      }
      $modif=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";"."\n";
        $newligne=$newligne.$modif;
        

    }
    fclose($id_file);
    $id_file=fopen('lister.txt','w');
    fputs($id_file,trim($newligne));
    fclose($id_file);
    unlink('user2.txt');
    rename('lister.txt','user2.txt');
     header('Location: listuser.php');

  ?>