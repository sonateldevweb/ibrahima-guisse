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
<title>Recherche Produit</title>
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
                                    <a class="nav-link" href="<?='modifierpdt.php?nom='.$nom?>">Rechercher Produit</a>
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
        <label for="prixInf" class="mr-sm-2"><strong>PrixInf</strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="prixInf" name="prixInf">
        <label for="prixSup" class="mr-sm-2"><strong>PrixSup</strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="prixSup"  name="prixSup">
        <label for="quantite" class="mr-sm-2"><strong>Par quantité</strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="quantite"  name="quantite">
          <button type="submit" name="recherche" class="btn btn-outline-primary">Rechercher</button>
  </form>
        </div><br>

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
                array("nom"=>"Sac","prix"=>4000,"quantite"=>9)
                );

        
            
            
            $boolprixInf=true;
            $boolprixSup=true;
            $boolqte=true;
            if(isset($_POST['recherche']))
            {
                if(!empty($_POST['prixInf'])){
                    $prixInf = $_POST['prixInf'];
                   
                }else{
                    $boolprixInf=false;
                }
                if(!empty($_POST['prixSup'])){
                    $prixSup = $_POST['prixSup'];
                }else{
                    $boolprixSup=false;
                }
                if(!empty($_POST['quantite'])){
                    $quantite = $_POST['quantite'];
                }else{
                    $boolqte=false;
                }


                if(isset($prixInf) || isset($prixSup) || isset($quantite))
                {
                    foreach($listProd as $cle){
             
            
                        echo"<tr>";
                            if(isset($quantite) && $boolprixInf==false && $boolprixSup==false)
                            {
                                foreach($cle as $val)
                                {
                                    if($quantite < $cle['quantite'])
                                    {
                                        echo "<td>".$val."</td>";
                                    }
                                }

                            }elseif(isset($prixInf) && isset($prixSup) && $boolqte==false)
                            
                            {                                
                                foreach($cle as $val)
                                {
                                    if(($prixInf < $cle['prix']) && ($cle['prix'] < $prixSup))
                                    {
                                        echo "<td>".$val."</td>";
                                    }
                                } 

                            }elseif(isset($prixInf) && isset($quantite) && $boolprixSup==false)
                            {
                                 foreach($cle as $val)
                                {
                                    if(($prixInf < $cle['prix']) AND ($quantite < $cle['quantite']))
                                    {
                                        echo "<td>".$val."</td>";
                                        //var_dump($val);
                                    }
                                }

                            }elseif(isset($prixSup) && isset($quantite) && $boolprixInf==false)
                            
                            {                                foreach($cle as $val)
                                {
                                    if(($prixSup > $cle['prix']) && $quantite > $cle['quantite'])
                                    {
                                        echo "<td>".$val."</td>";
                                    }
                                } 

                            }elseif(isset($prixInf)&& $boolprixSup==false && $boolqte==false)
                            
                            {                                foreach($cle as $val)
                                {
                                    if(($prixInf < $cle['prix']))
                                    {
                                        echo "<td>".$val."</td>";
                                    }
                                } 

                            }elseif(isset($prixSup) && $boolprixInf==false && $boolqte==false)
                            
                            {      
                                 foreach($cle as $val)
                                {
                                    if(($prixSup > $cle['prix']))
                                    {
                                        echo "<td>".$val."</td>";
                                    }
                                } 
                            }else
                            {
                                echo "ERREURE";
                            }
                        echo "</tr>";
                      }
                }
            }
            
          ?>
    </div>
   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>