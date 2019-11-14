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
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" type="text/css" href="style.css">
<title>lister produit</title>
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

  <div class="container"><br>

    <?php

echo '<table class="table table-dark table-striped">
  <thead>
    <tr>       
      <th> Nom du produit </th>
      <th> Prix </th>
      <th> Quantité</th>
      <th> Montant </th>
    </tr>
  </thead>';

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

  echo"</table>";

    ?>
        
  </div>
</body>
<?php
include('footer.php');
?>
</html>