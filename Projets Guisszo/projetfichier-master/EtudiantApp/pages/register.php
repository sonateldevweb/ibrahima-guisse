
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../Js/jquery-3.4.1.min.js"></script>
    <script src="../Js/script.js"></script>


    <title>Page d'ajout Etudiant</title>
</head>
<body>
    <?php
     require "../autoload/Autoloader.php";
     Autoloader::autoreg();
     include "navbar.php";
    
    ?>
    <section>
        <div class="container">
            <div class="formulaire">
                <h1>enregister etudiant</h1>
                <form action="traitement.php" method="POST">
                    <input type="text" name="matricule" placeholder="matricule" id="matricule">
                    <span class='erreure-msg'>erreure</span>
                    <input type="text" name="nom" placeholder="nom" id="nom">
                    <span class='erreure-msg'>erreure</span>
                    <input type="text" name="prenom" placeholder="prenom" id="prenom">
                    <span class='erreure-msg'>erreure</span>

                    <input type="mail" name="email" placeholder="email" id="email">
                    <span class='erreure-msg'>erreure</span>

                    <input type="number" name="phone" placeholder="phone" id="phone">
                    <span class='erreure-msg'>erreure</span>

                    <input type="date" name="datenais" placeholder="datenais" id="datenais">
                    <span class='erreure-msg'>erreure</span>
      
                                <p>Est-il(elle) Boursier(e)?</p>
                    <label >
                        <input id="oui" type="radio" name="statut" value="boursier">
                        <span  class="oui">OUI</span>    
                    </label> 
                    <label >
                        <input id="non" type="radio" name="statut" value="nonBoursier">                      
                        <span class="non">NON</span>
                </label>
                <input type="text" id="adresse" name="adresse" placeholder="adresse">
                <span class='erreure-msg'>erreure</span>

                <select name="typeBourse" id="typeBourse">
                    <option value=""></option>
                    <?php
                        $service = new EtudiantService();
                        $donnees  = $service->findAll('type_boursier');
                        foreach($donnees as $donne){
                            echo "<option value='".$donne->id_type."'>".$donne->libelle."</option>";
                        }
                        $idtype= $donne->id_type;
                    ?>
                    
                </select>
              
                <span class="loger">Logé (oui/non)</span>
                <input type="checkbox" name="loger" id="loger">
                <span class='erreure-msg'>erreure</span>

                <select name="chambre" id="chambre">
                    <option value=""></option>
                    <?php
                        $servi = new EtudiantService();
                        $donne  = $servi->findAll('chambre');
                        $sc=$servi->findAll('batiment');
                        foreach($donne as $don){
                            $idchambre=$don->id_chambre;
                            foreach ($sc as $done) {

                                $nomBati=$done->nom_bati;
                                echo "<option value='".$don->id_chambre."'>".$don->id_chambre." "."($done->nom_bati)"."</option>";
     
                             }
                        }
                        
                    ?>
                </select>
                <input type="submit" name="ajouter" value="ajouter" id="ajouter">
                </form>
            </div>

        </div>
    </section>   
</body>
<html>