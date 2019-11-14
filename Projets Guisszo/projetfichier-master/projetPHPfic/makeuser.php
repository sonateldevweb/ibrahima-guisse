<?php
session_start();
if(!isset($_SESSION['nom']))
{
    header('Location: index.php');
    exit();
}
$_SESSION["ouvert"]=true;
       $nom=$_SESSION['nom'];
       $statut=$_SESSION['statut'];
?>
  
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
<title>Page admin-mkuser</title>
<meta charset="utf-8">
</head>
<body>
<header>
            <!--DEBUT BARRE DE NAVIGATION-->

            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <div class="container">
                        <a class="navbar-brand" href="#">LOGO</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="<?='admin.php?nom='.$nom.'&statut='.$statut?>">Page Admin <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link" href="<?='listuser.php?nom='.$nom.'&statut='.$statut?>">Lister utilisateurs</a>
                                  </li>  
                                  <li class="nav-item">
                                        <a class="nav-link" href="index.php">Deconnexion</a>
                                  </li>
                                  <li><a href="<?='deconnexion.php'?>">Deconexion</a></li>                                 
                            
                          </ul>
                          
                        </div>
                    </div>
                      </nav>
                       <!--FIN DE LA BARRE DE NAVIGATION-->

                       
        </header><br>
        <div class="container">
                <div class="container">
                <form class="form-staked" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="nom" class="mr-sm-2"><strong>Nom</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="nom" name="nom" placeholder="Nom">
                <label for="login" class="mr-sm-2" ><strong>Login</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="login" name="login" placeholder="login">
                <label for="mdp" class="mr-sm-2"><strong>Mot de passe</strong></label>
                <input type="password" class="form-control mb-2 mr-sm-2" id="mdp" name="mdp" placeholder="Mot de passe">
                <label for="tel" class="mr-sm-2"><strong>Telephone</strong></label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="tel" min=0 name="tel" placeholder="telephone">
                <label for="email" class="mr-sm-2"><strong>Email</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="email" name="email" placeholder="Email">
                <label for="statut" class="mr-sm-2"><strong>Statut</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="statut" name="statut" placeholder="Statut">
                <label for="etat" class="mr-sm-2"><strong>etat</strong></label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="statut" name="etat" placeholder="Etat">
                <button type="submit" name="ajouter" class="btn btn-outline-primary">Ajouter</button>
        </form>
                </div>
     
        </div><br>
        <?php



                        $boolverifajout=false;
                          
                        if(isset($_POST['ajouter'])){
                            if(!empty($_POST["nom"])){

                              $nom = $_POST['nom'];
                                }                       if(!empty($_POST["login"])){
                              $login = htmlspecialchars($_POST['login']);
                              
                          }
                          if(!empty($_POST['mdp'])){
                              $mdp =htmlspecialchars($_POST['mdp']);
                              
                          }
                          if(!empty($_POST['tel'])){
                            $tel =htmlspecialchars($_POST['tel']);
                            
                        }
                        if(!empty($_POST['email'])){
                            $email =htmlspecialchars($_POST['email']);
                            
                        }
                        if(!empty($_POST['statut'])){
                            $statut =htmlspecialchars($_POST['statut']);
                            
                        }
                        if(!empty($_POST['etat'])){
                          $etat =htmlspecialchars($_POST['etat']);
                          
                      }

  echo '<div class= "container">';
        if(isset($nom) && isset($login) && isset($mdp) && isset($tel) && isset($email) && isset($statut) && isset($etat) )
        {  
          $file="user2.txt";
          $id_file=fopen($file,"a+");
          flock($id_file,2);

          while(!feof($id_file))
          {
              $tab=fgets($id_file);
              
              $tab=explode(";",$tab);
              
              
              if($tab[0]==$nom)
              {              
                
                $boolverifajout=true;                
              }
                            
                  
                     
          }
         
              
          
          //var_dump($boolverifajout);
          if($boolverifajout==true){
            echo "<font color=red>Ce nom Existe Déjà</font>";
          }else
          { 
            $chaine="\n".$nom.";".$login.";".$mdp.";".$tel.";".$email.";".$statut.";".$etat.";";
            fwrite($id_file,$chaine);
            echo "<font color=green>Utilisateur AJOUTÉ AVEC SUCCES</font>";
            
          }
          flock($id_file,3);
          fclose($id_file);
        } else
        {
          echo "<font color=red> VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
        } echo '</div>';

}



  
  ?>

   <!--PARTIE SCRIPTS BOOTSTRAP-->

 <script href="js/bootstrap.js"></script>
    <script href="js/bootstrap.min.js"></script> 
</body>
<?php
include('footer.php');
?>
</html>