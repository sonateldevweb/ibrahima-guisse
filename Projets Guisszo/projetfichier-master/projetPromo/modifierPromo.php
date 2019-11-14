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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">SonatelAcademy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= 'ajoutP.php' ?>">Ajouter Promo <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="listerPromo.php">Lister Promo</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="creerApprenant.php">Créer apprenant</a>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="listerApprenant.php">Lister Apprenant</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="modifierApprenant.php">modifier Apprenant</a>

            </li>
            
          </ul>

        </div>
      </div>
    </nav>
    <!--FIN DE LA BARRE DE NAVIGATION-->
  </header><br>

  <div class="container">
    <div class="container">
      <form class="form-staked" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="CodePromo" class="mr-sm-2"><strong>Code Promo</strong></label>
        <input type="text" value="<?php if (isset($_POST['CodePromo'])) echo $_POST['CodePromo'] ?>" class="form-control mb-2 mr-sm-2" id="CodePromo" name="CodePromo" placeholder="CodePromo">
        <label for="NomPromo" class="mr-sm-2"><strong>NomPromo</strong></label>
        <input type="text" value="<?php if (isset($_POST['NomPromo'])) echo $_POST['NomPromo'] ?>" class="form-control mb-2 mr-sm-2" id="NomPromo" name="NomPromo" placeholder="NomPromo">
        <label for="mois" class="mr-sm-2"><strong>mois </strong></label>
        <input type="text" value="<?php if (isset($_POST['mois'])) echo $_POST['mois'] ?>" class="form-control mb-2 mr-sm-2" id="mois" name="mois" placeholder="Mois">
        <label for="annee" class="mr-sm-2"><strong>annee </strong></label>
        <input type="number" value="<?php if (isset($_POST['annee'])) echo $_POST['annee'] ?>" class="form-control mb-2 mr-sm-2" id="annee" name="annee" placeholder="annee">
        <button type="submit" name="modifier" class="btn btn-outline-primary">modifier</button>
      </form>
    </div>

  </div><br>
  <div class="container">
    <?php
    echo '<table class="table table-dark table-striped">
  <thead>
        <tr>       
            <th> Code </th>
            <th> Nom </th>
            <th> Mois</th>
            <th> Année </th>
        </tr>
    </thead>
    <tbody>';

    // Création du tableau  
    $newligne = "";

    if (isset($_POST["modifier"])) {

      if (!empty($_POST["CodePromo"]) && !empty($_POST["NomPromo"]) && !empty($_POST["mois"])) {
        $CodePromo = $_POST["CodePromo"];
        $NomPromo = $_POST["NomPromo"];
        $mois = $_POST["mois"];
        $annee = $_POST['annee'];

        $file = fopen("Promo.txt", "r+");

        while (!feof($file)) {

          $ligne = fgets($file);
          $tab = explode(";", $ligne);

          if ($CodePromo == $tab[0] || strcasecmp($CodePromo, $tab[0]) == 0) {
            $CodePromo = $tab[0];
            $tab[1] = $NomPromo;
            $tab[2] = $mois;
            $tab[3] = $annee;

            $modif = $tab[0] . ";" . $tab[1] . ";" . $tab[2] . ";" . $tab[3] . ";" . "\n";
          } else {
            $modif = $ligne;
          }
          $newligne = $newligne . $modif;
        }

        fclose($file);

        $file = fopen("Promo.txt", "w+");
        fwrite($file, $newligne);
        fclose($file);
      }
    }
    $file = fopen("Promo.txt", "r");
    while (!feof($file)) {

      $ligne = fgets($file);
      $tab = explode(";", $ligne);
      echo "<tr>";
      for ($i = 0; $i < count($tab); $i++) {



        echo "<td>" . $tab[$i] . "</td>";
      }
      echo "</tr>";
    }
    fclose($file);


    echo "</table>";
    ?>
  </div>
  <!--PARTIE SCRIPTS BOOTSTRAP-->

  <script href="js/bootstrap.js"></script>
  <script href="js/bootstrap.min.js"></script>
</body>

</html>