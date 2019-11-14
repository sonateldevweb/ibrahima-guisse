<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">

<title>page de connexion</title>
<meta charset="utf-8">
</head>
<body id="indexb">

    <?php
    $user=array(
        array("Nom"=>"guisse","login"=>"guisszo","mdp"=>"pass"),
        array("Nom"=>"dieye","login"=>"abdou","mdp"=>"root"),
        array("Nom"=>"jina","login"=>"zeyna","mdp"=>"passer")

    );
    
    ?>
    <div class="conteneur">
    <h2>page de connexion</h2>
    <form  class="form-stacked" method="POST">
    <input type="text" id="entre"class="form-control mb-2 mr-sm-2" name="login"><br>
    <input type="text"id="entre" class="form-control mb-2 mr-sm-2" name="mdp"><br>
    <input type="submit" name="connexion" class="btn btn-outline-light" value="connexion">
    </form>
    </div>
   
    <?php


        if( isset($_POST['login']) && isset($_POST['mdp'])){
            $nbrUser=count($user);
            $verifLogin="false";
            $verifmdp="false";
            $nom="";
            
            for($i=0;$i<$nbrUser;$i++){ //ICI ON PARCOURT LE TABLEAU GRACE A NBREUSER QUI NOUS RÉCUPÈRE LA TAILLE DU TABLEAU
                $ligne=$user[$i];   //$LIGNE PREND UNE LIGNE DÉFINI DU TABLEAU

                     foreach ($ligne as $key => $val) {

                        if($key=='Nom') // ON VERIFIE LA POSITION DE LA CLE NOM
                        {
                         $nom=$val;
                       }
                             if($key=='login')  // IDEM POUR LE LOGIN
                             {
                                 if($_POST['login']==$val)  //ON VERIFIE SI CE QUI EST SAISI CORRESPOND À CE QUI EST DANS NOTRE TABLEAU
                                 {
                                    $verifLogin='true'; 

                                 }
                            }
                             if($key=='mdp' && $verifLogin=='true')
                             {
                                if($_POST['mdp']==$val)
                                {
                                   $verifmdp='true';
                                   header('Location: accueil.php?nom='.$nom);

                                }
                            }
                     }
            }
            if($verifLogin=='true'){ //ON TEST POUR VOIR SI LE MDP EST LE BON OU PAS.
                echo " <font color=red>MOT DE PASSS INCORRECT</font>";
            }else{
                echo "  <font color=red>CE COMPTE N'EXISTE PAS</font>"; //SI MDP VRAI ALORS LOGIN VRAI
            }
        }
    ?>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
</html>