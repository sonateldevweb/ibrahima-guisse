<?php
extract($_GET);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Modifier Apprenant</title>
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
                        <a class="nav-link" href="modifierPromo.php">modification Promo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="creerApprenant.php">Créer Apprenant </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajoutP.php">Ajout Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listerApprenant.php">lister Apprenant</a>

                    </li>
                </ul>

            </div>
        </div>
    </nav><br>


    <div class="container">
        <div class="container">
            <form class="form-staked" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="CodeApp" class="mr-sm-2"><strong>Code Apprenant</strong></label>
                <input type="text" value="<?php  echo $_GET['Code']; ?>" class="form-control mb-2 mr-sm-2" id="CodeApp" name="CodeApp"disabled>
                <label for="NomApp" class="mr-sm-2"><strong>Nom Apprenant</strong></label>
                <input type="text" value="<?php  echo $_GET['nom']; ?>" class="form-control mb-2 mr-sm-2" id="NomApp" name="NomApp">
                <label for="PrenomApp" class="mr-sm-2"><strong>Prenom Apprenant</strong></label>
                <input type="text" value="<?php $prenom= $_GET['prenom']; echo $prenom; ?>" class="form-control mb-2 mr-sm-2" id="PrenomApp" name="PrenomApp">
                <label for="Datenais" class="mr-sm-2"><strong>Date Naissance </strong></label>
                <input type="date" value="<?php echo $_GET['datenais']; ?>" class="form-control mb-2 mr-sm-2" id="Datenais" name="Datenais">
                <label for="Numtel" class="mr-sm-2"><strong>Numtel </strong></label>
                <input type="number" value="<?php  echo $_GET['tel']; ?>" class="form-control mb-2 mr-sm-2" id="Numtel" name="Numtel">
                <label for="email" class="mr-sm-2"><strong>Email</strong></label>
                <input type="email" value="<?php echo $_GET['email']; ?>" class="form-control mb-2 mr-sm-2" id="email" name="email" >               
                <label for="statut" class="mr-sm-2"><strong>statut</strong></label>
                <input type="text" value="<?php  echo $_GET['statut']; ?>" class="form-control mb-2 mr-sm-2" id="statut" name="statut">
                <label for="Promo" class="mr-sm-2"><strong>Promo Apprenant</strong></label>
                <select name="promo" id="promo">
                    <option><?php  echo $_GET['promo']; ?></option>
                <?php
                
               // echo ' <select name="promo" id="promo">';
                $id_file = fopen("Promo.txt", "r");

                while (!feof($id_file)) {

                    $ligne = fgets($id_file);
                    $tab = explode(";", $ligne);
                    $NomPromo = $tab[1];

                    echo "<option>" . $tab[1] . "</option>";
                }
                fclose($id_file);
                echo ' </select><br>';

                ?>
                </select><br>
                <button type="submit" name="modifier" class="btn btn-outline-primary">Modifier Apprenant</button>
            </form>
        </div>

    </div><br>
    <div class="container">
        <?php
        echo '<table class="table table-dark table-striped">
  <thead>
        <tr>       
            <th>Code Apprenant</th>
            <th>Nom Promo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date Nais</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>';

        // Création du tableau  
        $newligne = "";

        if (isset($_POST["modifier"])) {

            if (
                !empty($_POST["CodeApp"]) && !empty($_POST["promo"]) && !empty($_POST["NomApp"]) && !empty($_POST["PrenomApp"])
                && !empty($_POST["Datenais"]) && !empty($_POST["Numtel"]) && !empty($_POST["email"]) && !empty($_POST["statut"])
            ) {

                $CodeApp = $_POST["CodeApp"];
                $Nompromo = $_POST['promo'];
                $NomApp = $_POST["NomApp"];
                $PrenomApp = $_POST["PrenomApp"];
                $Datenais = $_POST['Datenais'];
                $tel = $_POST['Numtel'];
                $email = $_POST['email'];
                $statut = $_POST['statut'];
                $file = fopen("Apprenant.txt", "r+");

                while (!feof($file)) {

                    $ligne = fgets($file);
                    $tab = explode(";", $ligne);

                    if ($CodeApp == $tab[0] || strcasecmp($CodeApp, $tab[0]) == 0) {
                        $CodeApp = $tab[0];
                        $tab[1] = $Nompromo;
                        $tab[2] = $NomApp;
                        $tab[3] = $PrenomApp;
                        $tab[4] = $Datenais;
                        $tab[5] = $tel;
                        $tab[6] = $email;
                        $tab[7] = $statut;
                        $modif = $tab[0] . ";" . $tab[1] . ";" . $tab[2] . ";" . $tab[3] . ";" . $tab[4] . ";" . $tab[5] . ";" . $tab[6] . ";" . $tab[7] . ";" . "\n";
                    } else {
                        $modif = $ligne;
                    }
                    $newligne = $newligne . $modif;
                }

                fclose($file);

                $file = fopen("Apprenant.txt", "w+");
                fwrite($file, $newligne);
                fclose($file);
            }
        }
        $file = fopen("Apprenant.txt", "r");
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

</body>

</html>

<?php
      echo "<table class='table table-dark table-striped'>
       <tr>
             <th>Code Promo</th>
             <th>Nom Promo</th>
             <th>Mois</th>
             <th>Année</th>
             <th>Nbre Apprenants</th>
             <th>Statut</th>
            
             
       </tr>
";
      echo "<tr>";
      if (isset($_POST['lister'])) {
          
        $codepromo = $_POST['promo'];
        $file = fopen("Promo.txt", "r");
        while (!feof($file)) {
          
          if ($codepromo == $tab[1]) {


            for ($i = 0; $i < count($tab); $i++) {
              echo "<td>$tab[$i]</td>";
              // var_dump($tab[$i]);
            }
            echo "<td>
          <a href='modifierApprenant.php?promo=$tab[1]' ><button' class='btn btn-outline-info'>Modifier</button></a>
          </td>";
            echo "</tr>";
          }
        }
      } else {
        $file = fopen("Promo.txt", "r");

        while (!feof($file)) {
          $ligne = fgets($file);
          $tab = explode(";", $ligne);
          echo "<tr>";
          for ($i = 0; $i < count($tab); $i++) {
            echo "<td>$tab[$i]</td>";
          }
          echo "<td><a href='modifierApprenant.php?promo=$tab[1]' ><button' class='btn btn-outline-info'>Modifier</button></a></td>";

          echo "</tr>";
        }
        echo "</table>";
        fclose($file);
      }

      ?>