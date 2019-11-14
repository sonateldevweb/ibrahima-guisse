<?php
if(isset($_GET['nom'])){
  $nom=$_GET['nom'];
  }
  ?> 
                
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
<title>Modifier Produit</title>
<meta charset="utf-8">
</head>
<body>
<header>
            <!--DEBUT BARRE DE NAVIGATION-->

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <a class="navbar-brand" href="#">LOGO</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="<?='accueil.php?nom='.$nom?>">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="<?='listerpdt.php?nom='.$nom?>">Lister Produit</a>
                                  </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?='ajouterpdt.php?nom='.$nom?>">Ajouter Produit</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="<?='rechercherpdt.php?nom='.$nom?>">Rechercher Produit</a>
                                  </li>
                                  <li class="nav-item">
                                        <a class="nav-link" href="<?='supprimerpdt.php?nom='.$nom?>">Supprimer Produit</a>
                                  </li> 
                            
                          </ul>
                          
                        </div>
                    </div>
                      </nav>
                       <!--FIN DE LA BARRE DE NAVIGATION-->
        </header><br>


       
        <div class="container">
        <form class="form-inline" method="POST">
        <label for="nomProd" class="mr-sm-2"><strong>Nom Produit</strong></label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="nomProd" name="nomProd">
          <button type="submit" name="supprimer" class="btn btn-outline-primary">supprimer</button>
  </form>
        </div>

    <div class="container">
    <?php

         

     echo'<table class="table table-dark table-striped">
          <thead>
          
           <thead>
                  <tr>       
                      <th> Nom du produit </th>
                      <th> Prix </th>
                      <th> Quantité</th>
                      
                     
                    
                  </tr>
              </thead> 
              <tbody> ';      
              $listProd = array(
                array ("nom"=>"Chemise","prix"=>4000,"quantite"=>20), 
                array("nom"=>"T-shirt","prix"=>2000,"quantite"=>23),
                array("nom"=>"Pantallon","prix"=>6000,"quantite"=>15),
                array("nom"=>"Short","prix"=>1500,"quantite"=>11),
                array("nom"=>"Casquette","prix"=>1000,"quantite"=>10),
                array("nom"=>"Costume","prix"=>40000,"quantite"=>7),
                array("nom"=>"Blazer","prix"=>25000,"quantite"=>5),
                array("nom"=>"Mocassin","prix"=>7000,"quantite"=>18),
                array("nom"=>"Sandale","prix"=>3000,"quantite"=>12),
                array("nom"=>"Sac","prix"=>4000,"quantite"=>9));

        
            
            
            $boolnomProd=true;
            // $boolprix=true;
            // $boolqte=true;
            
            //&& strcasecmp($_POST['nomProd'],$val['nom'])==0

            if(isset($_POST['supprimer']))
            {
                if(!empty($_POST['nomProd'])){
                    $nomProd = $_POST['nomProd'];
                   
                }else{
                    $boolnomProd=false;
                }
                

                if(isset($nomProd))
                {  
                  echo"<tr>";
                  foreach($listProd as $key => $val) { 
                  
                    if($val['nom']==$nomProd)
                    {
                     
                      if(($nomProd == $val['nom']) && strcasecmp($_POST['nomProd'],$val['nom'])==0)
                      {
                       unset($listProd [$key['nom']]);

                    //    $val['prix'] = $_POST ['prix'];
                    //    $val['quantite'] = $_POST['quantite'];
                    //     echo "<td>".$val['nom']."</td>";
                    //     echo "<td>".$val['prix']."</td>";
                    //     echo "<td>".$val['quantite']."</td>";
                        // echo "<td>".$val['quantite']*$val['prix']."</td>";
                       
                       echo"fait3";
                       //var_dump($val['nom']);
                      }
                      
                      if(($nomProd == $val['nom']) && strcasecmp($_POST['nomProd'],$val['nom'])==0)
                      {
                       
                      
                        echo "<td>".$val['nom']."</td>";
                        echo "<td>".$val['prix']."</td>";
                        echo "<td>".$val['quantite']."</td>";
                        echo "<td>".$val['quantite']*$val['prix']."</td>";
                       
                       echo"fait";
                       //var_dump($val['nom']);
                      }else
                      {
                        echo"fait2";
                         echo "<td class=bg-danger>".$val['nom']."</td>";
                         echo "<td class=bg-danger>".$val['prix']."</td>";
                         echo "<td class=bg-danger>".$val['quantite']."</td>";
                        //  echo "<td>".$val['quantite']*$val['prix']."</td>"; 
                      }
                     
                    } 
                      
                    }
                    echo "</tr>";
                }else
                {
                    echo "<font color=red>ERREURE VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
                }
           
            }
            echo "</table>";
          ?>
    </div>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>