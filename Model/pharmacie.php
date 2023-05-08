<?php
class pharmacie 
{
    private ?int $idphar = null;
  
    private ?string $Name = null;
    private ?string $ville = null;
    private ?string $address = null;


    public function __construct($idphar, $Name, $ville, $address)
    {
        $this->idphar  = $idphar;
        $this->Name  = $Name;
        $this->ville = $ville;
        $this->address = $address;
    }
    public function setIdphar($idphar)
    {
        $this->idphar = $idphar;

        return $this;
    }
    public function getIdPhar()
    {
        return $this->idphar;
    }
 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }
 /**
     * Get the value of  ville
     */
    public function getville()
    {
        return $this->ville;
    }
    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setville($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
    */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}
    
