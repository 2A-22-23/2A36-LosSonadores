<?php

class dossier 
{
private $patient_name ; 
private $phone_number ; 
private $street ; 
private $birth_date ;
private $weight ; 
private $height ; 
private $doctor_name ; 
private $medical_history ;

    // Getter functions
    public function getPatientName() {
      return $this->patient_name;
    }
  
    public function getPhoneNumber() {
      return $this->phone_number;
    }
  
    public function getStreet() {
      return $this->street;
    }
  
    public function getBirthDate() {
      return $this->birth_date;
    }
  
    public function getWeight() {
      return $this->weight;
    }
  
    public function getHeight() {
      return $this->height;
    }
  
    public function getDoctorName() {
      return $this->doctor_name;
    }
  
    public function getMedicalHistory() {
      return $this->medical_history;
    }
  
    // Setter functions
    public function setPatientName($patient_name) {
      $this->patient_name = $patient_name;
    }
  
    public function setPhoneNumber($phone_number) {
      $this->phone_number = $phone_number;
    }
  
    public function setStreet($street) {
      $this->street = $street;
    }
  
    public function setBirthDate($birth_date) {
      $this->birth_date = $birth_date;
    }
  
    public function setWeight($weight) {
      $this->weight = $weight;
    }
  
    public function setHeight($height) {
      $this->height = $height;
    }
  
    public function setDoctorName($doctor_name) {
      $this->doctor_name = $doctor_name;
    }
  
    public function setMedicalHistory($medical_history) {
      $this->medical_history = $medical_history;
    }
  }
?>