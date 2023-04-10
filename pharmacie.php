<?php
class pharmacie 
{
    private ?int $idphar = null;
    private ?int $idordo = null;
    private ?string $Name = null;
    private ?string $ville = null;
    private ?string $address = null;


    public function __construct($idphar = NULL, $idordo = NULL , $Name, $ville, $address)
    {
        $this->idphar  = $idphar;
        $this->idordo = $idordo;
        $this->Name  = $Name;
        $this->ville = $ville;
        $this->address = $address;
    }
    /**
     * Get the value of idphar
     */
    public function getIdPhar()
    {
        return $this->idphar;
    }
      /**
     * Set the value of idphar
     
     */
    public function setidphar($idphar)
    {
        $this->idphar = $idphar;

        return $this;
    }
  
      /**
     * Get the value of idordo
     */
    public function getIdOrdo()
    {
        return $this->idordo;
    }
    /**
     * Set the value of idordo
     
     */
    public function setidordo($idordo)
    {
        $this->idordo = $idordo;

        return $this;
    }
  
    /**
     * Get the value of Name
     */
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
    
