<?php

class Batiment{
    private $nomBatiment;


    /**
     * Get the value of nomBatiment
     */ 
    public function getNomBatiment()
    {
        return $this->nomBatiment;
    }

    /**
     * Set the value of nomBatiment
     *
     * @return  self
     */ 
    public function setNomBatiment($nomBatiment)
    {
        $this->nomBatiment = $nomBatiment;

        return $this;
    }
}