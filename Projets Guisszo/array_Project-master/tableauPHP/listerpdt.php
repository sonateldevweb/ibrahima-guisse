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
        <link rel="stylesheet" href="style.css">
<title>lister produit</title>
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
                              <a class="nav-link" href="<?='accueil.php?nom='.$nom?>">Accueil<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?='ajouterpdt.php?nom='.$nom?>">Ajouter Produit</a>
                            </li>
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

            <?php
             
    
                echo '<table class="table table-dark table-striped">
                <thead>
                
                 <thead>
                        <tr>       
                            <th> Nom du produit </th>
                            <th> Quantité</th>
                            <th> Prix </th>
                            <th> Montant </th>
                            <th> Modifier</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $l = "modifierpdt.php?nom=".$nom;
                    $lien="<a href=".$l.">Modifier Produit</a>";
                    

                // Création du tableau
                $listProd = array(
                                    array ("nom"=>"Chemise","prix"=>4000,"qtite"=>5,"mont"=>'',"modifier"=>$lien), 
                                    array("nom"=>"T-shirt","prix"=>2000,"qtite"=>23,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Pantallon","prix"=>6000,"qtite"=>15,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Short","prix"=>1500,"qtite"=>11,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Casquette","prix"=>1000,"qtite"=>10,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Costume","prix"=>40000,"qtite"=>7,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Blazer","prix"=>25000,"qtite"=>5,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Mocassin","prix"=>7000,"qtite"=>18,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Sandale","prix"=>3000,"qtite"=>12,"mont"=>'',"modifier"=>$lien),
                                    array("nom"=>"Sac","prix"=>4000,"qtite"=>9,"mont"=>'',"modifier"=>$lien));

                for($i=0; $i<count($listProd); $i++){
                    $ligne=$listProd[$i];
                    if($ligne["qtite"]>=10){
                        echo"<tr>
                                <td>".$ligne["nom"]."</td>
                                <td>".$ligne["qtite"]."</td>
                                <td>".$ligne["prix"]."</td>
                                <td>".$ligne["qtite"]*$ligne["prix"]."</td>
                                <td>".$ligne["modifier"]."</td>
                                </tr>";
                    }
                    else{
                        echo"<tr>
                                <td class='bg-danger'>".$ligne["nom"]."</td>
                                <td class='bg-danger'>".$ligne["qtite"]."</td>
                                <td class='bg-danger'>".$ligne["prix"]."</td>
                                <td class='bg-danger'>".$ligne["qtite"]*$ligne["prix"]."</td>
                                <td class='bg-danger'>".$ligne["modifier"]."</td>
                                </tr>";
                    }echo"</tbody>";
                }
                echo "</table>"; 
            ?>
           
        </div>
   

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>
