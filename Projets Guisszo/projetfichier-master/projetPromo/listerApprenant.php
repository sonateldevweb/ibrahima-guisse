<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Lister Apprenant</title>
</head>

<body>
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
          <li class="nav-item active">
            <a class="nav-link" href="listerPromo.php">Lister Promo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="creerApprenant.php">Créer Apprenant</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modifierApprenant.php">modifier Apprenant</a>

          </li>

        </ul>

      </div>
    </div>
  </nav>
  <!--FIN DE LA BARRE DE NAVIGATION-->
  <div class="container">
    <div class="container">

      <form action="listerApprenant.php" method="POST">

        <label for="Promo" class="mr-sm-2"><strong>Choisir Promo !!</strong></label>
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
        <button type="submit" name="lister" class="btn btn-outline-primary">Lister Apprenant</button>
      </form> <br>
      <?php
    
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
      echo "<tr>";
      if (isset($_POST['lister'])) {
        $codepromo = $_POST['promo'];
        $file = fopen("Apprenant.txt", "r");
        while (!feof($file)) {
          $ligne = fgets($file);
          $tab = explode(";", $ligne);
          if ($codepromo == $tab[1]) {


            echo "<td>$tab[0]</td>";
            echo "<td>$tab[1]</td>";
            echo "<td>$tab[2]</td>";
            echo "<td>$tab[3]</td>";
            echo "<td>$tab[4]</td>";
            echo "<td>$tab[5]</td>";
            echo "<td>$tab[6]</td>";
            if($tab[7]=='accepté')
            {
              echo "<td><a href='traitementApprenant.php?promo=$tab[1]'><button' class='btn btn-outline-success'>$tab[7]</button></a></td>";
            }else
            {
              echo "<td><a href='traitementApprenant.php?promo=$tab[1]'><button' class='btn btn-outline-danger'>$tab[7]</button></a></td>";

            }
            
            echo "<td>
          <a href='modifierApprenant.php?Code=$tab[0]&promo=$tab[1]&nom=$tab[2]&prenom=$tab[3]&datenais=$tab[4]&tel=$tab[5]&email=$tab[6]&statut=$tab[7]' ><button' class='btn btn-outline-info'>Modifier</button></a>
          </td>";
            echo "</tr>";
          }
        }
      } else {
        $file = fopen("Apprenant.txt", "r");

        while (!feof($file)) {
          $ligne = fgets($file);
          $tab = explode(";", $ligne);
          echo "<tr>";
          //for ($i = 0; $i < count($tab); $i++) {
            echo "<td>$tab[0]</td>";
            echo "<td>$tab[1]</td>";
            echo "<td>$tab[2]</td>";
            echo "<td>$tab[3]</td>";
            echo "<td>$tab[4]</td>";
            echo "<td>$tab[5]</td>";
            echo "<td>$tab[6]</td>";
            if($tab[7]=='accepté')
            {
              
              echo "<td><a href='traitementApprenant.php?promo=$tab[0]'><button' class='btn btn-outline-success'>$tab[7]</button></a></td>";
            }else  if($tab[7]=='exclu')
            {
              echo "<td><a href='traitementApprenant.php?promo=$tab[0]'><button' class='btn btn-outline-danger'>$tab[7]</button></a></td>";

            }
          //}
          echo "<td><a href='modifierApprenant.php?Code=$tab[0]&promo=$tab[1]&nom=$tab[2]&prenom=$tab[3]&datenais=$tab[4]&tel=$tab[5]&email=$tab[6]&statut=$tab[7]' ><button' class='btn btn-outline-info'>Modifier</button></a></td>";

          echo "</tr>";
        }
        echo "</table>";
        fclose($file);
      }

      ?>
    </div>
  </div>
  <!--PARTIE SCRIPTS BOOTSTRAP-->

  <script href="js/bootstrap.js"></script>
  <script href="js/bootstrap.min.js"></script>
</body>

</html>