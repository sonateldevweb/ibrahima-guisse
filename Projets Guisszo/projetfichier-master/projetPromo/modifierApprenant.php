<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Modifier Apprenant</title>
  <meta charset="utf-8">
</head>

<body>
  <header>
    <!--DEBUT BARRE DE NAVIGATION-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">SonatelAcademy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="0" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="ajoutP.php">Ajout Promo<span class="sr-only">(current)</span></a>
            </li>
            <a class="nav-link" href="modifierPromo.php">Modifier Promo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="creerApprenant.php">Créer Apprenant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listerApprenant.php">Lister Apprenant</a>

            </li>

          </ul>

        </div>
      </div>
    </nav>
    <!--FIN DE LA BARRE DE NAVIGATION-->
  </header><br>
  <div class="container">
    <div class="container">
      <form class="form-staked" action="" method="POST">
        <label for="CodeApp" class="mr-sm-2"><strong>Code Apprenant</strong></label>
        <input type="text" value="<?php if (isset($_GET['Code'])) {
                                    $code = $_GET['Code'];
                                    echo $code;
                                  } ?>" class="form-control mb-2 mr-sm-2" id="CodeApp" name="code" disabled>
        <label for="NomApp" class="mr-sm-2"><strong>Nom Apprenant</strong></label>
        <input type="text" value="<?php if (isset($_GET['nom'])) {
                                    $nom = $_GET['nom'];
                                    echo $nom;
                                  } ?>" class="form-control mb-2 mr-sm-2" id="NomApp" name="NomApp">
        <label for="PrenomApp" class="mr-sm-2"><strong>Prenom Apprenant</strong></label>
        <input type="text" value="<?php if (isset($_GET['prenom'])) {
                                    $prenom = $_GET['prenom'];
                                    echo $prenom;
                                  } ?>" class="form-control mb-2 mr-sm-2" id="PrenomApp" name="PrenomApp">
        <label for="Datenais" class="mr-sm-2"><strong>Date Naissance </strong></label>
        <input type="date" value="<?php if (isset($_GET['datenais'])) {
                                    $datenais = $_GET['datenais'];
                                  }
                                  echo $datenais; ?>" class="form-control mb-2 mr-sm-2" id="Datenais" name="Datenais">
        <label for="Numtel" class="mr-sm-2"><strong>Telephone </strong></label>
        <input type="number" value="<?php if (isset($_GET['tel'])) {
                                      $tel = $_GET['tel'];
                                      echo $tel;
                                    } ?>" class="form-control mb-2 mr-sm-2" id="Numtel" name="Numtel">
        <label for="email" class="mr-sm-2"><strong>Email</strong></label>
        <input type="email" value="<?php if (isset($_GET['email'])) {
                                      $email = $_GET['email'];
                                      echo $email;
                                    } ?>" class="form-control mb-2 mr-sm-2" id="email" name="email">
        <label for="statut" class="mr-sm-2"><strong>statut</strong></label>
        <input type="text" value="<?php if (isset($_GET['statut'])) {
                                    $statut = $_GET['statut'];
                                    echo $statut;
                                  } ?>" class="form-control mb-2 mr-sm-2" id="statut" name="statut">
        <label for="Promo" class="mr-sm-2"><strong>Nom Promo</strong></label>

        <select name="promo" id="promo">
          <option value=""></option>
          <?php
          $file = fopen("Promo.txt", "r");
          while (!feof($file)) {
            $ligne = fgets($file);
            $tab = explode(";", $ligne);
            echo "<option>$tab[1]</option>";
          }
          fclose($file);
          ?>
        </select><br>
        <button type="submit" name="modifier" class="btn btn-outline-primary">Modifier Apprenant</button>
      </form>
    </div>

  </div><br>
  <div class="container">
    <?php

    if (isset($_POST['modifier'])) {
      $verifmodif = false;
      $file = fopen("Apprenant.txt", "r");
      $file2 = fopen("remplacant.txt", "w+");


      while (!feof($file)) {
        $ligne = fgets($file);
        $el = explode(";", $ligne);
        $cod = $el[0];
        $statut = $el[7];

        $codes = $_GET['Code'];

        if ($cod == $codes && !empty($codes)) {

          fwrite($file2, $codes . ";" . $_POST['promo'] . ";" . $_POST['NomApp'] . ";" . $_POST['PrenomApp'] . ";" . $_POST['Datenais'] . ";" . $_POST['Numtel'] . ";" . $_POST['email'] . ";" . $_POST['statut'] . "\n");
          $verifmodif = true;
        } elseif ($cod !== $codes) {
          fwrite($file2, $ligne);
        }
      }
      fclose($file);
      fclose($file2);

      if ($verifmodif == false) {
        echo "<font color=red> CE CODE ÉTUDIANT N'EXISTE PAS </font>";
      }
      $file = "Apprenant.txt";
      unlink($file);
      $file2 = "remplacant.txt";
      rename($file2, "Apprenant.txt");
    }

    $file = fopen("Apprenant.txt", "r");
    echo "<table class='table table-dark table-striped'>
                        <tr>
                              <th>Code Apprenant</th>
                              <th>Nom Promo</th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Date Nais</th>
                              <th>Telephone</th>
                              <th>Email</th>
                              <th>Statut</th>
                              <th>Modifier</th>
                        </tr>
                ";
    while (!feof($file)) {
      $ligne = fgets($file);
      $tab = explode(";", $ligne);
      echo "<tr>";
      for ($i = 0; $i < count($tab); $i++) {
        echo "<td>$tab[$i]</td>";
      }
      echo "<td><a href='modifierApprenant.php?Code=$tab[0]&promo=$tab[1]&nom=$tab[2]&prenom=$tab[3]&datenais=$tab[4]&tel=$tab[5]&email=$tab[6]&statut=$tab[7]' ><button' class='btn btn-outline-info'>Modifier</button></a></td>";
      echo "</tr>";
    }
    echo "</table>";
    fclose($file);
    ?>

  </div>
  <!--PARTIE SCRIPTS BOOTSTRAP-->

  <script href="js/bootstrap.js"></script>
  <script href="js/bootstrap.min.js"></script>
</body>

</html>