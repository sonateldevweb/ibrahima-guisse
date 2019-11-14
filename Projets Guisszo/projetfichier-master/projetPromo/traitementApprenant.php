<?php
    //traitement
   extract($_GET);
        $newligne='';

        $promo=$_GET['promo'];
    $id_file=fopen("Apprenant.txt","r");
    while(!feof($id_file)){

        $ligne=fgets($id_file);
        $tab=explode(";",$ligne);
        
        if($promo==$tab[0]){
          if($tab[7]=='accepté')
          {
              $tab[7]='exclu';
          
        }else
            {
                $tab[7]='accepté';

            }
           
        }
        $modif=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";".$tab[7].";\n";
        $newligne=$newligne.$modif;
     
      //$modif=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[6].";".$tab[7]."\n";
        
        

    }
    fclose($id_file);
    $id_file=fopen('Apprenant.txt','w+');
    fputs($id_file,trim($newligne));
    fclose($id_file);
   // unlink('Apprenant.txt');
    //rename('rep.txt','Apprenant.txt');
     header('Location: listerApprenant.php');

  ?>