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
        <title>page admin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body id="bdaccueil">
        <div class="jumbotron text-center">
                <?php
                echo "<h2>bonjour $nom<h2>";
                echo "<h4>vous etes connecté en tant que <strong>" . $statut . "</strong></h4>";
                ?>

        </div>
        <div class="liens">
                <ul>
                        <li><a href="<?= 'listuser.php' ?>">Lister users</a></li>
                        <li><a href="<?= 'makeuser.php' ?>">Ajouter Utilisateur</a></li>
                        <li><a href="<?= 'deconnexion.php' ?>">Deconexion</a></li>
                </ul>
        </div>

        <!--PARTIE SCRIPTS BOOTSTRAP-->
        <script href="js/bootstrap.js"></script>
        <script href="js/bootstrap.min.js"></script>
</body>

</html>