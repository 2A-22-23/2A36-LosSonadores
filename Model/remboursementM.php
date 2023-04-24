<?php
class remboursementM
{
    private ?string $id_remb = null;
    private ?string $matricule_remb = null;
    private ?string $pourcentage_remb = null;
    private ?string $age_remb = null;
    private ?string $observation_remb = null;
    private ?string $cota_remb =null;
    private ?string $id_assurance =null;
    private ?string $idhist =null;

    public function __construct( $m,$p,$d,$o,$c)
    {
        $this->matricule_remb =$m;
        $this->pourcentage_remb =$p;
        $this->age_remb =$d;
        $this->observation_remb =$o;
        $this->cota_remb =$c;
       
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
    public function getage()
    {
        return $this->age_remb;
    }

    public function setage($age_remb)
    {
        $this->age_remb = $age_remb;

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