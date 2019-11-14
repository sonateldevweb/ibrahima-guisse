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

<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
<title>Recherche Produit</title>
<meta charset="utf-8">
</head>
<body>
<header>
            <!--DEBUT BARRE DE NAVIGATION-->

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <a class="navbar-brand" href="#">LOGO</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="0" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="<?='accueil.php'?>">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="<?='listerpdt.php'?>">Lister Produit</a>
                                  </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?='ajouterpdt.php'?>">Ajouter Produit</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="<?='modifierpdt.php'?>">Rechercher Produit</a>
                                  </li>
                                  <li class="nav-item">
                                        <a class="nav-link" href="<?='supprimerpdt.php'?>">Supprimer Produit</a>
                                  </li> 
                                  <li><a href="<?='deconnexion.php'?>">Deconexion</a></li>
                            
                          </ul>
                          
                        </div>
                    </div>
                      </nav>
                       <!--FIN DE LA BARRE DE NAVIGATION-->
        </header><br>
        <div class="container">
        <form class="form-inline" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="prixInf" class="mr-sm-2"><strong>PrixInf</strong></label>
        <input value="<?php if(isset($_POST['prixInf'])) echo $_POST['prixInf'] ?>" type="number" class="form-control mb-2 mr-sm-2" id="prixInf" name="prixInf">
        <label for="prixSup" class="mr-sm-2"><strong>PrixSup</strong></label>
        <input value="<?php if(isset($_POST['prixSup'])) echo $_POST['prixSup'] ?>" type="number" class="form-control mb-2 mr-sm-2" id="prixSup"  name="prixSup">
        <label for="quantite" class="mr-sm-2"><strong>Par quantité</strong></label>
        <input value="<?php if(isset($_POST['quantite'])) echo $_POST['quantite'] ?>" type="number" class="form-control mb-2 mr-sm-2" id="quantite"  name="quantite">
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
                    <th> Montant</th>
                    
                  
                </tr>
            </thead>
            <tbody> ';     
            
            
            $boolprixInf=1;
            $boolprixSup=1;
            $boolqte=1;

            if(isset($_POST['recherche']))
            {
                if(!empty($_POST['prixInf'])){
                    $prixInf = $_POST['prixInf'];
                   
                }else{
                    $boolprixInf=0;
                }
                if(!empty($_POST['prixSup'])){
                    $prixSup = $_POST['prixSup'];
                }else{
                    $boolprixSup=0;
                }
                if(!empty($_POST['quantite'])){
                    $quantite = $_POST['quantite'];
                }else{
                    $boolqte=0;
                }


                if(isset($prixInf) || isset($prixSup) || isset($quantite))
                {
                    
                       // header('Location: accueil.php?nom='.$nom);
                       
                        $file="produit.txt";

                        $id_file=fopen($file,"r");
            
                       
            while(!feof($id_file))
            {
                            $ligne=fgets($id_file);

                            $tab=explode(";",$ligne);
                echo"<tr>";
                           
                if(isset($prixInf) && $boolprixSup==0 && $boolqte==0)
                    {
                        
                        if($tab[1] >= $prixInf )
                        {
                            
                            if($tab[2]>=10){
                                echo"<tr>
                                        <td>".$tab[0]."</td>
                                        <td>".$tab[1]."</td>
                                        <td>".$tab[2]."</td>
                                        <td>".$tab[2]*$tab[1]."</td>                            
                                        </tr>";
                            }
                            else{
                                echo"<tr>
                                        <td class='bg-danger'>".$tab[0]."</td>
                                        <td class='bg-danger'>".$tab[1]."</td>
                                        <td class='bg-danger'>".$tab[2]."</td>                        
                                        <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                        </tr>";
                            }
                        
                                           
                        }
                    
                    }
                elseif(isset($prixSup) && $boolprixInf==0 && $boolqte==0)
                    {
                        if($tab[1] <= $prixSup)
                        {
                             
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
               
                            
                        }
                    }
                elseif(isset($prixInf) && isset($prixSup) && $boolqte==0)
                      {
                        if($prixInf <= $tab[1] && $tab[1] <= $prixSup)
                        {
                             
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
                 
                                                
                        }
                      }
                elseif(isset($prixInf) && isset($quantite) && $boolprixSup==0)
                    {
                        if($prixInf <= $tab[1] && $quantite <= $tab[2])
                        {
                             
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
                 
            
                        }
                    }
                elseif(isset($prixSup) && isset($quantite) && $boolprixInf==0)
                    {
                        if($prixSup >= $tab[1] && $quantite >= $tab[2])
                        {
                             
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
                 
            
                        }
                    }
                elseif(isset($quantite) && $boolprixInf==0 && $boolprixSup==0)
                    {
                        if($quantite <= $tab[2])
                        {
                             
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
                 
                    
                        }
                    }
                    elseif(isset($prixInf) && isset($prixSup)  && isset($quantite) )
                        {
                            if($prixInf < $tab[1] && $tab[1] < $prixSup && $quantite <= $tab[2])
                            {
                                 
                        if($tab[2]>=10){
                            echo"<tr>
                                    <td>".$tab[0]."</td>
                                    <td>".$tab[1]."</td>
                                    <td>".$tab[2]."</td>
                                    <td>".$tab[2]*$tab[1]."</td>                            
                                    </tr>";
                        }
                        else{
                            echo"<tr>
                                    <td class='bg-danger'>".$tab[0]."</td>
                                    <td class='bg-danger'>".$tab[1]."</td>
                                    <td class='bg-danger'>".$tab[2]."</td>                        
                                    <td class='bg-danger'>".$tab[2]*$tab[1]."</td>
                                    </tr>";
                        }
               
                                // echo "<td>".$tab[0]."</td>";
                                // echo "<td>".$tab[1]."</td>";
                                // echo "<td>".$tab[2]."</td>";
                            }
                        }
                echo"<tr>";
            }
                        }
                           
                }
            
            echo "</table>";
          ?>
    </div>
   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
<?php
include('footer.php');
?>
</html>