
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style4.css">

<title>page de connexion</title>
<meta charset="utf-8">
</head>
<body id="indexb">

   
    <div class="conteneur">
    <h2>page de connexion</h2>
    <form  class="form-stacked" method="POST">
    <input type="text" id="entre"class="form-control mb-2 mr-sm-2" name="login"><br>
    <input type="password"id="entre" class="form-control mb-2 mr-sm-2" name="mdp"><br>
    <input type="submit" name="connexion" class="btn btn-outline-light" value="connexion">
    </form>
    </div>
   
    <?php
$verifLogin=false;
$verifstatut=false;
$verifetat=false;

        if( isset($_POST['login']) && isset($_POST['mdp'])){
           
           
            $login=htmlspecialchars($_POST['login']) ;
            $mdp=htmlspecialchars($_POST['mdp']) ;
           
            $etat="";
            
            $file="user2.txt";
            $id_file=fopen($file,"r");

           
            
            while($ligne=fgets($id_file))
            {
               
                
                $tab=explode(";",$ligne);
                
                $nom=$tab[0];
                
                $statut=$tab[5];
                
                
               
                if($tab[1]==$login && $tab[2]==$mdp)
                {   $verifLogin=true;
                    $_SESSION['nom']=$nom;
                    $_SESSION['statut']=$statut;
                    
                    if($tab[6]=='actif')
                    {
                        if($tab[5]=='admin'){
                            header('Location: admin.php');
                        }
                        else{
                            header('Location: accueil.php');
                        }
                    }
                    else{
                        echo "<h2 class='erreur'>ERREURE:compte bloqué</h2>";
                    }
                }
            }
            if($verifLogin==false)
            {
                echo "<h2 class='erreur'>ERREURE: MOT DE PASSE INCORRECT OU LOGIN INCORRECT</h2>";
            }elseif($verifLogin==false && $login!=$tabb[2] ){
                echo "<h2 class='erreur'>ERREURE: compte inexistant</h2>";
            }
            
            fclose($id_file);
            }
            
    ?>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>