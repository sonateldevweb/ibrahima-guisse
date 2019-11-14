<!DOCTYPE html>
<html>
            <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    
                    <link rel="stylesheet" href="css/bootstrap.min.css">
                    <title>accueil</title>
                    <meta charset="utf-8">
                    <link rel="stylesheet" type="text/css" href="style.css">

            </head>


    <body id="bdaccueil">
                <div class="jumbotron text-center">
                <h2>acceuil</h2>
                <?php
                if(isset($_GET['nom'])){
                $nom=$_GET['nom'];
                }
                echo "bonjour <strong>".$nom."</strong>";
                ?> 
                </div>
                        <div class="liens">
                        <ul>
                        <li><a href="<?='listerpdt.php?nom='.$nom?>">Lister Produit</a></li>
                        <li><a href="<?='ajouterpdt.php?nom='.$nom?>">Ajouter Produit</a></li>
                        <li><a href="<?='rechercherpdt.php?nom='.$nom?>">rechercher Produit</a></li>
                        <li><a href="<?='modifierpdt.php?nom='.$nom?>">Modifier Produit</a></li>
                        <li><a href="<?='supprimerpdt.php?nom='.$nom?>">Supprimer Produit</a></li>
                        </ul>
                        </div>

    <!--PARTIE SCRIPTS BOOTSTRAP-->
 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
    </body>
</html>