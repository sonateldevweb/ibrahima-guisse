<?php
 class Loger extends Boursier{
    private $numChambre;
    public function __construct($matricule,$nom,$prenom,$email,$phone,$datenais,$type,$numChambre)
    {
        parent::__construct($matricule,$nom,$prenom,$email,$phone,$datenais,$type);
        $this->numChambre = $numChambre;
    }


    /**
     * Get the value of numChambre
     */ 
    public function getNumChambre()
    {
        return $this->numChambre;
    }

 }