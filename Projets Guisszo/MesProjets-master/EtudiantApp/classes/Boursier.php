 <?php

 class Boursier extends Etudiant{
    
   private $type;
   
   public function __construct($matricule, $nom,$prenom, $email, $phone, $datenais,$type)
 {
     parent::__construct($matricule, $nom,$prenom, $email, $phone, $datenais);
    
     $this->type = $type;
     
     
 }
   /**
    * Get the value of type
    */ 
   public function getType()
   {
      return $this->type;
   }

   /**
    * Set the value of type
    *
    * @return  self
    */ 
   public function setType($type)
   {
      $this->type = $type;

      return $this;
   }
 }