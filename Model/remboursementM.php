<?php
class remboursementM
{
    private ?string $id_remb = null;
    private ?string $matricule_remb = null;
    private ?string $pourcentage_remb = null;
    private ?string $plafond_remb = null;
    private ?string $observation_remb = null;
    private ?string $cota_remb =null;
    private ?string $date_remb = null;
    private ?string $id_assurance =null;
    private ?string $idhist =null;
    private ?int $code =null;

    public function __construct( $m,$p,$o,$dat)
    {
        $this->matricule_remb =$m;
        $this->pourcentage_remb =$p;
        $this->observation_remb =$o;
        $this->date_remb =$dat;
       
    }

    public function getmatremb()
    {
        return $this->matricule_remb;
    }

    public function setmatRemb($matricule_remb)
    {
        $this->matricule_remb = $matricule_remb;

        return $this;
    }
    public function getidremb()
    {
        return $this->id_remb;
    }

    public function setidRemb($id_remb)
    {
        $this->id_remb = $id_remb;

        return $this;
    }


    public function getpourcent()
    {
        return $this->pourcentage_remb;
    }

    public function setpourcent($pourcentage_remb)
    {
        $this->pourcentage_remb = $pourcentage_remb;

        return $this;
    }
    
    public function getplafond()
    {
        return $this->plafond_remb;
    }

    public function setplafond($plafond_remb)
    {
        $this->plafond_remb = $plafond_remb;

        return $this;
    }
    

    public function getobservation()
    {
        return $this->observation_remb;
    }

    public function setobservation($observation_remb)
    {
        $this->observation_remb = $observation_remb;

        return $this;
    }
    
    public function getcota()
    {
        return $this->cota_remb;
    }

    public function setcota($cota_remb)
    {
        $this->cota_remb = $cota_remb;

        return $this;
    }
    public function getdate()
    {
        return $this->date_remb;
    }
    public function setdate($date_remb)
    {
        $this->date_remb = $date_remb;

        return $this;
    }
    
    public function getIdAssurance()
    {
        return $this->id_assurance;
    }
    public function setid($id_assurance)
    {
        $this->id_assurance = $id_assurance;

        return $this;
    }

    public function getidhist()
    {
        return $this->idhis;
    }
    public function setidhist($idhis)
    {
        $this->idhis = $idhis;

        return $this;
    }
  

}
?>