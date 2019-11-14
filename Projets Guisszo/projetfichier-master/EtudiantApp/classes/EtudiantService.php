<?php
//require "autoload/autoloader.php";
//Autoloader::autoreg();

class EtudiantService
{
    private $Nomserver;
    private $login;
    private $mdp;
    private $dbname;
    private $pdo;


    public function __construct(
        $Nameserver = "localhost",
        $login = "guisszo",
        $mdp = "passer@123",
        $dbname = "Etudiant"
    ) {
        $this->Nomserver = $Nameserver;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->dbname = $dbname;
    }
    public function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=Etudiant;
            host=localhost', 'guisszo', 'passer@123');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    //FONCTION DE RECUPERATION DE L'ID DE L'ETUDIANT
    public function GetMatricule($matricule)
    {

        $id = 0;
        $stat = $this->getPDO()->query("SELECT * FROM etudiant WHERE matricule= $matricule");
        $donnees = $stat->fetchAll(PDO::FETCH_OBJ);
        foreach ($donnees as $donne) {
            $id = $donne->id_etudiant;
        }
        // var_dump($id);
        return $id;
    }

    //insertion d'un Boursier ou non dans la bd
    public function add(Etudiant $etudiant)
    {
        $matricule = $etudiant->getMatricule();
        $prenom = $etudiant->getNom();
        $nom = $etudiant->getNom();
        $email = $etudiant->getEmail();
        $phone = $etudiant->getPhone();
        $datenais = $etudiant->getDatenais();
        $pdo = $this->getPDO();
        
        $pdostat = $pdo->prepare('INSERT 
        INTO etudiant (matricule ,prenom ,nom ,email ,phone , datenais) 
        VALUES(:matricule,:prenom,:nom,:email,:phone,:datenais)');

        $pdostat->bindParam(':matricule', $matricule);
        $pdostat->bindParam(':prenom', $prenom);
        $pdostat->bindParam(':nom', $nom);
        $pdostat->bindParam(':email', $email);
        $pdostat->bindParam(':phone', $phone);
        $pdostat->bindParam(':datenais', $datenais);
        $donnees = $pdostat->execute();
        
        $stat = $this->getPDO()->query("SELECT id_etudiant FROM etudiant WHERE matricule= '$matricule'");
        $donnees = $stat->fetchAll(PDO::FETCH_OBJ);
        foreach ($donnees as $donne) {
            $id_etudiant = $donne->id_etudiant;
        }
        //echo $id_etudiant;
        if (get_class($etudiant) == 'Boursier' || get_class($etudiant) == 'Loger' ) {
            // var_dump($this->etudiant);
            $id_type = $etudiant->getType();
            $pdo = $this->getPDO();
            $pdostat = $pdo->prepare('INSERT INTO boursier (id_etudiant,id_type) 
            VALUES(:id_etudiant,:id_type)');

            $pdostat->bindParam(':id_etudiant', $id_etudiant);
            $pdostat->bindParam(':id_type', $id_type);
            $donnees = $pdostat->execute();
            //var_dump($donnees);
            if(get_class($etudiant) == 'Loger'){
    
                $num_chambre = $etudiant->getNumChambre();
                $pdo = $this->getPDO();
    
                $pdostat = $pdo->prepare('INSERT INTO loger (id_etudiant,id_chambre) 
                VALUES(:id_etudiant,:id_chambre)');
                
                $pdostat->bindParam(':id_etudiant', $id_etudiant);
                $pdostat->bindParam(':id_chambre', $num_chambre);
                //die(var_dump($num_chambre,$id_etudiant));
                
                $donnees = $pdostat->execute();
    
            }
           // return $donnees;
        }elseif (get_class($etudiant) == 'NonBoursier') {
            $adresse = $etudiant->getAdresse();
            $pdo = $this->getPDO();
            $pdostat = $pdo->prepare('INSERT INTO nonBoursier (id_etudiant,adresse) 
            VALUES(:id_etudiant,:adresse)');

            $pdostat->bindParam(':id_etudiant', $id_etudiant);
            $pdostat->bindParam(':adresse', $adresse);
            $donnees = $pdostat->execute();
            //return $donnees;
        }
        return $donnees;
    }
  
    //RENVOIE UNE SEULE LIGNE
    public function find($table, $colonne, $valeur)
    {
        $pdo = $this->getPDO()->query("SELECT * FROM $table WHERE $table.$colonne=$valeur");
        $donnees = $pdo->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
    }

    // RENVOI TOUS LES ELEMENTS D'UNE TABLE

    public function findAll($table)
    {
        $pdo = $this->getPDO()->query("SELECT * FROM $table ");
        $donnees = $pdo->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
        // var_dump($donnees);

    }

   public function supprimerEtu($id)
   {
       $pdo=$this->getPDO()->prepare("DELETE FROM etudiant WHERE id_etudiant=$id");
     $pdo->execute(array($id));
     return;
   }

   
}
