
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style1.css">
    <script src="../Js/jquery-3.4.1.min.js"></script>
    <script src="../Js/script.js"></script>


    <title>Rechercher</title>
</head>

<body>
    <?php
    require "../autoload/Autoloader.php";
    Autoloader::autoreg();
    include "navbar.php";
    ?>
    <section>
    <div class="formulaire1">
            
               <form action="" method="POST">
              
                <input type="text" name="valeur" value="<?php if(isset($_POST['valeur'])) echo $_POST['valeur'] ?>" placeholder="Valeur de recherche">
                <input type="submit"name="Rechercher" value="Rechercher">
               </form> 
        </div>
        <div class="clearfix"></div>
    
          
           <div class="row">
          
                
          <table class="table table-striped" id="tab" >
              <thead class="thead-dark">
                  <tr>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                  </tr>
              </thead>
                  <tbody>
                      <?php
                    
                     $etd=new EtudiantService();
                     $con=$etd->getPDO();
                      
                       
                      $req=$etd->findAll('etudiant');
                      

                      
                      foreach($req as $donne){
                         
                         echo' <tr>';
                          echo"<td>".$donne->matricule."</td>";
                          echo"<td>".$donne->nom."</td>";
                         echo "<td>".$donne->prenom."</td>";
                        echo " <td>".$donne->email."</td>";
                         echo "<td>".$donne->phone."</td>";
                         echo "<td><a href='#'><button' class='btn btn-outline-info'>Modifier</button></a></td>";
                         echo "<td><a href='#'><button' class='btn btn-outline-danger'>Supprimer</button></a></td>";


                      echo '</tr>';
                         
                      }
                      ?>
                  </tbody>
          </table>
          
      
  </div>
    </section>
       
    
</body>
<html>