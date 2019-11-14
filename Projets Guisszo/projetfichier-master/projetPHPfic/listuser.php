<?php
session_start();
if (!isset($_SESSION['nom'])) {
  header('Location: index.php');
  exit();
}
$_SESSION["ouvert"] = true;

$nom = $_SESSION['nom'];
$statut = $_SESSION['statut'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>lister utilisateur</title>
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
              <a class="nav-link" href="<?= 'admin.php' ?>">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <a class="nav-link" href="<?= 'makeuser.php' ?>">Ajouter utilisateur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Deconnexion</a>
            </li>

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
                    <th>Nom</th>
                    <th>login</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Etat</th>
                  </tr>
            </thead>';

    $id_file = fopen("user2.txt", "r");

    while (!feof($id_file)) {

      $ligne = fgets($id_file);
      $tab = explode(";", $ligne);

      echo "<tr>";
      //for($i=0; $i<count($tab); $i++){       

      if ($tab[1] !== 'guisszo') {
        echo "<td>" . $tab[0] . "</td>";
        echo "<td>" . $tab[1] . "</td>";
        echo "<td>" . $tab[3] . "</td>";
        echo "<td>" . $tab[4] . "</td>";
        echo "<td>" . $tab[5] . "</td>";
        if ($tab[6] == 'actif') {
          echo "<td><a href='traitementUser.php?login=$tab[1]'><button' class='btn btn-outline-success'>$tab[6]</button></a></td>";
        } else {
          echo "<td><a href='traitementUser.php?login=$tab[1]'><button' class='btn btn-outline-danger'>$tab[6]</button></a></td>";
        }
      }


      echo "</tr>";
    }

    fclose($id_file);

    echo "</table>";

    ?>

  </div>

</body>
<?php
include('footer.php');
?>

</html>