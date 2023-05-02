<?php

class ordonnance {
    
    private $patient_name;
    private $nombre_fois;
    private $date;
    private $nom_medicament;
    
    public function getPatientName() {
        return $this->patient_name;
    }
    
    public function setPatientName($name) {
        $this->patient_name = $name;
    }
    
    public function getNombreFois() {
        return $this->nombre_fois;
    }
    
    public function setNombreFois($fois) {
        $this->nombre_fois = $fois;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function getNomMedicament() {
        return $this->nom_medicament;
    }
    
    public function setNomMedicament($nom) {
        $this->nom_medicament = $nom;
    }
}

?>