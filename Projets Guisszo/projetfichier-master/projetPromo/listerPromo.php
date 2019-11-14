<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Lister Promo</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="creerApprenant.php">Créer Apprenant</a>
                    </li>
                    <li class="nav-item">
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
    <div class="container">
        <div class="container">

            <form action="listerPromo.php" method="POST">

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
                <button type="submit" name="lister" class="btn btn-outline-primary">Lister Promos</button>
            </form> <br>
            <?php
            echo "<table class='table table-dark table-striped'>
       <tr>
             <th>Code Promo</th>
             <th>Nom Promo</th>
             <th>Mois</th>
             <th>Année</th>
             <th>Nombre d'apprenants</th>            
             
             
       </tr>
       
";


            //if (isset($_POST['lister'])) {

                $file = fopen("Promo.txt", "r");
                while (!feof($file)) {
                    $ligne = fgets($file);
                    $tab = explode(";", $ligne);
                    $NomPromo = $tab[1];
                    $file1 = fopen("Apprenant.txt", "r");
                    $nbrApp = 0;
                    while (!feof($file1)) {
                        $line = fgets($file1);
                        $el = explode(";", $line);
                        if ($NomPromo == $el[1] && $el[7] != "exclu") {
                            $nbrApp++;
                        }
                    
                    }
                    if (!isset($_POST["lister"])|| isset($_POST["lister"]) && $_POST['promo'] == $tab[1]) {
                        echo "<tr>";
                        echo "<td>" . $tab[0] . "</td>";
                        echo "<td>" . $tab[1] . "</td>";
                        echo "<td>" . $tab[2] . "</td>";
                        echo "<td>" . $tab[3] . "</td>";
                        echo "<td>" . $nbrApp . "</td>";

                        echo "<td><a href='listerApprenant.php?promo=$tab[1]'><button' class='btn btn-outline-info'>Lister</button></a></td>";

                        echo "</tr>";
                    }
                }


                fclose($file1);
                fclose($file);
            //}
            echo "</table>";
            ?>

        </div>
    </div>
    <!--PARTIE SCRIPTS BOOTSTRAP-->

    <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script>
</body>

</html>