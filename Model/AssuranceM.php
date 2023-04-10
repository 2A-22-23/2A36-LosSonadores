<?php
class AssuranceM
{
    private ?string $id_assurance = null;
    private ?string $nom_assurance = null;
    private ?int $matricule_assurance = null;
    private ?string $type_assurance = null;
    private ?string $date_assurance =null;
    private ?string $status_assurance =null;

    public function __construct( $n, $i, $t,$d,$s)
    {
     
        $this->nom_assurance = $n;
        $this->matricule_assurance = $i;
        $this->type_assurance = $t;
        $this->date_assurance =$d;
        $this->status_assurance =$s;
    }

    public function getIdAssurance()
    {
        return $this->id_assurance;
    }

    public function getNom()
    {
        return $this->nom_assurance;
    }

    public function setNom($nom_assurance)
    {
        $this->nom_assurance = $nom_assurance;

        return $this;
    }

    public function getMat()
    {
        return $this->matricule_assurance;
    }

    public function setMat($matricule_assurance)
    {
        $this->matricule_assurance = $matricule_assurance;

        return $this;
    }

    public function getTypee()
    {
        return $this->type_assurance;
    }

    public function setTypee($type_assurance)
    {
        $this->type_assurance = $type_assurance;

        return $this;
    }

    public function getdate()
    {
        return $this->date_assurance;
    }

    public function setdate($date_assurance)
    {
        $this->date_assurance = $date_assurance;

        return $this;
    }
    public function getstatus()
    {
        return $this->status_assurance;
    }

    public function setstatus($status_assurance)
    {
        $this->status_assurance = $status_assurance;

        return $this;
    }
}
?>