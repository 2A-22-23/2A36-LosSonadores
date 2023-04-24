<?php
class historique
{
    private ?int $idhis = null;
     private ?int $patient_name= null;
     private ?int$doctor_name= null;

     private ?int $prix = null;
     private $date= null;


    public function __construct($idhis,$patient_name,$doctor_name,$prix,$date)
    {
        $this->idhis = $idhis;
        $this->patient_name = $patient_name;
        $this->doctor_name =$doctor_name;
        $this->prix = $prix;
        $this->date = $date;
     
    }

 

    /**
     * Get the value of patient_name
     */
    

    

   
    public function getidhis()
    {
        return $this->idhis;
    }

    
    public function setidhis($idhis)
    {
        $this->idhis = $idhis;

        return $this;
    }
   
    public function getpatient_name()
    {
        return $this->patient_name;
    }

      /**
     * Set the value of patient_name
     
     */
    public function setpatient_name($patient_name)
    {
        $this->patient_name = $patient_name;

        return $this;
    }
    public function getdoctor_name()
    {
        return $this->doctor_name;
    }

      /**
     * Set the value of doctor_name
     
     */
    public function setdoctor_name($doctor_name)
    {
        $this->doctor_name = $doctor_name;

        return $this;
    }

    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    public function getdate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }
}


  



   
