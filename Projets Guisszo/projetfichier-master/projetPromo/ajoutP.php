<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>ajouter Promo</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">SonatelAcademy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item active">
            <a class="nav-link" href="modifierPromo.php">Modifier Promo<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="listerApprenant.php">Lister Apprenant</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="listerPromo">Lister Promo</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="modifierApprenant.php">Modifier Apprenant</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="creerApprenant.php">Créer un Apprenant</a>
          </li>
         

        </ul>

      </div>
    </div>
  </nav><br>


  <div class="container">
    <div class="container">
      <form class="form-staked" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="CodePromo" class="mr-sm-2"><strong>Code Promo</strong></label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="CodePromo" name="CodePromo" placeholder="CodePromo">
        <label for="NomPromo" class="mr-sm-2"><strong>NomPromo</strong></label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="NomPromo" name="NomPromo" placeholder="NomPromo">
        <label for="mois" class="mr-sm-2"><strong>mois </strong></label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="mois" name="mois" placeholder="Mois">
        <label for="annee" class="mr-sm-2"><strong>annee </strong></label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="annee" name="annee" placeholder="annee">
        <button type="submit" name="ajouter" class="btn btn-outline-primary">Ajouter</button>
      </form>
    </div>

  </div><br>

  <?php



  $boolverifajout = false;

  if (isset($_POST['ajouter'])) {
    if (!empty($_POST["CodePromo"])) {

      $CodePromo = $_POST['CodePromo'];
    }
    if (!empty($_POST["NomPromo"])) {
      $NomPromo = htmlspecialchars($_POST['NomPromo']);
    }
    if (!empty($_POST['mois'])) {
      $Mois = htmlspecialchars($_POST['mois']);
    }
    if (!empty($_POST['annee'])) {
      $annee = htmlspecialchars($_POST['annee']);
    }

    echo '<div class= "container">';
    if (isset($CodePromo) && isset($NomPromo) && isset($Mois) && isset($annee)) {
      $ficpromo = "Promo.txt";
      $id_file = fopen($ficpromo, "a+");
      flock($id_file, 2);

      while (!feof($id_file)) {
        $tab = fgets($id_file);

        $tab = explode(";", $tab);


        if ($tab[0] == $CodePromo) {

          $boolverifajout = true;
        }
      }



      //var_dump($boolverifajout);
      if ($boolverifajout == true) {
        echo "<font color=red>Ce nom Existe Déjà</font>";
      } else {
        $chaine = "\n" . $CodePromo . ";" . $NomPromo . ";" . $Mois . ";" . $annee . ";";
        fwrite($id_file, $chaine);
        echo "<font color=green>NOUVELLE PROMO AJOUTÉE AVEC SUCCES</font>";
      }
      flock($id_file, 3);
      fclose($id_file);
    } else {
      echo "<font color=red> VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
    }
    echo '</div>';
  }




  ?>
  <!--PARTIE SCRIPTS BOOTSTRAP-->

  <script href="js/bootstrap.js"></script>
  <script href="js/bootstrap.min.js"></script>
</body>

</html>