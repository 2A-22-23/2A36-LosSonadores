<?PHP
	class Categorie{
		private $id;
		private $nom;
		private $pointfidel;
		private $nbproduit;
		
		function __construct($nom,$pointfidel,$nbproduit){
			$this->nom=$nom;
			$this->pointfidel=$pointfidel;
			$this->nbproduit=$nbproduit;
		}
		
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function setNom($nom){
			$this->nom=$nom;
		}

		function setPointfidel($pointfidel){
			$this->pointfidel=$pointfidel;
		}
		function getPointfidel(){
			return $this->pointfidel;
		}

		function setNbproduit($nbproduit){
			$this->nbproduit=$nbproduit;
		}
		function getNbproduit(){
			return $this->nbproduit;
		}

	}
?>