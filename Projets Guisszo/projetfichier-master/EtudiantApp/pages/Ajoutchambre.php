<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../Js/jquery-3.4.1.min.js"></script>
    <script src="../Js/script.js"></script>


    <title>Page d'ajout chambre</title>
</head>

<body>
    <?php
    require "../autoload/Autoloader.php";
    Autoloader::autoreg();
    include "navbar.php";


    //die(var_dump($id));

    ?>
    <section class="sec">
        <div class="container">
            <div class="formulaire">
                <h1>ajout chambre</h1>
                <p>choisir bâtiment!</p>
                <form action="traitementBati.php" method="POST">

                    <!-- <input type="text" name="chambre" placeholder="Num chambre"> -->

                    <select name="bati" id="bati">
                        <option value=""></option>
                            <?php
                            $servi = new EtudiantService();
                            $sc = $servi->findAll('batiment');

                            foreach ($sc as $done) {

                                $nomBati = $done->nom_bati;
                                echo "<option value='" . $done->id_bati . "'>" . $done->nom_bati . " </option>";
                            }
                            ?>
                    </select>
                    <input type="submit" name="ajouter" value="ajouter">
                </form>
            </div>

        </div>
    </section>
</body>
<html>