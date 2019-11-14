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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
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
                              <a class="nav-link" href="<?='accueil.php'?>">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="<?='listerpdt.php'?>">Lister Produit</a>
                                  </li>
                            <li class="nav-item">
                              <a class="nav-link" href="<?='ajouterpdt.php'?>">Ajouter Produit</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="<?='rechercherpdt.php'?>">Rechercher Produit</a>
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
  <div class="main">
    <div class="contrecherche">  
    <form id="recherche-form" class="recherche-form" method="POST" action=<?= $_SERVER["PHP_SELF"] ?>>       
      <div class="form-group">
          
        <div class="produit">
          <label for="produit">Produit</label>
          <input  value="<?php if(isset($_POST['produit'])) echo $_POST['produit'] ?>" type="produit" id="produit" name="produit" placeholder="Nom du Produit à modifier" />
        </div>
        <div class="max">
          <label for="prix">Prix</label>
          <input  value="<?php if(isset($_POST['prix'])) echo $_POST['prix'] ?>" type="number" name="prix" id="prix" placeholder="Nouveau Prix" min=100/>
        </div>
        <div class="form-quantite">
          <label for="quantite">Quantité</label>
          <input  value="<?php if(isset($_POST['quantite'])) echo $_POST['quantite'] ?>" type="number" name="quantite" id="quantite" min=0>
        </div>
        
        <div class="form-submit">
          <input type="submit" id="submit" class="submit" value="Modifier" name="modifiez"/>
        </div>
      </div>
    </form>
    </div>
  </div>
  
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
// Création du tableau  
$newligne="";

if(isset($_POST["modifiez"])){
    
    if(!empty($_POST["produit"]) && !empty($_POST["prix"]) && !empty($_POST["quantite"])){
      $nom=$_POST["produit"];
      $prix=$_POST["prix"];
      $qtite=$_POST["quantite"];
      
      $file=fopen("produit.txt","r+");

      while(!feof($file)){

        $ligne=fgets($file);
        $tab=explode(";",$ligne);
        
        if($nom==$tab[0] || strcasecmp($nom,$tab[0])==0){
          $nom=$tab[0];
          $tab[1]=$prix;
          $tab[2]=$qtite;
          $modif=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3];
        }
        else{
          $modif=$ligne;
        }
        $newligne=$newligne.$modif;
      }
      
      fclose($file);

      $file=fopen("produit.txt","w+");
      fwrite($file,$newligne);
      fclose($file);
    }   
  }
  $file=fopen("produit.txt","r");
  while(!feof($file)){

    $ligne=fgets($file);
    $tab=explode(";",$ligne);
    echo"<tr>";
    for($i=0; $i<count($tab); $i++){       
        $tab[3]=$tab[1]*$tab[2];
        
        if($tab[2]<10){
        echo"<td class='bg-danger'>".$tab[$i]."</td>";
      }
      
      else{
        echo"<td>".$tab[$i]."</td>";
      }
    }
    echo"</tr>";
  }
  fclose($file);

    
echo "</table>"; 
  ?>
</div>
</body>
<?php
include('footer.php');
?>
</html>