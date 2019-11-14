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
<title>Ajout Produit</title>
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
                            <!-- <li class="nav-item">
                              <a class="nav-link" href="#a_propos">Ajouter Produit</a>
                            </li> -->
                            <li class="nav-item">
                                    <a class="nav-link" href="<?='rechercherpdt.php?nom='.$nom?>">Rechercher Produit</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?='modifierpdt.php?nom='.$nom?>">Modifier Produit</a>
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
        <label for="produit" class="mr-sm-2"><strong>Nom Produit</strong></label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="produit" name="produit">
        <label for="prix" class="mr-sm-2"><strong>Prix</strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="prix"  name="prix">
        <label for="quantite" class="mr-sm-2"><strong>Quantité</strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="quantite"  name="quantite">
          <button type="submit" name="ajouter" class="btn btn-outline-primary">Ajouter</button>
  </form>
        </div><br>
        <?php

echo '<table class="table table-dark table-striped">

  <thead>
        <tr>       
            <th> Nom du produit </th>
            <th> Prix </th>
            <th> Quantité</th>
            <th> Montant </th>
        </tr>
    </thead>
    <tbody>';

// Création du tableau
$listProd = array(
  array ("Chemise",4000,20,''), 
  array("T-shirt",2000,23,''),
  array("Pantallon",6000,15,''),
  array("Short",1500,6,''),
  array("Casquette",1000,10,''),
  array("Costume",40000,7,''),
  array("Blazer",25000,5,''),
  array("Mocassin",7000,18,''),
  array("Sandale",3000,12,''),
  array("Sac",4000,9,''));

  if(isset($_POST['ajouter'])){
    if(!empty($_POST["produit"])){

    
    $nomprod=$_POST["produit"];
    $prix=$_POST["prix"];
    $quantite=$_POST["quantite"];

    if($nomprod!='' && $prix!='' && $quantite!='' && $prix>=50 && $quantite>0){
      array_push($listProd, array("$nomprod", "$prix", "$quantite", "$prix"*"$quantite"));
      }else{
        echo"<font color=red>SAISIR UNE QUANTITE POSITIVE ET UN PRIX SUPERIEUR A 50</font>";
      }
  
        for($i=0; $i<count($listProd); $i++){
    echo "<tr>";

    for($j=0; $j<count($listProd[$i]); $j++){     
        
      $listProd[$i][3]= $listProd[$i][1]*$listProd[$i][2];                
        
      if($listProd[$i][2]<10){                    
          
          echo "<td class='bg-danger';>" .$listProd[$i][$j]."</td>";

        }

        else{
        
          echo "<td>" .$listProd[$i][$j]."</td>"; 

      }
    }
  echo "<tr>";
  }
}else{
  echo "<font color=red>REMPLIR TOUT LES CHAMPS</font>";
}
}
echo "</table>";


  
  ?>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>
