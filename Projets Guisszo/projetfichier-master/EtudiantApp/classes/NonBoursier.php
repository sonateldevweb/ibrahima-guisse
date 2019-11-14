<?php
class NonBoursier extends Etudiant
{
    private $adresse;
    public function __construct($matricule, $nom, $prenom, $email, $phone, $datenais, $adresse)
    {
        parent::__construct($matricule, $nom, $prenom, $email, $phone, $datenais);

        $this->adresse = $adresse;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
}
