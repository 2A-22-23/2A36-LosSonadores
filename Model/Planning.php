<?php
class Planningdr {
    private $jour;
    private $timeFrom;
    private $timeTo;
    private $idClient;
    private $id;
    
    public function __construct($idClient,$jour, $timeFrom, $timeTo) {
   
        $this->idClient = $idClient;
      
        $this->jour = $jour;
        $this->timeFrom = $timeFrom;
        $this->timeTo = $timeTo;
    }


    public function getidClient() {
        return $this->idClient;
    }

    public function getid() {
        return $this->id;
    }

    public function getJour() {
        return $this->jour;
    }

    public function setJour($jour) {
        $this->jour = $jour;
    }

    public function getTimeFrom() {
        return $this->timeFrom;
    }

    public function setTimeFrom($timeFrom) {
        $this->timeFrom = $timeFrom;
    }

    public function getTimeTo() {
        return $this->timeTo;
    }

    public function setTimeTo($timeTo) {
        $this->timeTo = $timeTo;
    }
}
