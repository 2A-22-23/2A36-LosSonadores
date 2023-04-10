<?php

class client
{
private $id;
private $nom;
private $prenom;
private $type;
private $telephone;
private $adresse;
private $email;
private $login;
private $mdp;

private $image;
function __construct($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp,$image)
{

    $this->nom=$nom;
    $this->prenom=$prenom;
	$this->type=$type;
    $this->telephone=$telephone;
    $this->adresse=$adresse;
    $this->email=$email;
    $this->login=$login;
    $this->mdp=$mdp;
	$this->image=$image;
}


public function getMdp() {
    return $this->mdp;
}


public function setMdp($mdp): self {
    $this->mdp = $mdp;
    return $this;
}
	public function getNom() {
		return $this->nom;
	}
	
	
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}

	public function getPrenom() {
		return $this->prenom;
	}
	
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTelephone() {
		return $this->telephone;
	}
	
	/**
	 * @param mixed $telephone 
	 * @return self
	 */
	public function setTelephone($telephone): self {
		$this->telephone = $telephone;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAdresse() {
		return $this->adresse;
	}
	
	/**
	 * @param mixed $adresse 
	 * @return self
	 */
	public function setAdresse($adresse): self {
		$this->adresse = $adresse;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLogin() {
		return $this->login;
	}
	
	/**
	 * @param mixed $login 
	 * @return self
	 */
	public function setLogin($login): self {
		$this->login = $login;
		return $this;
	}

	/**
	 * @return mixed
	 */











	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}
	
	/**
	 * @param mixed $type 
	 * @return self
	 */
	public function setType($type): self {
		$this->type = $type;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * @param mixed $image 
	 * @return self
	 */
	public function setImage($image): self {
		$this->image = $image;
		return $this;
	}
}







?>