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
                        <a class="nav-link" href="modifierPromo.php">modification Promo <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajoutP.php">Ajout Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listerApprenant.php">lister Apprenant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modifierApprenant.php">Modifier Apprenant</a>

                    </li>

                </ul>

            </div>
        </div>
    </nav><br>


    <div class="container">
        <div class="container">
            <form class="form-staked" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="CodeApp" class="mr-sm-2"><strong>Code Apprenant</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="CodeApp" name="CodeApp" placeholder="CodeApp">
                <label for="NomApp" class="mr-sm-2"><strong>Nom Apprenant</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="NomApp" name="NomApp" placeholder="NomApp">
                <label for="PrenomApp" class="mr-sm-2"><strong>Prenom Apprenant</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="PrenomApp" name="PrenomApp" placeholder="PrenomApp">
                <label for="Datenais" class="mr-sm-2"><strong>Date Naissance </strong></label>
                <input type="date" class="form-control mb-2 mr-sm-2" id="Datenais" name="Datenais" placeholder="Datenais">
                <label for="Numtel" class="mr-sm-2"><strong>Numtel </strong></label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="Numtel" name="Numtel" placeholder="Numtel">
                <label for="email" class="mr-sm-2"><strong>Email</strong></label>
                <input type="email" class="form-control mb-2 mr-sm-2" id="email" name="email" placeholder="email">
                <label for="statut" class="mr-sm-2"><strong>statut</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="statut" name="statut" placeholder="Accepté/exclu">
                <label for="Promo" class="mr-sm-2"><strong>Choisir la Promo</strong></label>

                <?php
                echo ' <select name="promo" id="promo">';
                echo '<option value=""></option>';
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

                <button type="submit" name="ajouter" class="btn btn-outline-primary">Ajouter Apprenant</button>
            </form>
        </div>

    </div><br>
    <?php
    $boolverifajout = false;

    if (isset($_POST['ajouter'])) {
        $NomPromo = $_POST['promo'];
        if (!empty($_POST["CodeApp"])) {

            $CodeApp = $_POST['CodeApp'];
        }
        if (!empty($_POST["NomApp"])) {
            $NomApp = htmlspecialchars($_POST['NomApp']);
        }
        if (!empty($_POST["PrenomApp"])) {
            $PrenomApp = htmlspecialchars($_POST['PrenomApp']);
        }
        if (!empty($_POST['Datenais'])) {
            $Datenais = htmlspecialchars($_POST['Datenais']);
        }
        if (!empty($_POST['Numtel'])) {
            $Numtel = htmlspecialchars($_POST['Numtel']);
        }
        if (!empty($_POST["email"])) {
            $email = htmlspecialchars($_POST['email']);
        }
        if (!empty($_POST["statut"])) {
            $statut = htmlspecialchars($_POST['statut']);
        }

        echo '<div class= "container">';
        if (isset($CodeApp) && isset($NomApp) && isset($PrenomApp) && isset($Datenais) && isset($Numtel) && isset($email) && isset($statut) && isset($NomPromo)) {
            $ficApp = "Apprenant.txt";
            $id_file = fopen($ficApp, "a+");
            flock($id_file, 2);

            while (!feof($id_file)) {
                $tab = fgets($id_file);

                $tab = explode(";", $tab);


                if ($tab[0] == $CodeApp) {

                    $boolverifajout = true;
                }
            }



            //var_dump($boolverifajout);
            if ($boolverifajout == true) {
                echo "<font color=red>Cet Apprenant Existe Déjà</font>";
            } else {
                $chaine =  $CodeApp . ";" . $NomPromo . ";" . $NomApp . ";" . $PrenomApp . ";" . $Datenais . ";" . $Numtel . ";" . $email . ";" . $statut.";" ."\n";

                fwrite($id_file, $chaine);
                echo "<font color=green>NOUVEL APPRENANT AJOUTÉ AVEC SUCCES</font>";
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

    <body>
        <html>