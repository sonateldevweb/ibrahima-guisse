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
                              <a class="nav-link" href="<?='accueil.php'?>">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="<?='listerpdt.php'?>">Lister Produit</a>
                                  </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="<?='rechercherpdt.php'?>">Rechercher Produit</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?='modifierpdt.php'?>">Modifier Produit</a>
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
        <label for="produit" class="mr-sm-2"><strong>Nom Produit</strong></label>
        <input  value="<?php if(isset($_POST['produit'])) echo $_POST['produit'] ?>" type="text" class="form-control mb-2 mr-sm-2" id="produit" name="produit">
        <label for="prix" class="mr-sm-2" ><strong>Prix</strong></label>
        <input  value="<?php if(isset($_POST['prix'])) echo $_POST['prix'] ?>" type="number" class="form-control mb-2 mr-sm-2" id="prix"  min=100 name="prix">
        <label for="quantite" class="mr-sm-2"><strong>Quantité</strong></label>
        <input  value="<?php if(isset($_POST['quantite'])) echo $_POST['quantite'] ?>" type="number" class="form-control mb-2 mr-sm-2" id="quantite" min=1 name="quantite">
          <button type="submit" name="ajouter" class="btn btn-outline-primary">Ajouter</button>
  </form>
        </div><br>
        <?php
 
                        $boolverifajout=false;
                          
                        if(isset($_POST['ajouter'])){
                            if(!empty($_POST["produit"])){

                              $produit = $_POST['produit'];
                                }else{
                              $boolpdt=false;
                          }
                          if(!empty($_POST["prix"])){
                              $prix = htmlspecialchars($_POST['prix']);
                              
                          }else{
                              $boolprix=false;
                          }
                          if(!empty($_POST['quantite'])){
                              $quantite =htmlspecialchars($_POST['quantite']);
                              
                          }else{
                              $boolqte=false;
                          }

  echo '<div class= "container">';
        if(isset($produit) && isset($prix) && isset($quantite) )
        {  
          $file="produit.txt";
          $id_file=fopen($file,"a+");
          flock($id_file,2);

         
           
          while(!feof($id_file))
          {
              $tab=fgets($id_file);
              
              $tab=explode(";",$tab);
              
              
              if($tab[0]==$produit)
              {              
                
                $boolverifajout=true;                
              }              
              
          }
         
          //var_dump($boolverifajout);
          if($boolverifajout==true){
            echo "<font color=red>Ce Produit Existe Déjà</font>";
          }else
          { 
            $chaine="\n".$produit.";".$prix.";".$quantite.";";
            fwrite($id_file,$chaine);
            echo "<font color=green>PRODUIT AJOUTÉ AVEC SUCCES</font>";
            
          }
          flock($id_file,3);
          fclose($id_file);
        } else
        {
          echo "<font color=red> VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
        } echo '</div>';

}
echo "<div class='container'>";
echo '<table class="table table-dark table-striped">
<thead>

 <thead>
        <tr>       
            <th> Nom du produit </th>
            <th> Quantité</th>
            <th> Prix </th>
            <th> Montant </th>
            
        </tr>
    </thead>
    <tbody>';

    $file="produit.txt";
    $id_file=fopen($file,"r");
    while(!feof($id_file))
    {
        $tab=fgets($id_file);
        
        $tab=explode(";",$tab);
    
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
    echo"</tbody>";
              
          echo "</table>"; 
    fclose($id_file);



  echo "</div>";
  ?>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
<?php
include('footer.php');
?>
</html>