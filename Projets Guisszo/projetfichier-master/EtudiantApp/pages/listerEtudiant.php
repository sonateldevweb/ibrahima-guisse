<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">    
<title>Lister Etudiants</title>
</head>
<body>
    
    
    <div class="container" style="margin-top:20px">
        <div class="row">
          
                
                <table class="table table-striped table-hover display" id="tab">
                    <thead class="thead-dark">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Statut</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            require "../autoload/Autoloader.php";
                            Autoloader::autoreg();
                           $etd=new EtudiantService();
                           $con=$etd->getPDO();
                            
                             
                            $req=$con->query("SELECT matricule,nom,prenom,email,phone,libelle
                            FROM type_boursier,etudiant,boursier WHERE etudiant.id_etudiant=boursier.id_etudiant AND boursier.id_type=type_boursier.id_type");
                           
                            

                            $donnees = $req->fetchAll(PDO::FETCH_OBJ);
                            foreach($donnees as $donne){
                               
                               echo' <tr>';
                                echo"<td>".$donne->matricule."</td>";
                                echo"<td>".$donne->nom."</td>";
                               echo "<td>".$donne->prenom."</td>";
                              echo " <td>".$donne->email."</td>";
                               echo "<td>".$donne->phone."</td>";
                               echo "<td>".$donne->libelle."</td>";
                               echo "<td><a href='#'><button' class='btn btn-outline-info'>Modifier</button></a></td>";
                               echo "<td><a href='#'><button' class='btn btn-outline-danger'>Supprimer</button></a></td>";


                            echo '</tr>';
                               
                            }
                            ?>
                        </tbody>
                </table>
                
            
        </div>
    </div>
    <script src="../Js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../Js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../Js/jquery.dataTables.min.js"></script>
    <script>
   $(document).ready(function()
    {
        $("#tab").DataTable();
    });
    </script>
</body>
</html>