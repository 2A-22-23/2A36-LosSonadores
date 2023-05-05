<?php
class Rendezvous {
 
    private $idclient;
 
    private    $LaDate;
    private $idr;
    private $status;
    private $iddoc;
    private $idp;
    private $note;
    private $title;
    private $end;


    public function getIdp() {
        return $this->idp;
    }

    public function setIdp($idp) {
        $this->idp = $idp;
    }

    
    public function __construct( $LaDate) {
       
        $this->LaDate = $LaDate;
    }

    
    
    public function getNomPatient() {
        return $this->NomPatient;
    }



    public function getIdr() {
        return $this->idr;
    }
    
    
    public function getidclient() {
        return $this->idclient;
    }
    

    public function getLaDate() {
      
        return $this->LaDate;
    }
    
    

    public function setNomPatient($NomPatient) {
        $this->NomPatient = $NomPatient;
    }
    

    public function setLaDate($LaDate) {
        $this->LaDate = $LaDate;
    }



    
}
?>
