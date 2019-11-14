<?php

abstract class Etudiant{

    protected $matricule;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $phone;
    protected $datenais;
    function __construct($matricule, $nom,$prenom, $email, $phone, $datenais)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->phone = $phone;
        $this->datenais = $datenais;
    }


    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of datenais
     */ 
    public function getDatenais()
    {
        return $this->datenais;
    }

    /**
     * Set the value of datenais
     *
     * @return  self
     */ 
    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;

        return $this;
    }
    public function infosEtudiant()
    {
        return $this->matricule.", ".$this->nom.", ".$this->prenom.", ".$this->email.", ".$this->phone.", ".$this->datenais;
    }
}
 