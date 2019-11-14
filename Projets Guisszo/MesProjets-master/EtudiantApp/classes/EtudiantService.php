<?php

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
        
        if (get_class($etudiant) == 'Boursier' || get_class($etudiant) == 'Loger' ) {
            
            $id_type = $etudiant->getType();
            $pdo = $this->getPDO();
            $pdostat = $pdo->prepare('INSERT INTO boursier (id_etudiant,id_type) 
            VALUES(:id_etudiant,:id_type)');

            $pdostat->bindParam(':id_etudiant', $id_etudiant);
            $pdostat->bindParam(':id_type', $id_type);
            $donnees = $pdostat->execute();
           
            if(get_class($etudiant) == 'Loger'){
    
                $num_chambre = $etudiant->getNumChambre();
                $pdo = $this->getPDO();
    
                $pdostat = $pdo->prepare('INSERT INTO loger (id_etudiant,id_chambre) 
                VALUES(:id_etudiant,:id_chambre)');
                
                $pdostat->bindParam(':id_etudiant', $id_etudiant);
                $pdostat->bindParam(':id_chambre', $num_chambre);
                
                $donnees = $pdostat->execute();
    
            }
           
        }elseif (get_class($etudiant) == 'NonBoursier') {
            $adresse = $etudiant->getAdresse();
            $pdo = $this->getPDO();
            $pdostat = $pdo->prepare('INSERT INTO nonBoursier (id_etudiant,adresse) 
            VALUES(:id_etudiant,:adresse)');

            $pdostat->bindParam(':id_etudiant', $id_etudiant);
            $pdostat->bindParam(':adresse', $adresse);
            $donnees = $pdostat->execute();
            
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
       

    }
    public function findAllNonBoursier($table)
    {
        $pdo = $this->getPDO()->query("SELECT matricule,nom,prenom,email,phone,adresse
        FROM $table,etudiant WHERE etudiant.id_etudiant=$table.id_etudiant");
       $donnees = $pdo->fetchAll(PDO::FETCH_OBJ);
       return $donnees;
    }
    public function findAllBoursier()
    {
        $pdo = $this->getPDO()->query("SELECT etudiant.id_etudiant AS id,matricule,nom,prenom,email,phone,libelle 
        FROM etudiant 
        INNER JOIN boursier 
        ON etudiant.id_etudiant=boursier.id_etudiant 
        INNER JOIN type_boursier 
        ON boursier.id_type=type_boursier.id_type
        ");
        return $pdo->fetchAll(PDO::FETCH_OBJ);
        
    }
    
    
   public function supprimerEtu($id)
   {
       $pdo=$this->getPDO()->prepare("DELETE FROM etudiant WHERE id_etudiant=$id");
       return $pdo->execute(array($id));
     
   }

   
}
